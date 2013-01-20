<?php

	$my_api_key = "019f91849b93c264f706310800728c3a";

	// This script gets a token to convert a file at online-convert.com.
	// Be carefull with this, everybody can call this script using your API key.
	// Take precautions like limiting access from IP, by your user_id, by app_id, daily limits and the like.

	$request['queue'] = <<<QUEUE

	<?xml version="1.0"?>
	<queue>
	<apiKey>$my_api_key</apiKey>
	</queue>
QUEUE;
	
	$ch = curl_init( 'http://api.online-convert.com/request-token' );
	curl_setopt( $ch, CURLOPT_HEADER, 0 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array ( 'Content-type: multipart/form-data' ) );

	curl_setopt( $ch, CURLOPT_POSTFIELDS, $request );
	$response = curl_exec( $ch );
	//$info = curl_getinfo( $ch );
	curl_close( $ch );
	
	echo $response;

?>