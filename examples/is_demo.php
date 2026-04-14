<?php

declare(strict_types=1);

///////////////////////////////////////////////////////////////////////////////
//
// StringEncrypt WebApi interface usage example.
//
// In this example we will verify our activation code status.
//
// Version        : v1.0.1
// Language       : PHP
// Author         : Bartosz Wójcik
// Project page   : https://www.stringencrypt.com
// Web page       : https://www.pelock.com
//
///////////////////////////////////////////////////////////////////////////////

use StringEncrypt\StringEncrypt;

$stringEncrypt = new StringEncrypt('');

$result = $stringEncrypt->isDemo();

if ($result === false) {
    echo "Cannot connect to the API.\n";
    exit(1);
}

if (!empty($result['demo'])) {
    echo "DEMO mode\n";
} else {
    echo "FULL mode\n";
    echo 'Credits left: ' . (string) ($result['credits_left'] ?? '') . "\n";
}

echo 'Label max length: ' . (string) ($result['label_limit'] ?? '') . "\n";
echo 'String max length: ' . (string) ($result['string_limit'] ?? '') . "\n";
echo 'Bytes max length: ' . (string) ($result['bytes_limit'] ?? '') . "\n";
echo 'cmd_min / cmd_max: ' . (string) ($result['cmd_min'] ?? '') . ' / ' . (string) ($result['cmd_max'] ?? '') . "\n";
