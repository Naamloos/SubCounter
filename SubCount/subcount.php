<?php require 'config.php'; ?>
<?php
	$user=$defaultuser;
	if(isset($_GET['u'])){
		$user = $_GET['u'];
	}

	$apipage="https://www.googleapis.com/youtube/v3/channels?part=statistics&id=" . $user . "&key=" . $key;

	// Calling api.
	$subscribers = file_get_contents($apipage);
	// Decoding json response
	$response = json_decode($subscribers, true );
	// echoing subscribers count.
	echo $count = intval($response['items'][0]['statistics']['subscriberCount']);
?>