<?php
	/**
	 * Tubename.php
	 * Gets YouTuber's name from channel ID 
	 * @author NaamloosDT https://github.com/naamloosDT
	 */
	// Get config
	require "config.php";

	// Use default user when no user is given
	if (isset($_GET['u'])) {
		$user = $_GET['u'];
	} else {
		$user = $defaultUser;
	}

	// If $user is a channel ID, get it's username and echo it. Otherwise, just echo $user.
	if (strlen($user) >= 24 && strtoupper(substr($user, 0, 2)) == "UC") {
		// API page
		$apiPage = "https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=$user&key=$key";
		// Get page content and decode it's JSON response
		$response = json_decode(file_get_contents($apiPage), true );
		// echoing subscribers count.
		echo $count = $response['items'][0]['snippet']['title'];
	} else {
		echo $user;
	}
?>