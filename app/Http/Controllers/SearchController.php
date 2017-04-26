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

        $query = "url:" . urldecode($url) . " -filter:retweets";
        $statuses = $twitter->search($query);

        $results = array();
        foreach ($statuses->statuses as $status) {
            $userId = $status->user->id;
            $userName = $status->user->screen_name;
            $statusId = $status->id;

            $statusUrl = "https://www.twitter.com/" . $userId . "/status/" . $statusId;
            $userUrl = "https://www.twitter.com/" . $userName;

            $tweet = [
                "userId" => $userId,
                "userName" => $userName,
                "userUrl" => $userUrl,
                "statusUrl" => $statusUrl,
                "text" => $status->text,
                "date" => $status->created_at,
                "urls" => $status->entities->urls,
            ];

            array_push($results, $tweet);
        }

        $data = [
            "query" => $url,
            "results" => $results,
            "time" => $statuses->search_metadata->completed_in,
            "raw" => $statuses
        ];

        //dd($data);
        return view('search.results')->with('data',$data);
    }
}