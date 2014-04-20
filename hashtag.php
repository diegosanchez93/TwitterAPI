<?php

    require_once('TwitterAPIExchange.php');

    $settings = array(
    'oauth_access_token' => "203913794-lzHPbOcpXnLFJnzKNZF2iXK41iXJMFBw0SJ0kEfZ",
    'oauth_access_token_secret' => "7ZHezNBl4gzD9qEJaVtDDgIGiMANZeBEQHGbv7qdGzEze",
    'consumer_key' => "M5crZ6fD2DjZF3l0EokBbK1GH",
    'consumer_secret' => "2eQobM2gHJPNPiQWX0uac2yureaNG9rUNrTv642fssFAiaEiTI"
    );

    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
    
    $requestMethod = "GET";
    
    if (isset($_GET['user'])) {
        $user = $_GET['user'];
    } else {
        $user = "Sanchezdiego93";
    }

    if (isset($_GET['cantTweet'])) {
        $count = $_GET['cantTweet'];
    } else {
        $count = 20;
    }

    if (isset($_GET['hashtag'])) {
        $hashtag = "#".$_GET['hashtag'];
    } else{
        $hashtag = "#\\w+";
    }

    
    $getfield = "?screen_name=$user&count=$count";
    $twitter = new TwitterAPIExchange($settings);

    $string = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)