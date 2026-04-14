<?php

declare(strict_types=1);

///////////////////////////////////////////////////////////////////////////////
//
// StringEncrypt WebApi interface usage example.
//
// In this example we will encrypt sample file with default options.
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
$stringEncrypt
    ->setCompression(false)
    ->setUnicode(true)
    ->setLangLocale('en_US.utf8')
    ->setNewLines(NewLine::Lf)
    ->setAnsiEncoding('WINDOWS-1250')
    ->setLanguage(Language::Php)
    ->setCmdMin(1)
    ->setCmdMax(3)
    ->setLocal(false);

// Full license: raw bytes from file (demo may return ERROR_DEMO).
$result = $stringEncrypt->encryptFileContents(__DIR__ . '/sample.bin', '$label');

if ($result === false) {
    echo "Cannot connect to the API or file is missing/empty.\n";
    exit(1);
}

if (($result['error'] ?? null) !== ErrorCode::SUCCESS) {
    echo 'API error: ' . (string) ($result['error'] ?? 'unknown') . "\n";
    exit(1);
}

echo (string) $result['source'] . "\n";
