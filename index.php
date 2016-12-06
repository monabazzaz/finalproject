<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Christchurch</title>

    <!-- Bootstrap -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arapey|Fauna+One|Noticia+Text" rel="stylesheet">

    <style>
      body {
        background-image: url('images/crackedearth.jpg');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>

  </head>
  <body>
    <div class="container-fluid">
      <div class="container">

      <img class="img-responsive" src="images/grey.png" alt="HeadImage">

        <div class="row blurb">
          <h2>What happened?</h2>
          <p>On November 14, 2016, an earthquake lasting over a minute with a magnitude of 7.8 struck the south island of New Zealand. The epicenter of the earthquake fell just south of Kaikoura, a tourist town on the east coast of the south island. The damage of the earthquake, however, resulted in tsunamis and stretched past the city of Christchurch, a region which is still recovering from the last earthquake of this volume which hit New Zealand in 2010. Click <a href= "https://en.wikipedia.org/wiki/2016_Kaikoura_earthquake">here</a> to read more.</p>
        </div>

        <ul class="tab visible-xs visible-sm">
          <li><a href="javascript:void(0)" class="tablinks" onclick="openContent(event, 'maps')" id="defaultOpen">Map</a></li>
          <li><a href="javascript:void(0)" class="tablinks" onclick="openContent(event, 'twitter')">Twitter</a></li>
          <li><a href="javascript:void(0)" class="tablinks" onclick="openContent(event, 'theGuardian')">The Guardian</a></li>
        </ul>

        <div id="maps" class="tabcontent">
              <div id="map"></div>
        </div>

        <div id="twitter" class="tabcontent">

          <?php
          ini_set('display_errors', 1);
          require_once('TwitterAPIExchange.php');

          /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
          $settings = array(
              'oauth_access_token' => "798564987254013952-j6r91jMnc06eJBJjaPVeaTl0Ks1wUIa",
              'oauth_access_token_secret' => "ok5StJhCGeC1T8dAcELlqeEo86oFDDvu6SpAjcoKQ90sS",
              'consumer_key' => "QfiZi3AFGzFUiiVu6W0pwloen",
              'consumer_secret' => "11YwF2Z2jRzGDNRO58Ck2MrK8ZfW3wLDyqrc2eoDSFLBxfhTej"
          );

          /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
          $url = 'https://api.twitter.com/1.1/blocks/create.json';
          $requestMethod = 'POST';

          /** POST fields required by the URL above. See relevant docs as above **/
          $postfields = array(
              'screen_name' => 'usernameToBlock',
              'skip_status' => '1'
          );

          /** Perform a POST request and echo the response **/
          // $twitter = new TwitterAPIExchange($settings);
          // echo $twitter->buildOauth($url, $requestMethod)
          //              ->setPostfields($postfields)
          //              ->performRequest();

          /** Perform a GET request and echo the response **/
          /** Note: Set the GET field BEFORE calling buildOauth(); **/
          $url = 'https://api.twitter.com/1.1/search/tweets.json';
          $getfield = '?q=#newzealandearthquake&count=100';
          $requestMethod = 'GET';
          $twitter = new TwitterAPIExchange($settings);

          $tweetData = json_decode($twitter->setGetfield($getfield)
                       ->buildOauth($url, $requestMethod)
                       ->performRequest(),$assoc=TRUE);

          foreach($tweetData['statuses'] as $index => $items){
                  $userArray = $items['user'];
                  echo '<div class="twitter-tweet"> <a href="http://twitter.com/' . $userArray['screen_name'] . '"><img src="'  . $userArray['profile_image_url'] . '"></a><a href="http://twitter.com/' . $userArray ['screen_name'] . '">' . $userArray['name'] . '</a></br>' . $items['text'];
                  echo '<br/>' . $items['created_at'];
                  echo '</div>';

          };
          ?>

        </div>

        <div id="theGuardian" class="tabcontent">
          <div id="guardian-results"></div>
        </div>

        <div class="row twittermaps">
          <div class="col-md-4 twitter hidden-xs hidden-sm visible-md visible-lg">

            <h2>Twitter</h2>

            <?php
            ini_set('display_errors', 1);
            require_once('TwitterAPIExchange.php');

            /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
            $settings = array(
                'oauth_access_token' => "798564987254013952-j6r91jMnc06eJBJjaPVeaTl0Ks1wUIa",
                'oauth_access_token_secret' => "ok5StJhCGeC1T8dAcELlqeEo86oFDDvu6SpAjcoKQ90sS",
                'consumer_key' => "QfiZi3AFGzFUiiVu6W0pwloen",
                'consumer_secret' => "11YwF2Z2jRzGDNRO58Ck2MrK8ZfW3wLDyqrc2eoDSFLBxfhTej"
            );

            /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
            $url = 'https://api.twitter.com/1.1/blocks/create.json';
            $requestMethod = 'POST';

            /** POST fields required by the URL above. See relevant docs as above **/
            $postfields = array(
                'screen_name' => 'usernameToBlock',
                'skip_status' => '1'
            );

            /** Perform a POST request and echo the response **/
            // $twitter = new TwitterAPIExchange($settings);
            // echo $twitter->buildOauth($url, $requestMethod)
            //              ->setPostfields($postfields)
            //              ->performRequest();

            /** Perform a GET request and echo the response **/
            /** Note: Set the GET field BEFORE calling buildOauth(); **/
            $url = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield = '?q=#newzealandearthquake&count=100';
            $requestMethod = 'GET';
            $twitter = new TwitterAPIExchange($settings);

            $tweetData = json_decode($twitter->setGetfield($getfield)
                         ->buildOauth($url, $requestMethod)
                         ->performRequest(),$assoc=TRUE);

            foreach($tweetData['statuses'] as $index => $items){
                    $userArray = $items['user'];
                    echo '<div class="twitter-tweet"> <a href="http://twitter.com/' . $userArray['screen_name'] . '"><img src="'  . $userArray['profile_image_url'] . '"></a><a href="http://twitter.com/' . $userArray ['screen_name'] . '">' . $userArray['name'] . '</a></br>' . $items['text'];
                    echo '<br/>' . $items['created_at'];
                    echo '</div>';

            };
            ?>

          </div>

            <!-- <div class="col-md-8 google hidden-xs hidden-sm visible-md visible-lg"> -->
              <!-- <h2>Google Maps</h2> -->
            <!-- </div> -->
        </div>

        <div class="row guardian hidden-xs hidden-sm visible-md visible-lg">
            <h2>The Guardian</h2>
            <div id="guardian-results2"></div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVHp0tcoEwLqyDqnBaV0WEBTXP6KaAZdw&libraries=visualization&callback=initMap"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mapscripts.js"></script>
    <script src="js/guardian.js"></script>
    <script src="js/scripts.js"></script>

  </body>
</html>
