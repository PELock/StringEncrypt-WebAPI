<?php

////////////////////////////////////////////////////////////////////////////////
//
// StringEncrypt.com Web API library
//
// Version        : v1.2
// Language       : PHP
// Author         : Bartosz Wójcik
// Web page       : https://www.stringencrypt.com
//
////////////////////////////////////////////////////////////////////////////////

// web API interface URL
define("STRINGENCRYPT_API_URL", "https://www.stringencrypt.com/api.php");

// success
define("ERROR_SUCCESS", 0);

// label parameter is missing
define("ERROR_EMPTY_LABEL", 1);

// input string is missing
define("ERROR_EMPTY_STRING", 2);

// input file is missing
define("ERROR_EMPTY_BYTES", 3);

// input string/file is missing
define("ERROR_EMPTY_INPUT", 4);

// programming language not supported
define("ERROR_INVALID_LANG", 5);

// invalid locale defined
define("ERROR_INVALID_LOCALE", 6);

// label length too long
define("ERROR_LABEL_MAX_LEN", 7);

// string/bytes length too long
define("ERROR_STRING_MAX_LEN", 8);

// min. number of encryption commands error
define("ERROR_CMD_MIN", 9);

// max. number of encryption commands error
define("ERROR_CMD_MAX", 10);

//
// main keygen function
//
// $params_array     - an array with encryption parameters (see example.php
//                     for the complete list of parameters)
// $use_curl_library - use cURL library to send a POST request, please note,
//                     that the cURL library might not be available everywhere
//
function stringencrypt($params_array, $use_curl_library = false)
{
	// detect cURL library and disable it if it's not found
	if (function_exists('curl_init') == false && $use_curl_library == true)
	{
		$use_curl_library = false;
	}

	// send a request to the API interface
	if ($use_curl_library == false)
	{
		$result = post_request(STRINGENCRYPT_API_URL, $params_array);
	}
	else
	{
		$result = post_request_curl(STRINGENCRYPT_API_URL, $params_array);
	}

	// decode result from the JSON format into associative array
	if ($result != false)
	{
		$result = json_decode($result, true);
	}

	return $result;
}

//
// send a POST request
//
function post_request($url, $data)
{
	$params = array('http' => array(
		'method' => 'POST',
		'content' => http_build_query($data)
		));

	$ctx = stream_context_create($params);

	$fp = @fopen($url, 'rb', false, $ctx);

	if (!$fp)
	{
		return false;
	}

	//$meta = stream_get_meta_data($fp);
	//var_dump($meta['wrapper_data']);
	//die("exit");

	$response = @stream_get_contents($fp);

	return $response;
}

//
// send a POST request using cURL library
//
function post_request_curl($url, $data)
{
	$ch = curl_init();

	$fields_string = "";

	foreach($data as $key => $value)
	{
		$fields_string .= $key.'='.$value.'&';
	}

	$fields_string = rtrim($fields_string, '&');

	// url
	curl_setopt($ch, CURLOPT_URL, $url);

	// number of parameters
	curl_setopt($ch, CURLOPT_POST, count($data));

	// POST parameters
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

	// user agent
	curl_setopt($ch, CURLOPT_USERAGENT, "StringEncrypt Web API Client v1.0");

	// return only result
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// query URL
	$result = curl_exec($ch);

	// close session
	curl_close($ch);

	// return result
	return $result;
}

?>