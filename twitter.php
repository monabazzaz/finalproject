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
