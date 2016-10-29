<?php require 'config.php'; ?>
<?php
	/**
	 * Subcount.php
	 * Gets YouTuber's subscribers from channel ID and counts them 
	 * @author NaamloosDT https://github.com/naamloosDT
	 */
	// Get config
	require "config.php";

	// Use default user when no user is given
	if (isset($_GET['u'])) {
		$user = $_GET['u'];
	} else {
		$user = $defaultuser;
	}
	// If $user is an username, get it's channelID. Otherwise, just use $user.
	$channelId = "";
	if (!(strlen($user) >= 24 && strtoupper(substr($user, 0, 2)) == "UC")) {
		// API page
		$getIdPage = "https://www.googleapis.com/youtube/v3/search?key=$key&q=$user&part=id&type=channel&maxResults=1";
		// Get page content and decode it's JSON response
		$channelData = json_decode(file_get_contents($getIdPage), true);
		// Get channel ID
		$channelId = $channelData['items'][0]['id']['channelId']; 	
	} else {
		$channelId = $user;
	}
	// API page
	$apiPage = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=$channelId&fields=items/statistics/subscriberCount&key=$key";  
	// Get page content and decode it's JSON response
	$response = json_decode(file_get_contents($apiPage), true);
	// Echo subscriber count
	echo $count = intval($response['items'][0]['statistics']['subscriberCount']);
?>