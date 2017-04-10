<?php
/**
 * Created by PhpStorm.
 * User: sindunuragarp
 * Date: 9-4-17
 * Time: 22:47
 */

namespace App\Http\Controllers;

class SearchController
{
    public function index()
    {
        return view('search.home');
    }

    public function search()
    {
        $twitter = resolve('App\TwitterConnector');
        $url = request()->input("query");

        $query = "url:" . urldecode($url);
        $statuses = $twitter->search($query);

        $results = array();
        foreach ($statuses->statuses as $status) {
            $userId = $status->user->id;
            $statusId = $status->id;
            $statusUrl = "https://www.twitter.com/" . $userId . "/status/" . $statusId;

            $tweet = [
                "userId" => $userId,
                "url" => $statusUrl,
                "text" => $status->text,
                "embed" => $twitter->getEmbed($statusUrl)
            ];

            array_push($results, $tweet);
        }

        $data = [
            "query" => $url,
            "results" => $results,
            "time" => $statuses->search_metadata->completed_in,
            "next_link" => $statuses->search_metadata->next_results,
            "current_link" => $statuses->search_metadata->refresh_url,
        ];

        //dd($data);
        return view('search.results')->with('data',$data);
    }
}