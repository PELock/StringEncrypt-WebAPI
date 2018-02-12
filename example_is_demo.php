<?php

////////////////////////////////////////////////////////////////////////////////
//
// StringEncrypt.com Web API usage example
//
// Version        : v1.2
// Language       : PHP
// Author         : Bartosz Wójcik
// Web page       : https://www.stringencrypt.com
//
////////////////////////////////////////////////////////////////////////////////

// include main library
include ("stringencrypt.php");

//
// setup options
//
$options = array();

//
// activation code, you can leave it empty for demo version, but keep in
// mind that in demo versions there are many limitations)
//
$options["code"] = "";

//
// API command to execute
//
// "encrypt" - encrypt input string or file bytes, returns array of:
//
// $result["error"] - error code
// $result["source"] - decryptor source code
// $result["expired"] - activation code expiration flag (bool)
// $result["credits_left"] - number of credits left
//
// "is_demo" - checks current activation code and returns array of:
//
// $result["demo"] - demo mode flag (bool)
// $result["label_limit"] - label limit length
// $result["string_limit"] - string/file limit lenght
// $result["credits_left"] - number of credits left
// $result["cmd_min"] - minimum number of encryption commands
// $result["cmd_max"] - maximum number of encryption commands
//$options["command"] = "encrypt";
$options["command"] = "is_demo";

//
// execute API command
//
$result = stringencrypt($options);

if ($result != false)
{
	if ($result["demo"] == true)
	{
		echo "<p>You are running in DEMO mode</p>";
	}
	else
	{
		echo "<p>You are running in FULL mode</p>";

		// display number of credits left
		echo "<p>You have {$result['credits_left']} credits left.</p>";

		// display initial number of credits
		echo "<p>Initial number of credits {$result['credits_total']}.</p>";
	}

	echo "<p>Label max. length {$result['label_limit']} characters</p>";

	echo "<p>String/file max. length {$result['string_limit']} characters</p>";

	echo "<p>Minimum number of encryption commands {$result['cmd_min']}</p>";
	echo "<p>Maximum number of encryption commands {$result['cmd_max']}</p>";
}
else
{
	echo "Cannot connect to the API interface!";
}

?>