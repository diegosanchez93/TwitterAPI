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
    
    $getfield = "?screen_name=$user&count=$count";
    $twitter = new TwitterAPIExchange($settings);

    $string = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(),$assoc = TRUE);

    echo '
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Twitter API</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="css/custom.css" rel="stylesheet">
    <link href="css/social-buttons.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/business-frontpage.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Twitter APP</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><span style="color:white"><strong>Twitter API</strong></span></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.html"><span style="color:white">Home</span></a>
                    </li>
                    <li><a href="tweets.html"><span style="color:white"><strong>Tweets</strong></span></a>
                    </li>
                    <li><a href="posting.html"><span style="color:white">Posting</span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="business-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!-- The background image is set in the custom CSS -->
                </div>
            </div>

        </div>

    </div>

    <br><br>

    <div class="container">
    
    
    <h2>Screen name: <span class="label label-default">'.$string[0]['user']['screen_name'].'</span></h2><br>
    <h2>Followers Number: <span class="label label-default">'.$string[0]['user']['followers_count'].'</span></h2><br>
    <h2>Friends Number: <span class="label label-default">'.$string[0]['user']['friends_count'].'</span></h2><br>
    ';

    if($string["errors"][0]["message"] != "") {echo '<h3>Sorry, there was a problem.</h3><br><p>Twitter returned the following error message:</p><p><em>'.$string[errors][0]["message"].'</em></p>';exit();}
    foreach($string as $items)
    {
       echo '<div class="well">';
       echo '<h4>Tweet Posted: <span class="label label-default">'.$items['created_at'].'</span></h4><br>';
       echo '<h4>Tweet Posted: <span class="label label-default">'.$items['text'].'</span></h4><br>';
       echo '<h4>Tweet Posted: <span class="label label-default">'.$items['user']['name'].'</span></h4><br>';
       echo "</div><hr>";

    }


    echo'
    </div> <!-- /container -->

    <br><br>
    <div class="end-footer">
        <p>2014 &copy; Team Sanchez. All Rights reserved. <strong>Lenguajes de Programacion | ISC PUCMM</strong></p>
    </div>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>
    ';
?>