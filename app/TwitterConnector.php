<?php
/**
 * Created by PhpStorm.
 * User: sindunuragarp
 * Date: 10-4-17
 * Time: 21:57
 */

namespace App;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterConnector
{
    protected $client;

    public function __construct(TwitterOAuth $client)
    {
        $this->client = $client;
    }

    public function search($query)
    {
        return $this->client->get("search/tweets", ["q" => $query]);
    }

    public function getEmbed($tweetUrl)
    {
        return $this->client->get("statuses/oembed", ["url" => $tweetUrl]);
    }
}