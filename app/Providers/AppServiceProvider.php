<?php

namespace App\Providers;

use App\TwitterConnector;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TwitterConnector::class, function () {
            $consumerKey = env('TWITTER_CONSUMER_KEY', false);
            $consumerSecret = env('TWITTER_CONSUMER_SECRET', false);
            $accessToken = env('TWITTER_ACCESS_TOKEN', false);
            $accessTokenSecret = env('TWITTER_ACCESS_TOKEN_SECRET', false);

            return new TwitterConnector(
                new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret)
            );
        });
    }
}
