<?php

declare(strict_types=1);

///////////////////////////////////////////////////////////////////////////////
//
// StringEncrypt WebApi interface usage example.
//
// In this example we will encrypt sample string with default options.
//
// Version        : v1.0.1
// Language       : PHP
// Author         : Bartosz Wójcik
// Project page   : https://www.stringencrypt.com
// Web page       : https://www.pelock.com
//
///////////////////////////////////////////////////////////////////////////////

use StringEncrypt\ErrorCode;
use StringEncrypt\Language;
use StringEncrypt\NewLine;
use StringEncrypt\StringEncrypt;

$stringEncrypt = new StringEncrypt('YOUR-API-KEY-HERE'); // leave empty for demo mode

$result = $stringEncrypt->encryptString('Hello!', '$label');

if ($result === false) {
    echo "Cannot connect to the API.\n";
    exit(1);
}

if (($result['error'] ?? null) !== ErrorCode::SUCCESS) {
    echo 'API error: ' . (string) ($result['error'] ?? 'unknown') . "\n";
    exit(1);
}

echo (string) $result['source'] . "\n";
