<?php
      require_once('twitteroauth.php');
      $consumerKey = "mIp9kuGbV1r9PX3vrelcww";
      $consumerSecret = "zvguhuqirHeIb3K53TepZobf1lXbDTwGHzrxD4wRR0";
      $oAuthToken = "154354962-1hlGanzjXc4qGPUt6IDjWKqWJnaDUUxnfZTcF7cG";
      $oAuthSecret ="ibv28BGvaKTm8ydlqtmzII2LMjgivgbA91ZO4hH0AkagE";

      # OAuth APi
      $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);
      $tweetMessage = '';  
      // Contenido del Tweet
      if (isset($_GET['mensaje'])) {
        $tweetMessage = $_GET['mensaje'];
      }

      //Tiene que tener menos de 141 caracteres 
      if(strlen($tweetMessage) <= 140)
      {
             // Post the status message
             $tweet->post('statuses/update', array('status' => $tweetMessage));
             echo ($tweetMessage);
      }

?>