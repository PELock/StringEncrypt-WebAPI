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
// mind that there are many limitations in demo version)
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
$options["command"] = "encrypt";
//$options["command"] = "is_demo";

//
// label name
//
// demo mode supports up to 6 chars only (64 in full version),
// if you pass more than this number, service will return
// ERROR_LENGTH_LABEL
//
$options["label"] = "Label";

//
// input string / raw bytes compression enabled, if you set it to
// true, you need to compress input string / raw bytes eg.
//
// $compressed = @base64_encode(@gzcompress($string, 9)
//
// and after encryption you need to decompress encrypted data
//
// $decompressed = @gzuncompress(@base64_decode($source));
//
$options["compression"] = false;
//$options["compression"] = true;

//
// input string in UTF-8 format
//
// demo mode supports up to 6 chars only, if you pass more
// than that, service will return ERROR_LENGTH_STRING
//
$options["string"] = "Hello!";
//$options["string"] = @base64_encode(@gzcompress("Hello!", 9));

//
// raw data bytes to encrypt (you need to specify either
// $options["string"] or this value
//
// demo mode doesn't support this parameter and the service
// will return ERROR_DEMO
//
//$options["bytes"] = file_get_contents("my_file.txt");
//$options["bytes"] = file_get_contents("http://www.example.com/my_file.txt");
//$options["bytes"] = @base64_encode(@gzcompress(file_get_contents("my_file.txt"), 9));

//
// treat input string as a UNICODE string (ANSI otherwise)
//
$options["unicode"] = true;

//
// input string default locale (only those listed below
// are supported currently)
//
$options["lang_locale"] = "en_US.utf8";
//$options["lang_locale"] = "en_GB.utf8";
//$options["lang_locale"] = "de_DE.utf8";
//$options["lang_locale"] = "es_ES.utf8";
//$options["lang_locale"] = "fr_BE.utf8";
//$options["lang_locale"] = "fr_FR.utf8";
//$options["lang_locale"] = "pl_PL.utf8";

//
// how to encode new lines, available values:
//
// "lf" - Unix style
// "crlf" - Windows style
// "cr" - Mac style
//
$options["new_lines"] = "lf";
//$options["new_lines"] = "crlf";
//$options["new_lines"] = "cr";

//
// destination ANSI string encoding (if unicode = false)
//
// only those listed below are supported
//
$options["ansi_encoding"] = "WINDOWS-1250";
//$options["ansi_encoding"] = "WINDOWS-1251";
//$options["ansi_encoding"] = "WINDOWS-1252";
//$options["ansi_encoding"] = "WINDOWS-1253";
//$options["ansi_encoding"] = "WINDOWS-1254";
//$options["ansi_encoding"] = "WINDOWS-1255";
//$options["ansi_encoding"] = "WINDOWS-1256";
//$options["ansi_encoding"] = "WINDOWS-1257";
//$options["ansi_encoding"] = "WINDOWS-1258";
//$options["ansi_encoding"] = "ISO-8859-1";
//$options["ansi_encoding"] = "ISO-8859-2";
//$options["ansi_encoding"] = "ISO-8859-3";
//$options["ansi_encoding"] = "ISO-8859-9";
//$options["ansi_encoding"] = "ISO-8859-10";
//$options["ansi_encoding"] = "ISO-8859-14";
//$options["ansi_encoding"] = "ISO-8859-15";
//$options["ansi_encoding"] = "ISO-8859-16";

//
// output programming language
//
// only those listed below are supported, if you pass
// other name, service will return ERROR_INVALID_LANG
//
$options["lang"] = "cpp";
//$options["lang"] = "csharp";
//$options["lang"] = "delphi";
//$options["lang"] = "java";
//$options["lang"] = "js";
//$options["lang"] = "python";
//$options["lang"] = "ruby";
//$options["lang"] = "autoit";
//$options["lang"] = "powershell";
//$options["lang"] = "haskell";
//$options["lang"] = "masm";
//$options["lang"] = "fasm";

//
// minimum number of encryption commands
//
// demo mode supports only up to 3 commands (50 in full version),
// if you pass more than this number, service will return
// ERROR_CMD_MIN
//
$options["cmd_min"] = 1;
//$options["cmd_min"] = 1;

//
// maximum number of encryption commands
//
// demo mode supports only up to 3 commands (50 in full version),
// if you pass more than this number, service will return
// ERROR_CMD_MAX
//
$options["cmd_max"] = 3;
//$options["cmd_max"] = 50;

//
// store encrypted string as a local variable (if supported
// by the programming language), otherwise it's stored as
// a global variable
//
$options["local"] = false;
//$options["local"] = true;

//
// encrypt string or file contents
//
$result = stringencrypt($options);

if ($result != false)
{
	if ($result["error"] == ERROR_SUCCESS)
	{
		// if compression was enabled, we need to
		// decompress the output source code
		if ($options["compression"] == true)
		{
			$source = @gzuncompress(@base64_decode($source));
		}
		else
		{
			$source = $result["source"];
		}

		// display decryptor body
		echo "<pre>".$source."</pre>";

		// display number of credits left
		echo "<p>You have {$result['credits_left']} credits left.</p>";

		// display initial number of credits
		echo "<p>Initial number of credits {$result['credits_total']}.</p>";

		// activation code has expired, notify user
		if ($result["expired"] == true)
		{
			echo "<p>Your activation code has expired!</p>";
		}
	}
	else
	{
		echo "An error occured (code ".$result["error"].")";
	}
}
else
{
	echo "Cannot connect to the API interface!";
}

?>