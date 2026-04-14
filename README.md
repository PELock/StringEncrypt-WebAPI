# StringEncrypt — String & File Encryption for PHP Developers

[![License](https://img.shields.io/badge/license-Apache%202.0-blue.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/php-%5E8.1-8892BF.svg)](composer.json)


[StringEncrypt](https://www.stringencrypt.com) allows you to **encrypt strings and files** using a randomly generated algorithm, generating a unique decryption code (so-called [polymorphic code](https://www.pelock.com/articles/polymorphic-encryption-algorithms)) each time in the selected programming language.

## Available editions

StringEncrypt can be used:

* Directly on its website - https://www.stringencrypt.com/
* You can download standalone Windows client - https://www.stringencrypt.com/download/
* You can use it via WebAPI interface https://www.stringencrypt.com/api/
* Visual Studio Code extension - https://marketplace.visualstudio.com/items?itemName=PELock.stringencrypt

## Plain text PHP string

```php
// $secret = "PHP string encryption"
```

## Encrypted string in PHP source code format

```php
// encrypted with https://www.stringencrypt.com (v1.5.0) [PHP]
// Encoding: Windows-1250 or match your source file
// $secret = "PHP string encryption"
$secret = [ 0x8E, 0x40, 0x56, 0xAE, 0x7A, 0x0B, 0x1D, 0x51,
            0x5D, 0x63, 0x13, 0xDA, 0x6E, 0x3F, 0xDB, 0x5E,
            0xB9, 0x79, 0x1F, 0xA6, 0x17 ];

$DGEPd = 0;
for ($PBbql = 0; $PBbql < 21; $PBbql++)
{
  $DGEPd = $secret[$PBbql];
  for ($pNjYM = 0; $pNjYM < 4; $pNjYM++)
  {
    $DGEPd = ($DGEPd ^ 0x3D) & 0xFF;
    $DGEPd = (((~($DGEPd & 0xFF)) & 0xFF) + 1) & 0xFF;
  }
  $DGEPd = ($DGEPd ^ 0xB6) & 0xFF;
  $DGEPd = ($DGEPd ^ $PBbql) & 0xFF;
  for ($XnxLS = 0; $XnxLS < 2; $XnxLS++)
  {
    for ($qoZCp = 0; $qoZCp < 4; $qoZCp++)
    {
      $DGEPd = ((($DGEPd & 0xFF) >> 7) | (($DGEPd & 0xFF) << 1)) & 0xFF;
    }
    for ($CsgJZ = 0; $CsgJZ < 4; $CsgJZ++)
    {
      for ($VwNLz = 0; $VwNLz < 3; $VwNLz++)
      {
        $DGEPd = ($DGEPd ^ ((($DGEPd & 0xFF) << 4) & 0xFF)) & 0xFF;
        $DGEPd = ((($DGEPd & 0xFF) >> 4) | (($DGEPd & 0xFF) << 4)) & 0xFF;
      }
      $DGEPd = (($DGEPd & 0xFF) + 1) & 0xFF;
    }
  }
  $DGEPd = (($DGEPd & 0xFF) + 0xD0) & 0xFF;
  $DGEPd = ((($DGEPd & 0xFF) >> 4) | (($DGEPd & 0xFF) << 4)) & 0xFF;
  for ($cUyMk = 0; $cUyMk < 3; $cUyMk++)
  {
    $DGEPd = (($DGEPd & 0xFF) + 1) & 0xFF;
    $DGEPd = ((($DGEPd & 0xFF) << ($PBbql % 8)) | (($DGEPd & 0xFF) >> (8 - ($PBbql % 8)))) & 0xFF;
  }
  for ($UmJxX = 0; $UmJxX < 2; $UmJxX++)
  {
    for ($RGWvx = 0; $RGWvx < 4; $RGWvx++)
    {
      for ($xNBhy = 0; $xNBhy < 4; $xNBhy++)
      {
        $DGEPd = (($DGEPd & 0xFF) - 0x27) & 0xFF;
      }
    }
  }
  $DGEPd = (($DGEPd & 0xFF) + 1) & 0xFF;
  for ($lJFgB = 0; $lJFgB < 3; $lJFgB++)
  {
    $DGEPd = ($DGEPd ^ $PBbql) & 0xFF;
    $DGEPd = ((($DGEPd & 0xFF) << ($PBbql % 8)) | (($DGEPd & 0xFF) >> (8 - ($PBbql % 8)))) & 0xFF;
    for ($nGAaX = 0; $nGAaX < 2; $nGAaX++)
    {
      for ($RMrYp = 0; $RMrYp < 4; $RMrYp++)
      {
        $DGEPd = ($DGEPd ^ 0xFF) & 0xFF;
      }
      for ($pUZjW = 0; $pUZjW < 4; $pUZjW++)
      {
        $DGEPd = (($DGEPd & 0xFF) - $PBbql) & 0xFF;
      }
      $DGEPd = ($DGEPd ^ (($DGEPd & 0xFF) >> 6)) & 0xFF;
    }
  }
  $DGEPd = ($DGEPd ^ 0x27) & 0xFF;
  for ($QHPSD = 0; $QHPSD < 3; $QHPSD++)
  {
    $DGEPd = (($DGEPd & 0xFF) + 0x6C) & 0xFF;
  }
  for ($PquxI = 0; $PquxI < 4; $PquxI++)
  {
    $DGEPd = (($DGEPd & 0xFF) - 1) & 0xFF;
    for ($yCWuE = 0; $yCWuE < 2; $yCWuE++)
    {
      $DGEPd = (($DGEPd & 0xFF) - 0xAF) & 0xFF;
      for ($DFgxE = 0; $DFgxE < 4; $DFgxE++)
      {
        $DGEPd = (($DGEPd & 0xFF) + 0x1D) & 0xFF;
        $DGEPd = ($DGEPd ^ 0xFF) & 0xFF;
      }
      $DGEPd = (($DGEPd & 0xFF) + 1) & 0xFF;
    }
    for ($uadXk = 0; $uadXk < 4; $uadXk++)
    {
      $DGEPd = ($DGEPd ^ $PBbql) & 0xFF;
    }
  }
  $secret[$PBbql] = $DGEPd;
}

$secret = implode('', array_map(function ($c) { return chr($c & 0xFF); }, $secret));


echo secret;
```

## The problem with plain text strings

I'm a developer, and I love programming. I'm also an avid [reverse engineer](https://www.pelock.com/services). I perform a wide array of software analysis in my daily work and sometimes I find things in compiled applications that **shouldn't be exposed** to the first person with a simple hex-editor in hand.

### What can be found in application binaries?

Everything! I've listed a few examples of the things I found below. Sometimes these things shouldn't even be included in applications at all (they are there due to poor design choices or rushed work), but some are just cannot be avoided.

* API keys
* Database passwords
* FTP passwords
* Login credentials
* Encryption & decryption keys
* Custom code scripts in readable text
* Complex SQL queries in plain text
* Hidden website endpoints
* BitCoin wallets locations
* ...and many more

Ask yourself, did you ever put some sensitive content in your software that you later regret?

### Why should I care?

If any of these things were to fall into the **wrong hands**, they could be used to compromise your software or your infrastructure.

![You don't want this to happen to your software.](https://www.pelock.com/img/en/products/string-encrypt/database-password-plain-text.png)

Take for example database passwords. A competitor could use them to view your database structure or dump all of its contents. You don't want to lose all your hard work because someone with a simple hex-editor can discover your password in plain text. 

## The solution — String Encrypt

I've decided to create a simple service called String Encrypt for developers, offering fast string & file encryption without the need to write custom encryption tools over and over again because I did that many times.

String Encrypt can help you hide the things that shouldn't be visible at first glance to anyone with a hex-editor.

![StringEncrypt main window](https://www.stringencrypt.com/images/stringencrypt.png)

### Say hello to polymorphic encryption!

Forget about simple `xor` encryption! StringEncrypt comes with a unique encryption engine.

It's a **polymorphic encryption engine**, similar to the encryption methods used by the software protection solutions and advanced computer viruses.

### How it works?

Let me explain how the polymorphic encryption process works.

1. A random set of encryption commands is selected (`xor`, `addition`, `subtraction`, `bit rotations`, `bit shifts`, `logical negation` etc.).
2. A random set of helper `encryption keys` is generated.
3. Every byte of the input string is encrypted with every encryption command in the random set.
4. Nested encryption loops are constructed
5. The decryption code in the selected programming language is generated with a reverse set of encryption commands.

You can learn more about polymorphic engines from my articles and projects:

* How to build a polymorphic engine in C++ - https://www.pelock.com/articles/polymorphic-encryption-algorithms
* Polymorphic engine in 32-bit MASM assembler - https://github.com/PELock/Simple-Polymorphic-Engine-SPE32
* Poly Polymorphic Engine - https://www.pelock.com/products/poly-polymorphic-engine

### What does it mean?

The encrypted content is **different** every time you apply StringEncrypt encryption to it.

The algorithm is always **unique**, the encryption keys are always **randomly selected** and the decryption code is also **unique** for every time you use our encryption.

## StringEncrypt features

* Out of box support for `UNICODE` (WideChar type in `C/C++` languages), `UTF-8` (multibyte) & `ANSI` (single byte) strings encodings
* Configurable minimum & maximum number of encryption commands
* Different ways to store the encrypted string (as a `global` or `local` variable if the selected programming language supports it)
* Wide array of supported programming languages
* You can automate the encryption process in your builds using our `WebAPI` interface (`PHP` and `Python` bindings)

## How to use StringEncrypt from PHP code?

The preferred way of StringEncrypt module installation is via composer(https://getcomposer.org/).

Run:

```bash
composer require pelock/stringencrypt
```

The installation package is available at https://packagist.org/packages/pelock/stringencrypt

### Basic string encryption usage example (with default options)

```php
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
```

#### Return values:

* ```$result["error"] (int)``` - error code
* ```$result["source"] (string)``` - decryptor source code
* ```$result["expired"] (boolean)``` - expiration flag
* ```$result["credits_left"] (int)``` - number of credits left
* ```$result["credits_total"] (int)``` - initial number of credits

#### Error codes:

* ```ERROR_SUCCESS (0)``` - everything went fine
* ```ERROR_EMPTY_LABEL (1)``` - label parameter is empty
* ```ERROR_LENGTH_LABEL (2)``` - label length is too long
* ```ERROR_EMPTY_STRING (3)``` - input string is empty
* ```ERROR_EMPTY_BYTES (4)``` - input file bytes array is empty
* ```ERROR_EMPTY_INPUT (5)``` - input source (either string or file) is missing
* ```ERROR_LENGTH_STRING (6)``` - string length is too long
* ```ERROR_INVALID_LANG (7)``` - programming language not supported
* ```ERROR_INVALID_LOCALE (8)``` - language locale is not supported
* ```ERROR_CMD_MIN (9)``` - invalid number of minimum encryption commands
* ```ERROR_CMD_MAX (10)``` - invalid number of maximum encryption commands
* ```ERROR_LENGTH_BYTES (11)``` - bytes/file length is too long
* ```ERROR_DEMO (100)``` - you need a valid code to use full version features

### Custom string encryption for other programming languages

```php
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
$stringEncrypt
    ->setCompression(false)
    ->setUnicode(true)
    ->setLangLocale('en_US.utf8')
    ->setNewLines(NewLine::Lf)
    ->setLanguage(Language::Cpp)
    ->setCmdMin(1)
    ->setCmdMax(3)
    ->setLocal(false);

$result = $stringEncrypt->encryptString('Hello!', 'wszLabel');

if ($result === false) {
    echo "Cannot connect to the API.\n";
    exit(1);
}

if (($result['error'] ?? null) !== ErrorCode::SUCCESS) {
    echo 'API error: ' . (string) ($result['error'] ?? 'unknown') . "\n";
    exit(1);
}

echo (string) $result['source'] . "\n";
```

#### Return values:

* ```$result["error"] (int)``` - error code
* ```$result["source"] (string)``` - decryptor source code
* ```$result["expired"] (boolean)``` - expiration flag
* ```$result["credits_left"] (int)``` - number of credits left
* ```$result["credits_total"] (int)``` - initial number of credits

#### Error codes:

* ```ERROR_SUCCESS (0)``` - everything went fine
* ```ERROR_EMPTY_LABEL (1)``` - label parameter is empty
* ```ERROR_LENGTH_LABEL (2)``` - label length is too long
* ```ERROR_EMPTY_STRING (3)``` - input string is empty
* ```ERROR_EMPTY_BYTES (4)``` - input file bytes array is empty
* ```ERROR_EMPTY_INPUT (5)``` - input source (either string or file) is missing
* ```ERROR_LENGTH_STRING (6)``` - string length is too long
* ```ERROR_INVALID_LANG (7)``` - programming language not supported
* ```ERROR_INVALID_LOCALE (8)``` - language locale is not supported
* ```ERROR_CMD_MIN (9)``` - invalid number of minimum encryption commands
* ```ERROR_CMD_MAX (10)``` - invalid number of maximum encryption commands
* ```ERROR_LENGTH_BYTES (11)``` - bytes/file length is too long
* ```ERROR_DEMO (100)``` - you need a valid code to use full version features


### Encrypt binary file content

```php
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
```

#### Return values:

* ```$result["error"] (int)``` - error code
* ```$result["source"] (string)``` - decryptor source code
* ```$result["expired"] (boolean)``` - expiration flag
* ```$result["credits_left"] (int)``` - number of credits left
* ```$result["credits_total"] (int)``` - initial number of credits

#### Error codes:

* ```ERROR_SUCCESS (0)``` - everything went fine
* ```ERROR_EMPTY_LABEL (1)``` - label parameter is empty
* ```ERROR_LENGTH_LABEL (2)``` - label length is too long
* ```ERROR_EMPTY_STRING (3)``` - input string is empty
* ```ERROR_EMPTY_BYTES (4)``` - input file bytes array is empty
* ```ERROR_EMPTY_INPUT (5)``` - input source (either string or file) is missing
* ```ERROR_LENGTH_STRING (6)``` - string length is too long
* ```ERROR_INVALID_LANG (7)``` - programming language not supported
* ```ERROR_INVALID_LOCALE (8)``` - language locale is not supported
* ```ERROR_CMD_MIN (9)``` - invalid number of minimum encryption commands
* ```ERROR_CMD_MAX (10)``` - invalid number of maximum encryption commands
* ```ERROR_LENGTH_BYTES (11)``` - bytes/file length is too long
* ```ERROR_DEMO (100)``` - you need a valid code to use full version features

### Check the status of the activation code and show current limitations

This example shows how to get information about the current activation code and its features.

```php
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
```

#### Return values:

* ```$result["demo"] (boolean)``` - demo mode flag
* ```$result["label_limit"] (int)``` - label limit length
* ```$result["string_limit"] (int)``` - string/file limit length
* ```$result["credits_left"] (int)``` - number of credits left
* ```$result["credits_total"] (int)``` - initial number of credits
* ```$result["cmd_min"] (int)``` - minimum number of encryption commands
* ```$result["cmd_max"] (int)``` - maximum number of encryption commands

## Supported programming languages

StringEncrypt engine supports code generation for the following programming languages:

* [C & C++](https://www.stringencrypt.com/c-cpp-encryption/)
* [C# (C Sharp for .NET)](https://www.stringencrypt.com/c-sharp-encryption/)
* [Visual Basic .NET (VB.NET)](https://www.stringencrypt.com/visual-basic-net-vb-net-encryption/)
* [Delphi / Pascal](https://www.stringencrypt.com/delphi-pascal-encryption/)
* [Java](https://www.stringencrypt.com/java-encryption/)
* [Kotlin](https://www.stringencrypt.com/kotlin-encryption/)
* [JavaScript](https://www.stringencrypt.com/javascript-encryption/)
* [Python](https://www.stringencrypt.com/python-encryption/)
* [PHP](https://www.stringencrypt.com/php-encryption/)
* [Ruby](https://www.stringencrypt.com/ruby-encryption/)
* [Dart](https://www.stringencrypt.com/dart-encryption/)
* [Go](https://www.stringencrypt.com/go-encryption/)
* [Rust](https://www.stringencrypt.com/rust-encryption/)
* [Swift](https://www.stringencrypt.com/swift-encryption/)
* [Lua](https://www.stringencrypt.com/lua-encryption/)
* [Objective-C](https://www.stringencrypt.com/objective-c-encryption/)
* [AutoIt](https://www.stringencrypt.com/autoit-encryption/)
* [PowerShell](https://www.stringencrypt.com/powershell-encryption/)
* [Haskell](https://www.stringencrypt.com/haskell-encryption/)
* [MASM assembler](https://www.stringencrypt.com/masm-encryption/)
* [FASM assembler](https://www.stringencrypt.com/fasm-encryption/)
* [NASM assembler](https://www.stringencrypt.com/nasm-encryption/)

Some examples of generated source code for supported programming languages (**with display / run example** enabled, matching the full client `include example` option):

### C/C++ encryption (UNICODE example)

```cpp
// encrypted with https://www.stringencrypt.com (v1.5.0) [C/C++]
#include <cstdio>
#include <cwchar>
// wszLabel = "C/C++ String Encryption"
wchar_t wszLabel[24];

wszLabel[20] = 0xEDD6; wszLabel[22] = 0xA64D; wszLabel[3] = 0x733C; wszLabel[19] = 0x96B6;
wszLabel[12] = 0xBCA7; wszLabel[6] = 0xDBD5; wszLabel[18] = 0x8D05; wszLabel[1] = 0xD61B;
wszLabel[9] = 0x16AC; wszLabel[13] = 0xCA4A; wszLabel[16] = 0xAB02; wszLabel[8] = 0xB392;
wszLabel[21] = 0xE785; wszLabel[10] = 0x18AB; wszLabel[14] = 0x2AF8; wszLabel[23] = 0x7099;
wszLabel[5] = 0xAF1B; wszLabel[15] = 0xFC72; wszLabel[7] = 0x05AE; wszLabel[0] = 0x9BF3;
wszLabel[2] = 0x14D8; wszLabel[4] = 0xD30F; wszLabel[11] = 0xEDE7; wszLabel[17] = 0x1158;

for (volatile unsigned int iZASt = 0, tmLMB = 0; iZASt < 24; iZASt++)
{
	tmLMB = wszLabel[iZASt];
	for (unsigned int sfIcm = 0; sfIcm < 2; sfIcm++)
	{
		for (unsigned int MUhVa = 0; MUhVa < 3; MUhVa++)
		{
			tmLMB = (tmLMB ^ (((tmLMB & 0xFFFF) << 15) & 0xFFFF)) & 0xFFFF;
			tmLMB = (((tmLMB & 0xFFFF) << (iZASt % 16)) | ((tmLMB & 0xFFFF) >> (16 - (iZASt % 16)))) & 0xFFFF;
		}
	}
	tmLMB = (tmLMB ^ 0x2BFD) & 0xFFFF;
	tmLMB = (((tmLMB & 0xFFFF) >> 8) | ((tmLMB & 0xFFFF) << 8)) & 0xFFFF;
	for (unsigned int qiTBF = 0; qiTBF < 2; qiTBF++)
	{
		tmLMB = ((tmLMB & 0xFFFF) - iZASt) & 0xFFFF;
		tmLMB = (((tmLMB & 0xFFFF) >> 8) | ((tmLMB & 0xFFFF) << 8)) & 0xFFFF;
	}
	tmLMB = ((tmLMB & 0xFFFF) - 0x51B1) & 0xFFFF;
	tmLMB = (((tmLMB & 0xFFFF) >> 8) | ((tmLMB & 0xFFFF) << 8)) & 0xFFFF;
	tmLMB = ((tmLMB ^ 0xFFFF) & 0xFFFF);
	tmLMB = ((tmLMB & 0xFFFF) + iZASt) & 0xFFFF;
	for (unsigned int HOCjn = 0; HOCjn < 4; HOCjn++)
	{
		tmLMB = (((tmLMB & 0xFFFF) >> 8) | ((tmLMB & 0xFFFF) << 8)) & 0xFFFF;
		tmLMB = ((tmLMB & 0xFFFF) - iZASt) & 0xFFFF;
		for (unsigned int JpQxh = 0; JpQxh < 2; JpQxh++)
		{
			tmLMB = (((tmLMB & 0xFFFF) >> 12) | ((tmLMB & 0xFFFF) << 4)) & 0xFFFF;
		}
	}
	wszLabel[iZASt] = tmLMB;
}

fputws(wszLabel, stdout);
fputwc(L'\n', stdout);
```

### C# Sharp encryption (UNICODE example)

```csharp
// encrypted with https://www.stringencrypt.com (v1.5.0) [C#]
// superSecretString = "Easy encryption in C#"
String superSecretString = "\uA1A2\uE379\uB64C\u7816\u238A\uD7E4\u0CFA\uD465" +
                           "\u7CE4\uA305\u2C46\uD27B\u533A\u6F43\u91A5\u3B36" +
                           "\u181E\uC1B8\uA827\uC1FC\u9073";

for (int ugcqt = 0, TSGdn = 0; ugcqt < 21; ugcqt++)
{
	TSGdn = superSecretString[ugcqt];
	TSGdn = (((TSGdn & 0xFFFF) << (ugcqt % 16)) | ((TSGdn & 0xFFFF) >> (16 - (ugcqt % 16)))) & 0xFFFF;
	TSGdn = (TSGdn ^ ugcqt) & 0xFFFF;
	for (int IjFDX = 0; IjFDX < 3; IjFDX++)
	{
		for (int scVKQ = 0; scVKQ < 2; scVKQ++)
		{
			TSGdn = (TSGdn ^ (((TSGdn & 0xFFFF) << 9) & 0xFFFF)) & 0xFFFF;
			for (int tKeJi = 0; tKeJi < 4; tKeJi++)
			{
				TSGdn = (((TSGdn & 0xFFFF) << (ugcqt % 16)) | ((TSGdn & 0xFFFF) >> (16 - (ugcqt % 16)))) & 0xFFFF;
				TSGdn = ((TSGdn & 0xFFFF) - 0x7198) & 0xFFFF;
				TSGdn = (TSGdn ^ 0xFFFF) & 0xFFFF;
			}
			TSGdn = (((TSGdn & 0xFFFF) << 6) | ((TSGdn & 0xFFFF) >> 10)) & 0xFFFF;
		}
		TSGdn = ((TSGdn & 0xFFFF) + 1) & 0xFFFF;
		for (int Hmtef = 0; Hmtef < 3; Hmtef++)
		{
			for (int CEwoz = 0; CEwoz < 2; CEwoz++)
			{
				TSGdn = (TSGdn ^ (((TSGdn & 0xFFFF) << 11) & 0xFFFF)) & 0xFFFF;
			}
		}
	}
	for (int OomDf = 0; OomDf < 3; OomDf++)
	{
		for (int WCOqH = 0; WCOqH < 4; WCOqH++)
		{
			TSGdn = (((TSGdn & 0xFFFF) >> 1) | ((TSGdn & 0xFFFF) << 15)) & 0xFFFF;
		}
		for (int ikutC = 0; ikutC < 2; ikutC++)
		{
			for (int HJjpq = 0; HJjpq < 2; HJjpq++)
			{
				TSGdn = (TSGdn ^ 0x5539) & 0xFFFF;
			}
			for (int FKCPT = 0; FKCPT < 3; FKCPT++)
			{
				TSGdn = (TSGdn ^ 0xFFFF) & 0xFFFF;
				TSGdn = ((TSGdn & 0xFFFF) + 0xC1C1) & 0xFFFF;
			}
			TSGdn = (TSGdn ^ (((TSGdn & 0xFFFF) << 10) & 0xFFFF)) & 0xFFFF;
		}
	}
	TSGdn = ((TSGdn & 0xFFFF) - ugcqt) & 0xFFFF;
	TSGdn = ((TSGdn & 0xFFFF) + 1) & 0xFFFF;
	TSGdn = ((TSGdn & 0xFFFF) + 0x6B27) & 0xFFFF;
	for (int knhQm = 0; knhQm < 2; knhQm++)
	{
		for (int dxIem = 0; dxIem < 4; dxIem++)
		{
			for (int LvAum = 0; LvAum < 3; LvAum++)
			{
				TSGdn = (((TSGdn & 0xFFFF) >> 2) | ((TSGdn & 0xFFFF) << 14)) & 0xFFFF;
				TSGdn = (((~(TSGdn & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF;
				TSGdn = (((TSGdn & 0xFFFF) << (ugcqt % 16)) | ((TSGdn & 0xFFFF) >> (16 - (ugcqt % 16)))) & 0xFFFF;
			}
		}
		TSGdn = ((TSGdn & 0xFFFF) - 1) & 0xFFFF;
		TSGdn = (TSGdn ^ ugcqt) & 0xFFFF;
	}
	TSGdn = (TSGdn ^ 0xEDF3) & 0xFFFF;
	TSGdn = (((TSGdn & 0xFFFF) >> (ugcqt % 16)) | ((TSGdn & 0xFFFF) << (16 - (ugcqt % 16)))) & 0xFFFF;
	TSGdn = (((~(TSGdn & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF;
	for (int tJDYH = 0; tJDYH < 2; tJDYH++)
	{
		for (int jqFXP = 0; jqFXP < 4; jqFXP++)
		{
			TSGdn = (((TSGdn & 0xFFFF) >> (ugcqt % 16)) | ((TSGdn & 0xFFFF) << (16 - (ugcqt % 16)))) & 0xFFFF;
			TSGdn = (((TSGdn & 0xFFFF) << 3) | ((TSGdn & 0xFFFF) >> 13)) & 0xFFFF;
			TSGdn = ((TSGdn & 0xFFFF) - 0x4E43) & 0xFFFF;
		}
	}
	superSecretString = superSecretString.Substring(0, ugcqt) + (char)(TSGdn & 0xFFFF) + superSecretString.Substring(ugcqt + 1);
}

MessageBox.Show(superSecretString);
```

### Visual Basic .NET encryption (UNICODE example)

```vbnet
' encrypted with https://www.stringencrypt.com (v1.5.0) [Visual Basic .NET]
' vbSecret = "Option Strict On in VB.NET"
Dim HudbE() As Integer = { &H6606, &H39FF, &H14BC, &HFFD1, &HF714, &HF242, &H6EBC, &H2E90,
                           &H2E4B, &H8DF2, &H9DD0, &H85C4, &HC1C3, &H37DD, &HD0D9, &H1C50,
                           &H3716, &H372F, &H13AC, &HF731, &HF5EC, &HF172, &H6F64, &H2F1B,
                           &HEE8D, &HAE75 }
Dim vbSecret As String
Dim XidVf As Integer
Dim oqtRy As Integer
Dim SKjiG As Integer
Dim QhyUd As Integer
Dim YHFWS As Integer
Dim EVNCa As Integer

Dim eRLNZ As Integer
For eRLNZ = 0 To 25
  XidVf = HudbE(eRLNZ)
  XidVf = (XidVf Xor eRLNZ) And &HFFFF
  XidVf = ((XidVf And &HFFFF) + 1) And &HFFFF
  For oqtRy = 0 To 1
    For SKjiG = 0 To 3
      XidVf = ((XidVf And &HFFFF) - eRLNZ) And &HFFFF
    Next
    XidVf = ((XidVf And &HFFFF) - &HF6B4) And &HFFFF
  Next
  XidVf = ((XidVf And &HFFFF) + 1) And &HFFFF
  XidVf = (((XidVf And &HFFFF) << (eRLNZ Mod 16)) Or ((XidVf And &HFFFF) >> (16 - (eRLNZ Mod 16)))) And &HFFFF
  For QhyUd = 0 To 3
    For YHFWS = 0 To 2
      XidVf = ((XidVf And &HFFFF) - 1) And &HFFFF
    Next
    XidVf = ((XidVf And &HFFFF) - &H4A45) And &HFFFF
    XidVf = (XidVf Xor eRLNZ) And &HFFFF
  Next
  XidVf = (((XidVf And &HFFFF) >> 8) Or ((XidVf And &HFFFF) << 8)) And &HFFFF
  XidVf = (XidVf Xor (((XidVf And &HFFFF) << 15) And &HFFFF)) And &HFFFF
  For EVNCa = 0 To 3
    XidVf = (XidVf Xor eRLNZ) And &HFFFF
    XidVf = (((XidVf And &HFFFF) >> 8) Or ((XidVf And &HFFFF) << 8)) And &HFFFF
  Next
  vbSecret = vbSecret + ChrW(XidVf And &HFFFF)
Next eRLNZ

MessageBox.Show(vbSecret)
```

### Delphi & Pascal encryption (UNICODE example)

```delphi
// encrypted with https://www.stringencrypt.com (v1.5.0) [Delphi / Pascal]
var
  // mySecret = "Delphi is awesome!"
  mySecret: array[0..19] of WideChar;
  HFisk: Integer;
  ZnzLM: Integer;
  XMlUh: Integer;
  pSdQr: Integer;
  clrza: Integer;
  GPvNR: Integer;
  lFOKB: Integer;

begin

  mySecret[6] := WideChar($EF77); mySecret[15] := WideChar($766A);
  mySecret[5] := WideChar($4E77); mySecret[1] := WideChar($F277);
  mySecret[2] := WideChar($3B77); mySecret[17] := WideChar($FE72);
  mySecret[14] := WideChar($7268); mySecret[9] := WideChar($9362);
  mySecret[0] := WideChar($EB77); mySecret[3] := WideChar($4B77);
  mySecret[13] := WideChar($E06A); mySecret[16] := WideChar($0A75);
  mySecret[11] := WideChar($5462); mySecret[4] := WideChar($AF74);
  mySecret[7] := WideChar($2A77); mySecret[10] := WideChar($F060);
  mySecret[8] := WideChar($FA64); mySecret[18] := WideChar($5F70);
  mySecret[12] := WideChar($4464);

  for lFOKB := 0 to 19 do
  begin
    HFisk := Ord(mySecret[lFOKB]);
    HFisk := (HFisk xor $FFFF) and $FFFF;
    HFisk := (HFisk xor lFOKB) and $FFFF;
    HFisk := ((HFisk and $FFFF) - $0124) and $FFFF;
    HFisk := ((HFisk and $FFFF) - lFOKB) and $FFFF;
    HFisk := (((HFisk and $FFFF) shr 8) or ((HFisk and $FFFF) shl 8)) and $FFFF;
    HFisk := (HFisk xor $168C) and $FFFF;
    HFisk := (((HFisk and $FFFF) shr 8) or ((HFisk and $FFFF) shl 8)) and $FFFF;
    HFisk := (((HFisk and $FFFF) xor $FFFF) + 1) and $FFFF;
    HFisk := (((HFisk and $FFFF) shr 8) or ((HFisk and $FFFF) shl 8)) and $FFFF;
    HFisk := (HFisk xor $FFFF) and $FFFF;
    for ZnzLM := 0 to 3 do
    begin
      HFisk := ((HFisk and $FFFF) + lFOKB) and $FFFF;
      for XMlUh := 0 to 2 do
      begin
        HFisk := (HFisk xor lFOKB) and $FFFF;
        HFisk := ((HFisk and $FFFF) + lFOKB) and $FFFF;
        HFisk := (HFisk xor ((HFisk and $FFFF) shr 10)) and $FFFF;
      end;
    end;
    HFisk := (HFisk xor $71DB) and $FFFF;
    HFisk := (HFisk xor ((HFisk and $FFFF) shr 8)) and $FFFF;
    for pSdQr := 0 to 2 do
    begin
      for clrza := 0 to 2 do
      begin
        HFisk := ((HFisk and $FFFF) - lFOKB) and $FFFF;
      end;
      HFisk := (HFisk xor $FFFF) and $FFFF;
      for GPvNR := 0 to 2 do
      begin
        HFisk := (HFisk xor lFOKB) and $FFFF;
        HFisk := (HFisk xor $FFFF) and $FFFF;
      end;
    end;
    mySecret[lFOKB] := WideChar(HFisk);
  end;

  ShowMessage(mySecret);
```

### Java encryption (UNICODE example)

```java
// encrypted with https://www.stringencrypt.com (v1.5.0) [Java]
// myJavaPassword = "Very secret password! QWERTY"
String myJavaPassword = "";

int LcnEg[] = { 0x8DEC, 0x1C11, 0x38B7, 0x7266, 0xE77C, 0xD369, 0xA92B, 0x6FC7,
                0xF70E, 0x331E, 0xEC3C, 0xF379, 0x0CF7, 0x51F2, 0x9BEC, 0x47EA,
                0x3008, 0xA052, 0x411F, 0x834F, 0x09B7, 0x16F6, 0x36CC, 0x7088,
                0x1D71, 0x75E2, 0x6445, 0x9E8B };

for (int syzDT = 0, ZAfcE = 0; syzDT < 28; syzDT++)
{
	ZAfcE = LcnEg[syzDT];
	ZAfcE = (((ZAfcE & 0xFFFF) >>> 13) | ((ZAfcE & 0xFFFF) << 3)) & 0xFFFF;
	ZAfcE = (((ZAfcE & 0xFFFF) >>> (syzDT % 16)) | ((ZAfcE & 0xFFFF) << (16 - (syzDT % 16)))) & 0xFFFF;
	ZAfcE = (((~(ZAfcE & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF;
	ZAfcE = (((ZAfcE & 0xFFFF) >>> 8) | ((ZAfcE & 0xFFFF) << 8)) & 0xFFFF;
	for (int gyKZB = 0; gyKZB < 3; gyKZB++)
	{
		ZAfcE = ((ZAfcE & 0xFFFF) - 0xAE0D) & 0xFFFF;
	}
	ZAfcE = ((ZAfcE & 0xFFFF) + syzDT) & 0xFFFF;
	for (int KnuGq = 0; KnuGq < 4; KnuGq++)
	{
		for (int kbnLT = 0; kbnLT < 4; kbnLT++)
		{
			ZAfcE = (((ZAfcE & 0xFFFF) >>> 8) | ((ZAfcE & 0xFFFF) << 8)) & 0xFFFF;
		}
		ZAfcE = (ZAfcE ^ syzDT) & 0xFFFF;
	}
	ZAfcE = (((ZAfcE & 0xFFFF) >>> 8) | ((ZAfcE & 0xFFFF) << 8)) & 0xFFFF;
	for (int oVJfW = 0; oVJfW < 3; oVJfW++)
	{
		ZAfcE = (ZAfcE ^ 0xC49D) & 0xFFFF;
		for (int LzJBK = 0; LzJBK < 2; LzJBK++)
		{
			ZAfcE = ((ZAfcE & 0xFFFF) - 1) & 0xFFFF;
		}
	}
	for (int JKcZp = 0; JKcZp < 2; JKcZp++)
	{
		ZAfcE = (ZAfcE ^ syzDT) & 0xFFFF;
		for (int kvRTO = 0; kvRTO < 2; kvRTO++)
		{
			for (int uFglb = 0; uFglb < 2; uFglb++)
			{
				ZAfcE = (((ZAfcE & 0xFFFF) << 7) | ((ZAfcE & 0xFFFF) >>> 9)) & 0xFFFF;
			}
			ZAfcE = (ZAfcE ^ 0xFFFF) & 0xFFFF;
		}
	}
	ZAfcE = ((ZAfcE & 0xFFFF) + 0x4453) & 0xFFFF;
	ZAfcE = (((ZAfcE & 0xFFFF) >>> 8) | ((ZAfcE & 0xFFFF) << 8)) & 0xFFFF;
	myJavaPassword = myJavaPassword + (char)(ZAfcE & 0xFFFF);
}

System.out.println(myJavaPassword);
```

### Kotlin encryption (UNICODE example)

```kotlin
// encrypted with https://www.stringencrypt.com (v1.5.0) [Kotlin]
// kotlinSecret = "Kotlin on the JVM"
var kotlinSecret: String = ""

val MapNJ: IntArray = intArrayOf( 0x4B2E, 0x0223, 0xC7ED, 0x4032, 0x96E3, 0x7865, 0x23EB, 0x599C,
                                  0xC383, 0x264E, 0x5F09, 0x7EFE, 0xA113, 0xA2A3, 0x00E5, 0x780D,
                                  0x8E55 )

var Qtqma: Int = 0
for (LZjJi in 0 until 17)
{
	Qtqma = MapNJ[LZjJi]
	Qtqma = ((Qtqma and 0xFFFF) + 0xA521) and 0xFFFF
	Qtqma = (Qtqma xor (((Qtqma and 0xFFFF) shl 10) and 0xFFFF)) and 0xFFFF
	for (rZUBD in 0 until 4)
	{
		for (ZXqdA in 0 until 2)
		{
			Qtqma = (((Qtqma and 0xFFFF) shr (LZjJi % 16)) or ((Qtqma and 0xFFFF) shl (16 - (LZjJi % 16)))) and 0xFFFF
			for (vxUnf in 0 until 4)
			{
				Qtqma = ((Qtqma and 0xFFFF) + 0x0CA9) and 0xFFFF
				Qtqma = ((Qtqma and 0xFFFF) - 1) and 0xFFFF
				Qtqma = (((Qtqma and 0xFFFF) xor 0xFFFF) + 1) and 0xFFFF
			}
		}
		for (VawkG in 0 until 3)
		{
			Qtqma = ((Qtqma and 0xFFFF) - LZjJi) and 0xFFFF
			Qtqma = ((Qtqma and 0xFFFF) + 0xC4AF) and 0xFFFF
			for (JnHMU in 0 until 2)
			{
				Qtqma = (((Qtqma and 0xFFFF) shl 11) or ((Qtqma and 0xFFFF) shr 5)) and 0xFFFF
				Qtqma = (((Qtqma and 0xFFFF) shl (LZjJi % 16)) or ((Qtqma and 0xFFFF) shr (16 - (LZjJi % 16)))) and 0xFFFF
			}
		}
	}
	Qtqma = (Qtqma xor 0x1E6F) and 0xFFFF
	Qtqma = (Qtqma xor LZjJi) and 0xFFFF
	Qtqma = (((Qtqma and 0xFFFF) shl (LZjJi % 16)) or ((Qtqma and 0xFFFF) shr (16 - (LZjJi % 16)))) and 0xFFFF
	Qtqma = ((Qtqma and 0xFFFF) - 1) and 0xFFFF
	for (DBMXv in 0 until 4)
	{
		Qtqma = (((Qtqma and 0xFFFF) shr (LZjJi % 16)) or ((Qtqma and 0xFFFF) shl (16 - (LZjJi % 16)))) and 0xFFFF
		for (SvQUI in 0 until 3)
		{
			Qtqma = (Qtqma xor ((Qtqma and 0xFFFF) shr 10)) and 0xFFFF
		}
		Qtqma = ((Qtqma and 0xFFFF) - LZjJi) and 0xFFFF
	}
	for (wIdsO in 0 until 4)
	{
		for (bQekV in 0 until 3)
		{
			for (ybGvH in 0 until 2)
			{
				Qtqma = ((Qtqma and 0xFFFF) - 0xC2FD) and 0xFFFF
			}
			Qtqma = ((Qtqma and 0xFFFF) - 1) and 0xFFFF
		}
		for (FbYSu in 0 until 2)
		{
			Qtqma = (((Qtqma and 0xFFFF) shl 4) or ((Qtqma and 0xFFFF) shr 12)) and 0xFFFF
			for (FlDtI in 0 until 4)
			{
				Qtqma = ((Qtqma and 0xFFFF) + 0xDAE9) and 0xFFFF
				Qtqma = ((Qtqma and 0xFFFF) - 1) and 0xFFFF
			}
		}
		for (MFZJI in 0 until 3)
		{
			Qtqma = (Qtqma xor 0x4B9F) and 0xFFFF
		}
	}
	for (aIwem in 0 until 2)
	{
		Qtqma = ((Qtqma and 0xFFFF) - 1) and 0xFFFF
		Qtqma = (Qtqma xor LZjJi) and 0xFFFF
		Qtqma = ((Qtqma and 0xFFFF) - LZjJi) and 0xFFFF
	}
	for (zEwAM in 0 until 4)
	{
		Qtqma = (((Qtqma and 0xFFFF) shr 1) or ((Qtqma and 0xFFFF) shl 15)) and 0xFFFF
	}
	for (ygZUD in 0 until 2)
	{
		for (jgfsh in 0 until 2)
		{
			for (bwAuM in 0 until 3)
			{
				Qtqma = ((Qtqma and 0xFFFF) - LZjJi) and 0xFFFF
				Qtqma = (Qtqma xor 0xA8C1) and 0xFFFF
			}
		}
	}
	for (SmKCk in 0 until 2)
	{
		Qtqma = ((Qtqma and 0xFFFF) - 0x2E59) and 0xFFFF
		Qtqma = (((Qtqma and 0xFFFF) shr 8) or ((Qtqma and 0xFFFF) shl 8)) and 0xFFFF
		for (nFtXV in 0 until 4)
		{
			Qtqma = ((Qtqma and 0xFFFF) + 0xB7F5) and 0xFFFF
		}
	}
	for (lmKPC in 0 until 4)
	{
		for (xrXVo in 0 until 4)
		{
			Qtqma = (((Qtqma and 0xFFFF) shl (LZjJi % 16)) or ((Qtqma and 0xFFFF) shr (16 - (LZjJi % 16)))) and 0xFFFF
		}
		for (eFaSv in 0 until 2)
		{
			for (zauAC in 0 until 4)
			{
				Qtqma = (((Qtqma and 0xFFFF) xor 0xFFFF) + 1) and 0xFFFF
			}
			for (HOFwY in 0 until 3)
			{
				Qtqma = (Qtqma xor ((Qtqma and 0xFFFF) shr 15)) and 0xFFFF
				Qtqma = (Qtqma xor 0x249B) and 0xFFFF
				Qtqma = (((Qtqma and 0xFFFF) shr 8) or ((Qtqma and 0xFFFF) shl 8)) and 0xFFFF
			}
			Qtqma = (((Qtqma and 0xFFFF) shr (LZjJi % 16)) or ((Qtqma and 0xFFFF) shl (16 - (LZjJi % 16)))) and 0xFFFF
		}
	}
	for (Kheuf in 0 until 3)
	{
		Qtqma = (Qtqma xor LZjJi) and 0xFFFF
		for (cZgxP in 0 until 2)
		{
			Qtqma = (Qtqma xor ((Qtqma and 0xFFFF) shr 12)) and 0xFFFF
			Qtqma = ((Qtqma and 0xFFFF) - LZjJi) and 0xFFFF
		}
		for (UDeIb in 0 until 2)
		{
			Qtqma = (((Qtqma and 0xFFFF) shr (LZjJi % 16)) or ((Qtqma and 0xFFFF) shl (16 - (LZjJi % 16)))) and 0xFFFF
			Qtqma = (Qtqma xor LZjJi) and 0xFFFF
		}
	}
	kotlinSecret += (Qtqma and 0xFFFF).toChar()
}

println(kotlinSecret)
```

### JavaScript encryption (ANSI)

```js
<script type="text/javascript">
// encrypted with https://www.stringencrypt.com (v1.5.0) [JavaScript]
// hiddenJavaScriptString = "How to encrypt string in JavaScript? That\'s how!"
var hiddenJavaScriptString;

hiddenJavaScriptString = String.fromCharCode(0x16, 0x1A, 0x4B, 0x5F, 0xA2, 0xB5, 0x72, 0xB7,
                                             0x13, 0x17, 0x51, 0x45, 0x31, 0x5B, 0x66, 0xD6,
                                             0x78, 0x00, 0xEF, 0x0A, 0xAF, 0x64, 0x35, 0x78,
                                             0x93, 0xC7, 0x2F, 0x20, 0x26, 0xAA, 0x8C, 0x84,
                                             0x18, 0xF5, 0x49, 0x38, 0x14, 0xB3, 0x1C, 0x20,
                                             0x34, 0x81, 0x8A, 0x6B, 0x13, 0xC7, 0x56, 0x81);

for (var bSfCi = 0, egLpQ = 0; bSfCi < 48; bSfCi++)
{
	egLpQ = hiddenJavaScriptString.charCodeAt(bSfCi);
	for (var aQdCH = 0; aQdCH < 3; aQdCH++)
	{
		egLpQ = (((egLpQ & 0xFF) >>> 4) | ((egLpQ & 0xFF) << 4)) & 0xFF;
	}
	egLpQ = (egLpQ ^ ((egLpQ & 0xFF) >>> 4)) & 0xFF;
	for (var EbHLk = 0; EbHLk < 2; EbHLk++)
	{
		egLpQ = ((egLpQ & 0xFF) + 1) & 0xFF;
		egLpQ = (egLpQ ^ bSfCi) & 0xFF;
	}
	for (var jxAbD = 0; jxAbD < 4; jxAbD++)
	{
		for (var bZsUm = 0; bZsUm < 3; bZsUm++)
		{
			egLpQ = (egLpQ ^ (((egLpQ & 0xFF) << 5) & 0xFF)) & 0xFF;
		}
		for (var gHYeD = 0; gHYeD < 4; gHYeD++)
		{
			egLpQ = ((egLpQ & 0xFF) + 0x93) & 0xFF;
			egLpQ = ((egLpQ & 0xFF) - bSfCi) & 0xFF;
			for (var coFQk = 0; coFQk < 2; coFQk++)
			{
				egLpQ = (((egLpQ & 0xFF) >>> (bSfCi % 8)) | ((egLpQ & 0xFF) << (8 - (bSfCi % 8)))) & 0xFF;
				egLpQ = ((egLpQ & 0xFF) + 0xB2) & 0xFF;
			}
		}
	}
	for (var TwAVr = 0; TwAVr < 2; TwAVr++)
	{
		for (var usPxq = 0; usPxq < 4; usPxq++)
		{
			egLpQ = ((egLpQ & 0xFF) - bSfCi) & 0xFF;
			egLpQ = (((~(egLpQ & 0xFF)) & 0xFF) + 1) & 0xFF;
			egLpQ = (egLpQ ^ 0x6A) & 0xFF;
		}
	}
	egLpQ = (((egLpQ & 0xFF) << (bSfCi % 8)) | ((egLpQ & 0xFF) >>> (8 - (bSfCi % 8)))) & 0xFF;
	egLpQ = (egLpQ ^ (((egLpQ & 0xFF) << 6) & 0xFF)) & 0xFF;
	egLpQ = ((egLpQ & 0xFF) - 0x01) & 0xFF;
	egLpQ = (((egLpQ & 0xFF) >>> (bSfCi % 8)) | ((egLpQ & 0xFF) << (8 - (bSfCi % 8)))) & 0xFF;
	for (var CXibH = 0; CXibH < 3; CXibH++)
	{
		for (var vHdOC = 0; vHdOC < 4; vHdOC++)
		{
			egLpQ = ((egLpQ & 0xFF) + 0x20) & 0xFF;
		}
		for (var yvjew = 0; yvjew < 2; yvjew++)
		{
			for (var onYQB = 0; onYQB < 4; onYQB++)
			{
				egLpQ = (egLpQ ^ bSfCi) & 0xFF;
			}
			egLpQ = (((egLpQ & 0xFF) >>> 4) | ((egLpQ & 0xFF) << 4)) & 0xFF;
			egLpQ = (((egLpQ & 0xFF) << (bSfCi % 8)) | ((egLpQ & 0xFF) >>> (8 - (bSfCi % 8)))) & 0xFF;
		}
	}
	for (var KqaIN = 0; KqaIN < 3; KqaIN++)
	{
		egLpQ = ((egLpQ & 0xFF) - 1) & 0xFF;
		egLpQ = (((egLpQ & 0xFF) >>> 4) | ((egLpQ & 0xFF) << 4)) & 0xFF;
		for (var uiNqF = 0; uiNqF < 2; uiNqF++)
		{
			egLpQ = (egLpQ ^ (((egLpQ & 0xFF) << 5) & 0xFF)) & 0xFF;
			for (var kGYAO = 0; kGYAO < 4; kGYAO++)
			{
				egLpQ = (((egLpQ & 0xFF) >>> (bSfCi % 8)) | ((egLpQ & 0xFF) << (8 - (bSfCi % 8)))) & 0xFF;
				egLpQ = ((egLpQ & 0xFF) - 1) & 0xFF;
				egLpQ = (egLpQ ^ 0x1B) & 0xFF;
			}
			for (var oCMrO = 0; oCMrO < 2; oCMrO++)
			{
				egLpQ = (egLpQ ^ (((egLpQ & 0xFF) << 6) & 0xFF)) & 0xFF;
				egLpQ = ((egLpQ & 0xFF) + 1) & 0xFF;
			}
		}
	}
	egLpQ = (((egLpQ & 0xFF) << 6) | ((egLpQ & 0xFF) >>> 2)) & 0xFF;
	for (var kincR = 0; kincR < 2; kincR++)
	{
		egLpQ = ((egLpQ & 0xFF) + 0x0F) & 0xFF;
		egLpQ = ((egLpQ & 0xFF) + bSfCi) & 0xFF;
		egLpQ = (egLpQ ^ ((egLpQ & 0xFF) >>> 5)) & 0xFF;
	}
	for (var ExphN = 0; ExphN < 3; ExphN++)
	{
		egLpQ = (egLpQ ^ (((egLpQ & 0xFF) << 7) & 0xFF)) & 0xFF;
		egLpQ = (((egLpQ & 0xFF) >>> 4) | ((egLpQ & 0xFF) << 4)) & 0xFF;
		egLpQ = ((egLpQ & 0xFF) - 1) & 0xFF;
	}
	hiddenJavaScriptString = hiddenJavaScriptString.substr(0, bSfCi) + String.fromCharCode(egLpQ & 0xFF) + hiddenJavaScriptString.substr(bSfCi + 1);
}

alert(hiddenJavaScriptString);
</script>
```

### Ruby encryption (UNICODE example)

```ruby
# encrypted with https://www.stringencrypt.com (v1.5.0) [Ruby]
# ruby = "Ruby on rails"
ruby = [ 0x441E, 0x69DE, 0xE834, 0x7022, 0x2CEA, 0x5753, 0x7FCC, 0x4F84,
         0x6E7B, 0xC534, 0x8EF9, 0xA4E7, 0xD30C ]

ruby.each_with_index do |qawdj, vdyrt|
  4.times do
    qawdj = ((qawdj & 0xFFFF) - vdyrt) & 0xFFFF
    qawdj = ((qawdj & 0xFFFF) + 0xD208) & 0xFFFF
    qawdj = (((qawdj & 0xFFFF) >> 3) | ((qawdj & 0xFFFF) << 13)) & 0xFFFF
  end
  qawdj = (((qawdj & 0xFFFF) >> 8) | ((qawdj & 0xFFFF) << 8)) & 0xFFFF
  qawdj = (((qawdj & 0xFFFF) >> 8) | ((qawdj & 0xFFFF) << 8)) & 0xFFFF
  3.times do
    qawdj = ((qawdj & 0xFFFF) + 0x1812) & 0xFFFF
    qawdj = (((qawdj & 0xFFFF) << 12) | ((qawdj & 0xFFFF) >> 4)) & 0xFFFF
  end
  qawdj = (((qawdj & 0xFFFF) >> (vdyrt % 16)) | ((qawdj & 0xFFFF) << (16 - (vdyrt % 16)))) & 0xFFFF
  qawdj = ((qawdj & 0xFFFF) + vdyrt) & 0xFFFF
  qawdj = (((~(qawdj & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF
  qawdj = (((qawdj & 0xFFFF) << 7) | ((qawdj & 0xFFFF) >> 9)) & 0xFFFF
  qawdj = (qawdj ^ 0xF8E7) & 0xFFFF
  qawdj = (((qawdj & 0xFFFF) >> (vdyrt % 16)) | ((qawdj & 0xFFFF) << (16 - (vdyrt % 16)))) & 0xFFFF
  3.times do
    qawdj = (((qawdj & 0xFFFF) >> 8) | ((qawdj & 0xFFFF) << 8)) & 0xFFFF
    qawdj = ((qawdj & 0xFFFF) + 0x2B01) & 0xFFFF
  end
  2.times do
    4.times do
      3.times do
        qawdj = (qawdj ^ (((qawdj & 0xFFFF) << 15) & 0xFFFF)) & 0xFFFF
      end
    end
    2.times do
      qawdj = (((qawdj & 0xFFFF) >> 15) | ((qawdj & 0xFFFF) << 1)) & 0xFFFF
      4.times do
        qawdj = (qawdj ^ ((qawdj & 0xFFFF) >> 8)) & 0xFFFF
      end
      qawdj = (qawdj ^ (((qawdj & 0xFFFF) << 8) & 0xFFFF)) & 0xFFFF
    end
  end
  3.times do
    2.times do
      qawdj = ((qawdj & 0xFFFF) + 0xA961) & 0xFFFF
      4.times do
        qawdj = (qawdj ^ ((qawdj & 0xFFFF) >> 12)) & 0xFFFF
        qawdj = (((qawdj & 0xFFFF) >> 8) | ((qawdj & 0xFFFF) << 8)) & 0xFFFF
      end
      qawdj = ((qawdj & 0xFFFF) + 0x95E6) & 0xFFFF
    end
    qawdj = (qawdj ^ 0xFFFF) & 0xFFFF
  end
  qawdj = (((qawdj & 0xFFFF) << 11) | ((qawdj & 0xFFFF) >> 5)) & 0xFFFF
  4.times do
    2.times do
      qawdj = (((qawdj & 0xFFFF) << (vdyrt % 16)) | ((qawdj & 0xFFFF) >> (16 - (vdyrt % 16)))) & 0xFFFF
      4.times do
        qawdj = ((qawdj & 0xFFFF) - 1) & 0xFFFF
      end
    end
    qawdj = ((qawdj & 0xFFFF) + 1) & 0xFFFF
  end
  ruby[vdyrt] = qawdj & 0xFFFF
end
ruby = ruby.pack('v*').force_encoding('UTF-16LE').encode('UTF-8')

puts ruby
```

### Python encryption (UNICODE example)

## Plain text Python string encryption
```python
cute_wabbit = "A little girl goes into a pet show and asks for a wabbit... http..."
```

to:

```python
# encrypted with https://www.stringencrypt.com (v1.5.0) [Python]
# -*- coding: utf-8 -*-
# cute_wabbit = "A little girl goes into a pet show and asks for a wabbit... http..."
cute_wabbit = [0xAC75, 0xD6D1, 0xC0F3, 0xCE7E, 0xE4E9, 0x5E85, 0x6E48, 0xB038,
               0x9325, 0xD141, 0x2CAE, 0x2680, 0x7E27, 0x6E40, 0x8CDF, 0x9840,
               0xBCB0, 0x75A0, 0xAD1A, 0x09AC, 0x9D01, 0x35D2, 0xD712, 0x6F69,
               0xA53D, 0x75B8, 0xAE25, 0x266F, 0xEA84, 0xCA81, 0x6855, 0x6BB6,
               0x9BE8, 0xC002, 0xA622, 0x709E, 0x9732, 0x48F4, 0x3E73, 0x6AD4,
               0x135C, 0xD181, 0x65E9, 0x220A, 0xFE25, 0x9F0D, 0x82B1, 0x0C97,
               0x4567, 0xAF11, 0xDC07, 0x98E6, 0x3202, 0x5B80, 0x923C, 0xE3A9,
               0x9EF2, 0xF11A, 0xEFA1, 0x70EB, 0x5BCF, 0xC56D, 0x1D7B, 0x638C,
               0xE11D, 0x9BD2, 0x513F]

for qoPms in range(67):
    jmsGR = cute_wabbit[qoPms]
    jmsGR = ((jmsGR & 0xFFFF) + 0x97C3) & 0xFFFF
    jmsGR = (jmsGR ^ ((jmsGR & 0xFFFF) >> 13)) & 0xFFFF
    for znegy in range(2):
        jmsGR = (((jmsGR & 0xFFFF) >> (qoPms % 16)) | ((jmsGR & 0xFFFF) << (16 - (qoPms % 16)))) & 0xFFFF
        for dwJcX in range(3):
            jmsGR = ((jmsGR & 0xFFFF) + 1) & 0xFFFF
            jmsGR = (jmsGR ^ 0xFFFF) & 0xFFFF
            for QpYFt in range(4):
                jmsGR = (((jmsGR & 0xFFFF) >> (qoPms % 16)) | ((jmsGR & 0xFFFF) << (16 - (qoPms % 16)))) & 0xFFFF
                jmsGR = (jmsGR ^ 0x6701) & 0xFFFF
                jmsGR = (((jmsGR & 0xFFFF) >> 5) | ((jmsGR & 0xFFFF) << 11)) & 0xFFFF
    for TUYrh in range(4):
        jmsGR = (((jmsGR & 0xFFFF) << (qoPms % 16)) | ((jmsGR & 0xFFFF) >> (16 - (qoPms % 16)))) & 0xFFFF
        for HdbmR in range(4):
            jmsGR = ((jmsGR & 0xFFFF) - 1) & 0xFFFF
    for lrOZq in range(4):
        jmsGR = (((~(jmsGR & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF
        for VqmkO in range(2):
            for ZIsub in range(4):
                jmsGR = ((jmsGR & 0xFFFF) + 1) & 0xFFFF
            jmsGR = (((jmsGR & 0xFFFF) << (qoPms % 16)) | ((jmsGR & 0xFFFF) >> (16 - (qoPms % 16)))) & 0xFFFF
        for XznKW in range(4):
            jmsGR = (jmsGR ^ qoPms) & 0xFFFF
            jmsGR = (((jmsGR & 0xFFFF) >> 8) | ((jmsGR & 0xFFFF) << 8)) & 0xFFFF
    jmsGR = ((jmsGR & 0xFFFF) - 1) & 0xFFFF
    for AflZi in range(2):
        for XJsoA in range(4):
            for bfcXt in range(2):
                jmsGR = ((jmsGR & 0xFFFF) + qoPms) & 0xFFFF
                jmsGR = (jmsGR ^ 0x5166) & 0xFFFF
                jmsGR = ((jmsGR & 0xFFFF) - 1) & 0xFFFF
            jmsGR = (((jmsGR & 0xFFFF) << 12) | ((jmsGR & 0xFFFF) >> 4)) & 0xFFFF
            jmsGR = (jmsGR ^ 0x0D9D) & 0xFFFF
        for iaOnJ in range(3):
            jmsGR = ((jmsGR & 0xFFFF) + 1) & 0xFFFF
        jmsGR = (((jmsGR & 0xFFFF) << 9) | ((jmsGR & 0xFFFF) >> 7)) & 0xFFFF
    for bdijX in range(4):
        jmsGR = ((jmsGR & 0xFFFF) + 1) & 0xFFFF
    for QRKMA in range(3):
        for yOQqG in range(3):
            jmsGR = (jmsGR ^ qoPms) & 0xFFFF
            for Rvjzn in range(2):
                jmsGR = ((jmsGR & 0xFFFF) + 1) & 0xFFFF
        jmsGR = ((jmsGR & 0xFFFF) + qoPms) & 0xFFFF
    jmsGR = ((jmsGR & 0xFFFF) - 0xF65D) & 0xFFFF
    jmsGR = ((jmsGR & 0xFFFF) - 1) & 0xFFFF
    for euRAN in range(2):
        jmsGR = (jmsGR ^ 0xFFFF) & 0xFFFF
        jmsGR = (((jmsGR & 0xFFFF) << 8) | ((jmsGR & 0xFFFF) >> 8)) & 0xFFFF
    jmsGR = (jmsGR ^ ((jmsGR & 0xFFFF) >> 11)) & 0xFFFF
    for woETk in range(3):
        for YJSUn in range(4):
            jmsGR = ((jmsGR & 0xFFFF) + 1) & 0xFFFF
    cute_wabbit[qoPms] = jmsGR

cute_wabbit = ''.join(chr(jmsGR & 0xFFFF) for jmsGR in cute_wabbit)

del qoPms, jmsGR

print(cute_wabbit)
```


### Dart encryption (UNICODE example)

```dart
// encrypted with https://www.stringencrypt.com (v1.5.0) [Dart]
// dartSecret = "Dart null-safe strings"
String dartSecret = '\u{8BBE}\u{07F5}\u{900D}\u{47C5}\u{6C7D}\u{3986}\u{801A}\u{B154}' +
                    '\u{A013}\u{33CF}\u{5586}\u{B661}\u{329E}\u{343A}\u{AC1D}\u{9752}' +
                    '\u{F397}\u{36CA}\u{258B}\u{4C90}\u{6759}\u{4238}';

for (int eHdaK = 0, xNhfY = 0; eHdaK < 22; eHdaK++)
{
	xNhfY = (dartSecret.codeUnitAt(eHdaK));
	for (int UkmTW = 0; UkmTW < 3; UkmTW++)
	{
		xNhfY = ((xNhfY & 0xFFFF) + eHdaK) & 0xFFFF;
		xNhfY = ((xNhfY & 0xFFFF) + 1) & 0xFFFF;
	}
	for (int xTQZL = 0; xTQZL < 2; xTQZL++)
	{
		xNhfY = (((xNhfY & 0xFFFF) >> (eHdaK % 16)) | ((xNhfY & 0xFFFF) << (16 - (eHdaK % 16)))) & 0xFFFF;
		xNhfY = ((xNhfY & 0xFFFF) + 0x6486) & 0xFFFF;
	}
	for (int TnAxM = 0; TnAxM < 4; TnAxM++)
	{
		for (int rnkwZ = 0; rnkwZ < 2; rnkwZ++)
		{
			xNhfY = (((xNhfY & 0xFFFF) >> (eHdaK % 16)) | ((xNhfY & 0xFFFF) << (16 - (eHdaK % 16)))) & 0xFFFF;
			xNhfY = ((xNhfY & 0xFFFF) - eHdaK) & 0xFFFF;
		}
		for (int fxhZW = 0; fxhZW < 4; fxhZW++)
		{
			xNhfY = (xNhfY ^ 0x92F4) & 0xFFFF;
		}
		xNhfY = ((xNhfY & 0xFFFF) - 1) & 0xFFFF;
	}
	xNhfY = (xNhfY ^ ((xNhfY & 0xFFFF) >> 10)) & 0xFFFF;
	for (int nozUF = 0; nozUF < 3; nozUF++)
	{
		xNhfY = (((xNhfY & 0xFFFF) << (eHdaK % 16)) | ((xNhfY & 0xFFFF) >> (16 - (eHdaK % 16)))) & 0xFFFF;
	}
	xNhfY = (xNhfY ^ 0x7948) & 0xFFFF;
	for (int gROwa = 0; gROwa < 3; gROwa++)
	{
		xNhfY = (((~(xNhfY & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF;
		for (int GyLBD = 0; GyLBD < 4; GyLBD++)
		{
			for (int xnTDg = 0; xnTDg < 4; xnTDg++)
			{
				xNhfY = ((xNhfY & 0xFFFF) + eHdaK) & 0xFFFF;
			}
			for (int czReq = 0; czReq < 3; czReq++)
			{
				xNhfY = (((~(xNhfY & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF;
				xNhfY = (((xNhfY & 0xFFFF) >> 8) | ((xNhfY & 0xFFFF) << 8)) & 0xFFFF;
				xNhfY = (((~(xNhfY & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF;
			}
			xNhfY = (((xNhfY & 0xFFFF) >> 7) | ((xNhfY & 0xFFFF) << 9)) & 0xFFFF;
		}
	}
	xNhfY = (xNhfY ^ 0x1B95) & 0xFFFF;
	xNhfY = (xNhfY ^ ((xNhfY & 0xFFFF) >> 10)) & 0xFFFF;
	for (int JtOdF = 0; JtOdF < 4; JtOdF++)
	{
		for (int VYzxK = 0; VYzxK < 4; VYzxK++)
		{
			for (int gnUAS = 0; gnUAS < 2; gnUAS++)
			{
				xNhfY = ((xNhfY & 0xFFFF) + 0xF25D) & 0xFFFF;
				xNhfY = (((xNhfY & 0xFFFF) << 5) | ((xNhfY & 0xFFFF) >> 11)) & 0xFFFF;
				xNhfY = ((xNhfY & 0xFFFF) + eHdaK) & 0xFFFF;
			}
		}
		for (int NFGjY = 0; NFGjY < 2; NFGjY++)
		{
			xNhfY = (xNhfY ^ 0xFFFF) & 0xFFFF;
			for (int mZcBl = 0; mZcBl < 4; mZcBl++)
			{
				xNhfY = ((xNhfY & 0xFFFF) + eHdaK) & 0xFFFF;
				xNhfY = (xNhfY ^ (((xNhfY & 0xFFFF) << 10) & 0xFFFF)) & 0xFFFF;
			}
		}
	}
	xNhfY = (((xNhfY & 0xFFFF) >> (eHdaK % 16)) | ((xNhfY & 0xFFFF) << (16 - (eHdaK % 16)))) & 0xFFFF;
	xNhfY = (((~(xNhfY & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF;
	// TODO: immutable String; use StringBuffer or runes for production
	dartSecret = dartSecret.substring(0, eHdaK) + String.fromCharCode(xNhfY & 0xFFFF) + dartSecret.substring(eHdaK + 1);
}

print(dartSecret);
```

### Go encryption (UNICODE example)

```go
// encrypted with https://www.stringencrypt.com (v1.5.0) [Go]

import (
	"fmt"
	"unicode/utf16"
)
// secretGo = "Go string encryption"
var IdORV [21]uint16

IdORV[0] = 0x05BA IdORV[10] = 0xD7DB IdORV[12] = 0x9261 IdORV[7] = 0xF7B2
IdORV[3] = 0x353D IdORV[15] = 0x8969 IdORV[20] = 0x4A86 IdORV[6] = 0x25C5
IdORV[2] = 0xFB61 IdORV[18] = 0x97E2 IdORV[17] = 0xEBA7 IdORV[16] = 0xDD8D
IdORV[19] = 0xE53D IdORV[11] = 0xF7E8 IdORV[13] = 0x2604 IdORV[4] = 0xC896
IdORV[1] = 0x318A IdORV[5] = 0xE1D7 IdORV[9] = 0xBF59 IdORV[14] = 0x67B5
IdORV[8] = 0x3978

var cbmGh uint16 = 0
for ywkYl := 0; ywkYl < 21; ywkYl++ {
	cbmGh = uint16(IdORV[ywkYl])
	cbmGh = ((^(cbmGh & uint16(0xFFFF)) & uint16(0xFFFF)) + uint16(1)) & uint16(0xFFFF)
	for KzBpw := 0; KzBpw < 4; KzBpw++ {
		for Vpmdv := 0; Vpmdv < 2; Vpmdv++ {
			cbmGh = (((cbmGh & uint16(0xFFFF)) >> uint(ywkYl % 16)) | ((cbmGh & uint16(0xFFFF)) << uint(16 - (ywkYl % 16)))) & uint16(0xFFFF)
			for RvcuI := 0; RvcuI < 2; RvcuI++ {
				cbmGh = (cbmGh ^ uint16(0xEBA1)) & uint16(0xFFFF)
				cbmGh = ((^(cbmGh & uint16(0xFFFF)) & uint16(0xFFFF)) + uint16(1)) & uint16(0xFFFF)
			}
		}
	}
	for mDHtT := 0; mDHtT < 3; mDHtT++ {
		cbmGh = (cbmGh ^ uint16(ywkYl)) & uint16(0xFFFF)
		cbmGh = ((cbmGh & uint16(0xFFFF)) - uint16(0xBE3D)) & uint16(0xFFFF)
	}
	for OQUSg := 0; OQUSg < 3; OQUSg++ {
		cbmGh = ((cbmGh & uint16(0xFFFF)) - uint16(ywkYl)) & uint16(0xFFFF)
		for EScqL := 0; EScqL < 2; EScqL++ {
			cbmGh = (((cbmGh & uint16(0xFFFF)) >> 4) | ((cbmGh & uint16(0xFFFF)) << 12)) & uint16(0xFFFF)
		}
		cbmGh = (cbmGh ^ uint16(0xFFFF)) & uint16(0xFFFF)
	}
	cbmGh = (((cbmGh & uint16(0xFFFF)) << uint(ywkYl % 16)) | ((cbmGh & uint16(0xFFFF)) >> uint(16 - (ywkYl % 16)))) & uint16(0xFFFF)
	cbmGh = (((cbmGh & uint16(0xFFFF)) >> 8) | ((cbmGh & uint16(0xFFFF)) << 8)) & uint16(0xFFFF)
	for FvKPx := 0; FvKPx < 2; FvKPx++ {
		cbmGh = (((cbmGh & uint16(0xFFFF)) >> uint(ywkYl % 16)) | ((cbmGh & uint16(0xFFFF)) << uint(16 - (ywkYl % 16)))) & uint16(0xFFFF)
		for sPyek := 0; sPyek < 2; sPyek++ {
			cbmGh = (((cbmGh & uint16(0xFFFF)) << 15) | ((cbmGh & uint16(0xFFFF)) >> 1)) & uint16(0xFFFF)
			cbmGh = (((cbmGh & uint16(0xFFFF)) >> uint(ywkYl % 16)) | ((cbmGh & uint16(0xFFFF)) << uint(16 - (ywkYl % 16)))) & uint16(0xFFFF)
		}
		for gmqae := 0; gmqae < 4; gmqae++ {
			cbmGh = ((cbmGh & uint16(0xFFFF)) - uint16(0x3DA6)) & uint16(0xFFFF)
			for SqVjo := 0; SqVjo < 3; SqVjo++ {
				cbmGh = (((cbmGh & uint16(0xFFFF)) << 1) | ((cbmGh & uint16(0xFFFF)) >> 15)) & uint16(0xFFFF)
				cbmGh = ((cbmGh & uint16(0xFFFF)) - uint16(1)) & uint16(0xFFFF)
				cbmGh = (((cbmGh & uint16(0xFFFF)) << 8) | ((cbmGh & uint16(0xFFFF)) >> 8)) & uint16(0xFFFF)
			}
		}
	}
	for zOIyq := 0; zOIyq < 2; zOIyq++ {
		cbmGh = (cbmGh ^ uint16(ywkYl)) & uint16(0xFFFF)
		cbmGh = ((cbmGh & uint16(0xFFFF)) - uint16(ywkYl)) & uint16(0xFFFF)
	}
	cbmGh = (((cbmGh & uint16(0xFFFF)) << uint(ywkYl % 16)) | ((cbmGh & uint16(0xFFFF)) >> uint(16 - (ywkYl % 16)))) & uint16(0xFFFF)
	cbmGh = (cbmGh ^ ((cbmGh & uint16(0xFFFF)) >> 12)) & uint16(0xFFFF)
	for Jerya := 0; Jerya < 4; Jerya++ {
		cbmGh = (((cbmGh & uint16(0xFFFF)) >> uint(ywkYl % 16)) | ((cbmGh & uint16(0xFFFF)) << uint(16 - (ywkYl % 16)))) & uint16(0xFFFF)
		cbmGh = (((cbmGh & uint16(0xFFFF)) << 8) | ((cbmGh & uint16(0xFFFF)) >> 8)) & uint16(0xFFFF)
		for sFYvt := 0; sFYvt < 2; sFYvt++ {
			for Bpuqo := 0; Bpuqo < 4; Bpuqo++ {
				cbmGh = ((cbmGh & uint16(0xFFFF)) + uint16(0x63BE)) & uint16(0xFFFF)
				cbmGh = ((cbmGh & uint16(0xFFFF)) - uint16(1)) & uint16(0xFFFF)
			}
			cbmGh = ((cbmGh & uint16(0xFFFF)) + uint16(ywkYl)) & uint16(0xFFFF)
		}
	}
	for EsPno := 0; EsPno < 2; EsPno++ {
		cbmGh = ((cbmGh & uint16(0xFFFF)) + uint16(0x6C88)) & uint16(0xFFFF)
		for NoeXP := 0; NoeXP < 4; NoeXP++ {
			cbmGh = ((^(cbmGh & uint16(0xFFFF)) & uint16(0xFFFF)) + uint16(1)) & uint16(0xFFFF)
			cbmGh = (((cbmGh & uint16(0xFFFF)) >> 8) | ((cbmGh & uint16(0xFFFF)) << 8)) & uint16(0xFFFF)
			cbmGh = (cbmGh ^ (((cbmGh & uint16(0xFFFF)) << 12) & uint16(0xFFFF))) & uint16(0xFFFF)
		}
		cbmGh = (((cbmGh & uint16(0xFFFF)) >> uint(ywkYl % 16)) | ((cbmGh & uint16(0xFFFF)) << uint(16 - (ywkYl % 16)))) & uint16(0xFFFF)
	}
	for PTpkN := 0; PTpkN < 4; PTpkN++ {
		cbmGh = ((cbmGh & uint16(0xFFFF)) + uint16(1)) & uint16(0xFFFF)
	}
	for wMPIf := 0; wMPIf < 2; wMPIf++ {
		cbmGh = (((cbmGh & uint16(0xFFFF)) >> uint(ywkYl % 16)) | ((cbmGh & uint16(0xFFFF)) << uint(16 - (ywkYl % 16)))) & uint16(0xFFFF)
		cbmGh = (((cbmGh & uint16(0xFFFF)) << 9) | ((cbmGh & uint16(0xFFFF)) >> 7)) & uint16(0xFFFF)
		for Fqhur := 0; Fqhur < 4; Fqhur++ {
			cbmGh = ((cbmGh & uint16(0xFFFF)) - uint16(0x132C)) & uint16(0xFFFF)
			cbmGh = ((cbmGh & uint16(0xFFFF)) + uint16(1)) & uint16(0xFFFF)
		}
	}
	IdORV[ywkYl] = uint16(cbmGh)
}
secretGo := string(utf16.Decode(IdORV[:]))

fmt.Println(secretGo)
```

### Rust encryption (UNICODE example)

```rust
// encrypted with https://www.stringencrypt.com (v1.5.0) [Rust]
// secret = "Rust string encryption"
let mut ZaoBk: [u16; 23] = [0u16; 23];

ZaoBk[7] = 0x1051; ZaoBk[12] = 0xA2E0; ZaoBk[13] = 0x500D; ZaoBk[1] = 0x92D4;
ZaoBk[18] = 0xEB9E; ZaoBk[9] = 0x4C0C; ZaoBk[0] = 0x946F; ZaoBk[19] = 0x5D14;
ZaoBk[14] = 0x8C80; ZaoBk[22] = 0xCE49; ZaoBk[11] = 0x694D; ZaoBk[5] = 0x83CE;
ZaoBk[20] = 0x37A6; ZaoBk[6] = 0xE77D; ZaoBk[4] = 0x5888; ZaoBk[15] = 0x8741;
ZaoBk[2] = 0x958E; ZaoBk[17] = 0xE60C; ZaoBk[16] = 0xCEB0; ZaoBk[10] = 0xF880;
ZaoBk[3] = 0xF6E5; ZaoBk[8] = 0x81CB; ZaoBk[21] = 0xC00E;

let mut nqUGQ: u16 = 0;
for snfNx in 0..23
{
    nqUGQ = ZaoBk[snfNx];
    for DRCeJ in 0..3
    {
        for VLPwO in 0..2
        {
            nqUGQ = (nqUGQ ^ (((nqUGQ & 0xFFFF).wrapping_shl((8u32) & 15)) & 0xFFFF)) & 0xFFFF;
            nqUGQ = (nqUGQ ^ ((nqUGQ & 0xFFFF).wrapping_shr((14u32) & 15))) & 0xFFFF;
            for ZbJNQ in 0..3
            {
                nqUGQ = (nqUGQ & 0xFFFF).wrapping_add(0xE7FA) & 0xFFFF;
            }
        }
    }
    for xbozp in 0..4
    {
        nqUGQ = ((nqUGQ & 0xFFFF).wrapping_shl((snfNx as u32) % 16u32) | (nqUGQ & 0xFFFF).wrapping_shr((16u32).wrapping_sub((snfNx as u32) % 16u32).wrapping_rem(16u32))) & 0xFFFF;
    }
    for JYDzH in 0..4
    {
        for QaNjY in 0..4
        {
            nqUGQ = (nqUGQ & 0xFFFF).wrapping_sub(1) & 0xFFFF;
            nqUGQ = (nqUGQ ^ 0xDF4F) & 0xFFFF;
        }
        nqUGQ = (nqUGQ ^ ((nqUGQ & 0xFFFF).wrapping_shr((13u32) & 15))) & 0xFFFF;
    }
    nqUGQ = (nqUGQ & 0xFFFF).wrapping_add(0xC1D6) & 0xFFFF;
    for bDPFc in 0..4
    {
        nqUGQ = ((nqUGQ ^ 0xFFFF).wrapping_add(1)) & 0xFFFF;
    }
    for GuCTV in 0..3
    {
        for RNIXt in 0..3
        {
            nqUGQ = (nqUGQ ^ (((nqUGQ & 0xFFFF).wrapping_shl((14u32) & 15)) & 0xFFFF)) & 0xFFFF;
            for ijnWa in 0..4
            {
                nqUGQ = ((nqUGQ & 0xFFFF).wrapping_shr((14u32) % 16u32) | (nqUGQ & 0xFFFF).wrapping_shl((16u32).wrapping_sub((14u32) % 16u32).wrapping_rem(16u32))) & 0xFFFF;
                nqUGQ = ((nqUGQ ^ 0xFFFF).wrapping_add(1)) & 0xFFFF;
                nqUGQ = (nqUGQ ^ 0xFFFF) & 0xFFFF;
            }
            nqUGQ = (nqUGQ & 0xFFFF).wrapping_add(0xF8AA) & 0xFFFF;
        }
        nqUGQ = (nqUGQ & 0xFFFF).wrapping_sub(1) & 0xFFFF;
    }
    nqUGQ = (nqUGQ ^ 0xFFFF) & 0xFFFF;
    nqUGQ = ((nqUGQ & 0xFFFF).wrapping_shl((1u32) % 16u32) | (nqUGQ & 0xFFFF).wrapping_shr((16u32).wrapping_sub((1u32) % 16u32).wrapping_rem(16u32))) & 0xFFFF;
    for LaUbu in 0..4
    {
        for aHhFw in 0..4
        {
            for EqgMf in 0..3
            {
                nqUGQ = (nqUGQ ^ (snfNx as u16)) & 0xFFFF;
            }
            nqUGQ = ((nqUGQ & 0xFFFF).wrapping_shr((snfNx as u32) % 16u32) | (nqUGQ & 0xFFFF).wrapping_shl((16u32).wrapping_sub((snfNx as u32) % 16u32).wrapping_rem(16u32))) & 0xFFFF;
            for bYSgs in 0..2
            {
                nqUGQ = ((nqUGQ ^ 0xFFFF).wrapping_add(1)) & 0xFFFF;
                nqUGQ = (nqUGQ ^ 0x0FD8) & 0xFFFF;
                nqUGQ = (nqUGQ ^ 0xFFFF) & 0xFFFF;
            }
        }
    }
    for dkTWb in 0..4
    {
        nqUGQ = (nqUGQ & 0xFFFF).wrapping_add(1) & 0xFFFF;
    }
    nqUGQ = (nqUGQ & 0xFFFF).wrapping_add(0x02F4) & 0xFFFF;
    for HcirN in 0..2
    {
        for zqcmB in 0..4
        {
            nqUGQ = (nqUGQ ^ 0xBDF6) & 0xFFFF;
            nqUGQ = ((nqUGQ & 0xFFFF).wrapping_shl((4u32) % 16u32) | (nqUGQ & 0xFFFF).wrapping_shr((16u32).wrapping_sub((4u32) % 16u32).wrapping_rem(16u32))) & 0xFFFF;
        }
        for zeBCZ in 0..3
        {
            nqUGQ = (nqUGQ & 0xFFFF).wrapping_add(0x3DF3) & 0xFFFF;
            nqUGQ = (nqUGQ ^ 0xFFFF) & 0xFFFF;
        }
        for XLSda in 0..2
        {
            for oafFd in 0..4
            {
                nqUGQ = ((nqUGQ & 0xFFFF).wrapping_shr((snfNx as u32) % 16u32) | (nqUGQ & 0xFFFF).wrapping_shl((16u32).wrapping_sub((snfNx as u32) % 16u32).wrapping_rem(16u32))) & 0xFFFF;
                nqUGQ = ((nqUGQ & 0xFFFF).wrapping_shl((9u32) % 16u32) | (nqUGQ & 0xFFFF).wrapping_shr((16u32).wrapping_sub((9u32) % 16u32).wrapping_rem(16u32))) & 0xFFFF;
                nqUGQ = ((nqUGQ ^ 0xFFFF).wrapping_add(1)) & 0xFFFF;
            }
        }
    }
    ZaoBk[snfNx] = nqUGQ;
}
let secret = String::from_utf16_lossy(&ZaoBk[..]);

println!("{}", secret);
```

### Swift encryption (UNICODE example)

```swift
// encrypted with https://www.stringencrypt.com (v1.5.0) [Swift]
// swiftSecret = "Swift string encryption"
var swiftSecret: String = ""

var IDqik: [UInt16] = [ 0x3CF5, 0x0432, 0x570D, 0xFF09, 0xE59C, 0xC844, 0xEFBD, 0xF20E,
                        0x00B3, 0x49E0, 0x5693, 0xB64F, 0xB918, 0xD406, 0xA40A, 0xB2F7,
                        0x5F21, 0x98EC, 0xAA18, 0x8F12, 0x7169, 0xC144, 0xE12D ]

var nhbgA: UInt16 = 0
for fpLGc in 0..<23
{
	nhbgA = UInt16(IDqik[fpLGc])
	for _ in 0..<4
	{
		nhbgA = ((nhbgA & UInt16(0xFFFF)) &- UInt16(1)) & UInt16(0xFFFF)
		nhbgA = ((nhbgA & UInt16(0xFFFF)) &+ UInt16(fpLGc)) & UInt16(0xFFFF)
		nhbgA = (((nhbgA & UInt16(0xFFFF)) << (fpLGc % 16)) | ((nhbgA & UInt16(0xFFFF)) >> (16 - (fpLGc % 16)))) & UInt16(0xFFFF)
	}
	nhbgA = (nhbgA ^ UInt16(0xD283)) & UInt16(0xFFFF)
	nhbgA = (nhbgA ^ UInt16(0xFFFF)) & UInt16(0xFFFF)
	for _ in 0..<3
	{
		nhbgA = (nhbgA ^ UInt16(0x225A)) & UInt16(0xFFFF)
	}
	for _ in 0..<4
	{
		nhbgA = (nhbgA ^ ((nhbgA & UInt16(0xFFFF)) >> 13)) & UInt16(0xFFFF)
		nhbgA = (((nhbgA & UInt16(0xFFFF)) >> 6) | ((nhbgA & UInt16(0xFFFF)) << 10)) & UInt16(0xFFFF)
		for _ in 0..<3
		{
			nhbgA = ((nhbgA & UInt16(0xFFFF)) &- UInt16(1)) & UInt16(0xFFFF)
			nhbgA = ((nhbgA & UInt16(0xFFFF)) &+ UInt16(1)) & UInt16(0xFFFF)
		}
	}
	for _ in 0..<3
	{
		nhbgA = (nhbgA ^ ((nhbgA & UInt16(0xFFFF)) >> 9)) & UInt16(0xFFFF)
		for _ in 0..<2
		{
			for _ in 0..<2
			{
				nhbgA = ((nhbgA & UInt16(0xFFFF)) &- UInt16(fpLGc)) & UInt16(0xFFFF)
				nhbgA = ((nhbgA & UInt16(0xFFFF)) &- UInt16(0xEED7)) & UInt16(0xFFFF)
			}
			for _ in 0..<2
			{
				nhbgA = ((nhbgA & UInt16(0xFFFF)) &- UInt16(fpLGc)) & UInt16(0xFFFF)
				nhbgA = ((nhbgA & UInt16(0xFFFF)) &- UInt16(1)) & UInt16(0xFFFF)
			}
		}
		nhbgA = (nhbgA ^ (((nhbgA & UInt16(0xFFFF)) << 10) & UInt16(0xFFFF))) & UInt16(0xFFFF)
	}
	nhbgA = (((~(nhbgA & UInt16(0xFFFF))) & UInt16(0xFFFF)) &+ UInt16(1)) & UInt16(0xFFFF)
	for _ in 0..<4
	{
		nhbgA = (((nhbgA & UInt16(0xFFFF)) >> (fpLGc % 16)) | ((nhbgA & UInt16(0xFFFF)) << (16 - (fpLGc % 16)))) & UInt16(0xFFFF)
		for _ in 0..<3
		{
			nhbgA = ((nhbgA & UInt16(0xFFFF)) &+ UInt16(1)) & UInt16(0xFFFF)
			nhbgA = (((nhbgA & UInt16(0xFFFF)) >> 12) | ((nhbgA & UInt16(0xFFFF)) << 4)) & UInt16(0xFFFF)
			for _ in 0..<4
			{
				nhbgA = ((nhbgA & UInt16(0xFFFF)) &+ UInt16(0x264C)) & UInt16(0xFFFF)
				nhbgA = ((nhbgA & UInt16(0xFFFF)) &- UInt16(0xE417)) & UInt16(0xFFFF)
				nhbgA = ((nhbgA & UInt16(0xFFFF)) &+ UInt16(1)) & UInt16(0xFFFF)
			}
		}
	}
	nhbgA = (((nhbgA & UInt16(0xFFFF)) >> (fpLGc % 16)) | ((nhbgA & UInt16(0xFFFF)) << (16 - (fpLGc % 16)))) & UInt16(0xFFFF)
	nhbgA = ((nhbgA & UInt16(0xFFFF)) &+ UInt16(0xA438)) & UInt16(0xFFFF)
	for _ in 0..<3
	{
		for _ in 0..<3
		{
			nhbgA = ((nhbgA & UInt16(0xFFFF)) &- UInt16(1)) & UInt16(0xFFFF)
			for _ in 0..<3
			{
				nhbgA = (nhbgA ^ UInt16(fpLGc)) & UInt16(0xFFFF)
				nhbgA = (((~(nhbgA & UInt16(0xFFFF))) & UInt16(0xFFFF)) &+ UInt16(1)) & UInt16(0xFFFF)
			}
			for _ in 0..<2
			{
				nhbgA = (nhbgA ^ (((nhbgA & UInt16(0xFFFF)) << 13) & UInt16(0xFFFF))) & UInt16(0xFFFF)
			}
		}
	}
	nhbgA = (nhbgA ^ UInt16(0x5F00)) & UInt16(0xFFFF)
	for _ in 0..<3
	{
		for _ in 0..<4
		{
			nhbgA = (nhbgA ^ ((nhbgA & UInt16(0xFFFF)) >> 15)) & UInt16(0xFFFF)
			for _ in 0..<2
			{
				nhbgA = (nhbgA ^ (((nhbgA & UInt16(0xFFFF)) << 10) & UInt16(0xFFFF))) & UInt16(0xFFFF)
			}
			for _ in 0..<4
			{
				nhbgA = (nhbgA ^ UInt16(fpLGc)) & UInt16(0xFFFF)
			}
		}
		nhbgA = (nhbgA ^ ((nhbgA & UInt16(0xFFFF)) >> 14)) & UInt16(0xFFFF)
	}
	nhbgA = ((nhbgA & UInt16(0xFFFF)) &+ UInt16(fpLGc)) & UInt16(0xFFFF)
	for _ in 0..<3
	{
		nhbgA = (((nhbgA & UInt16(0xFFFF)) >> 8) | ((nhbgA & UInt16(0xFFFF)) << 8)) & UInt16(0xFFFF)
		nhbgA = ((nhbgA & UInt16(0xFFFF)) &- UInt16(fpLGc)) & UInt16(0xFFFF)
	}
	IDqik[fpLGc] = UInt16(nhbgA)
	swiftSecret = String(decoding: IDqik, as: UTF16.self)
}

print(swiftSecret)
```

### Lua encryption (UNICODE example)

```lua
-- encrypted with https://www.stringencrypt.com (v1.5.0) [Lua]
-- Requires Lua 5.3+ (bitwise operators: &, |, ~, <<, >>)
-- Unicode: utf8.char() for BMP code points (string.char only accepts 0..255)
-- luaSecret = "Lua string encryption"
local luaSecret = { 0x819A, 0x251F, 0x20EF, 0x2473, 0x3770, 0xACE5, 0x57AC, 0x5FB6,
                    0xA232, 0x7349, 0xBB95, 0x5CC2, 0xE7B1, 0x8AF8, 0xB07D, 0x80B5,
                    0x005A, 0x4FE4, 0x76DA, 0x8684, 0xCD7D }

local cBxhf = 0
for JuYFm = 0, 21 - 1 do
  cBxhf = luaSecret[JuYFm + 1]
  for GweYp = 1, 4 do
    cBxhf = (cBxhf ~ (((cBxhf & 0xFFFF) << 11) & 0xFFFF)) & 0xFFFF
    cBxhf = (((cBxhf & 0xFFFF) >> 7) | ((cBxhf & 0xFFFF) << 9)) & 0xFFFF
    cBxhf = ((cBxhf & 0xFFFF) - 0x08F7) & 0xFFFF
  end
  cBxhf = (cBxhf ~ ((cBxhf & 0xFFFF) >> 9)) & 0xFFFF
  cBxhf = ((((cBxhf & 0xFFFF) >> 8) | ((cBxhf & 0xFFFF) << 8)) & 0xFFFF)
  for oJScO = 1, 3 do
    cBxhf = (((cBxhf & 0xFFFF) >> (JuYFm % 16)) | ((cBxhf & 0xFFFF) << (16 - (JuYFm % 16)))) & 0xFFFF
    for VCOYf = 1, 3 do
      for Bozka = 1, 4 do
        cBxhf = (cBxhf ~ JuYFm) & 0xFFFF
        cBxhf = ((cBxhf & 0xFFFF) + JuYFm) & 0xFFFF
      end
    end
  end
  cBxhf = (cBxhf ~ 0xDB0C) & 0xFFFF
  cBxhf = ((cBxhf & 0xFFFF) - 1) & 0xFFFF
  for OAbZp = 1, 2 do
    cBxhf = ((cBxhf & 0xFFFF) + 1) & 0xFFFF
  end
  for FoYMh = 1, 4 do
    cBxhf = ((cBxhf ~ 0xFFFF) & 0xFFFF)
    cBxhf = ((cBxhf & 0xFFFF) + 0x1A96) & 0xFFFF
  end
  cBxhf = (((cBxhf & 0xFFFF) >> (JuYFm % 16)) | ((cBxhf & 0xFFFF) << (16 - (JuYFm % 16)))) & 0xFFFF
  cBxhf = ((cBxhf & 0xFFFF) - JuYFm) & 0xFFFF
  luaSecret[JuYFm + 1] = cBxhf
end

local SBvyf = {}
for SMmeg = 1, #luaSecret do
  SBvyf[SMmeg] = utf8.char((luaSecret[SMmeg] & 0xFFFF))
end
luaSecret = table.concat(SBvyf)


print(luaSecret)
```

### Objective-C encryption (UNICODE example)

```objc
// encrypted with https://www.stringencrypt.com (v1.5.0) [Objective-C]
// objcSecret = "Objective-C NSString"
unsigned short objcSecret[21];

objcSecret[3] = 0xA888; objcSecret[9] = 0x64FE; objcSecret[4] = 0x0399; objcSecret[8] = 0xC613;
objcSecret[5] = 0x5B69; objcSecret[7] = 0xCAD4; objcSecret[1] = 0xDEC0; objcSecret[18] = 0x7213;
objcSecret[13] = 0xE767; objcSecret[20] = 0xC9C3; objcSecret[0] = 0x76FD; objcSecret[14] = 0xE1CE;
objcSecret[16] = 0x491E; objcSecret[6] = 0x7B59; objcSecret[10] = 0x3FDE; objcSecret[15] = 0xE867;
objcSecret[19] = 0xC3F8; objcSecret[2] = 0x6E4A; objcSecret[11] = 0x77EE; objcSecret[17] = 0x0D46;
objcSecret[12] = 0xDAE8;

for (unsigned int pwrWB = 0, ORZzX = 0; pwrWB < 21; pwrWB++)
{
	ORZzX = objcSecret[pwrWB];
	for (unsigned int LyZQA = 0; LyZQA < 2; LyZQA++)
	{
		ORZzX = ((ORZzX & 0xFFFF) + 1) & 0xFFFF;
		ORZzX = (ORZzX ^ (((ORZzX & 0xFFFF) << 8) & 0xFFFF)) & 0xFFFF;
		for (unsigned int EodCh = 0; EodCh < 2; EodCh++)
		{
			for (unsigned int TkHYN = 0; TkHYN < 3; TkHYN++)
			{
				ORZzX = ((ORZzX & 0xFFFF) + 1) & 0xFFFF;
				ORZzX = (((ORZzX & 0xFFFF) << 1) | ((ORZzX & 0xFFFF) >> 15)) & 0xFFFF;
				ORZzX = ((ORZzX & 0xFFFF) - pwrWB) & 0xFFFF;
			}
			for (unsigned int djneP = 0; djneP < 3; djneP++)
			{
				ORZzX = (ORZzX ^ (((ORZzX & 0xFFFF) << 10) & 0xFFFF)) & 0xFFFF;
				ORZzX = (((ORZzX & 0xFFFF) >> 5) | ((ORZzX & 0xFFFF) << 11)) & 0xFFFF;
			}
		}
	}
	ORZzX = ((ORZzX & 0xFFFF) + pwrWB) & 0xFFFF;
	for (unsigned int BfPGc = 0; BfPGc < 4; BfPGc++)
	{
		for (unsigned int rbejn = 0; rbejn < 2; rbejn++)
		{
			ORZzX = (ORZzX ^ 0xFFFF) & 0xFFFF;
			ORZzX = (((ORZzX & 0xFFFF) >> 8) | ((ORZzX & 0xFFFF) << 8)) & 0xFFFF;
			for (unsigned int BWVfH = 0; BWVfH < 3; BWVfH++)
			{
				ORZzX = ((ORZzX & 0xFFFF) + 1) & 0xFFFF;
				ORZzX = (((ORZzX & 0xFFFF) << (pwrWB % 16)) | ((ORZzX & 0xFFFF) >> (16 - (pwrWB % 16)))) & 0xFFFF;
			}
		}
	}
	ORZzX = ((ORZzX & 0xFFFF) + 0x7CB1) & 0xFFFF;
	for (unsigned int vMrnS = 0; vMrnS < 4; vMrnS++)
	{
		for (unsigned int asvBV = 0; asvBV < 4; asvBV++)
		{
			for (unsigned int jsDCX = 0; jsDCX < 2; jsDCX++)
			{
				ORZzX = (((ORZzX & 0xFFFF) << (pwrWB % 16)) | ((ORZzX & 0xFFFF) >> (16 - (pwrWB % 16)))) & 0xFFFF;
				ORZzX = (ORZzX ^ pwrWB) & 0xFFFF;
				ORZzX = (ORZzX ^ 0xFFFF) & 0xFFFF;
			}
			for (unsigned int QceiD = 0; QceiD < 3; QceiD++)
			{
				ORZzX = (ORZzX ^ (((ORZzX & 0xFFFF) << 9) & 0xFFFF)) & 0xFFFF;
				ORZzX = (((ORZzX & 0xFFFF) << 11) | ((ORZzX & 0xFFFF) >> 5)) & 0xFFFF;
			}
		}
	}
	ORZzX = (((~(ORZzX & 0xFFFF)) & 0xFFFF) + 1) & 0xFFFF;
	for (unsigned int rzCFJ = 0; rzCFJ < 2; rzCFJ++)
	{
		ORZzX = ((ORZzX & 0xFFFF) + 1) & 0xFFFF;
		ORZzX = (((ORZzX & 0xFFFF) >> (pwrWB % 16)) | ((ORZzX & 0xFFFF) << (16 - (pwrWB % 16)))) & 0xFFFF;
	}
	ORZzX = ((ORZzX & 0xFFFF) + 0xD6AC) & 0xFFFF;
	objcSecret[pwrWB] = ORZzX;
}

NSLog(@"%@", [NSString stringWithUTF16String:(const unichar *)objcSecret]); // TODO: length / encoding
```

### AutoIt encryption (UNICODE example)

```autoit
; encrypted with https://www.stringencrypt.com (v1.5.0) [AutoIt]
#include <Array.au3>

; $autoit_obfuscator = "We got it too https://www.pelock.com/products/autoit-obfuscator"
Global $autoit_obfuscator[64] = [ 0x2C7A, 0xA37B, 0xCCC5, 0x93A2, 0x1E59, 0xFC37, 0x7A2B, 0x9153, _
                                 0xFADB, 0x040D, 0x5626, 0xB695, 0x31B7, 0x7DE6, 0x44C3, 0x83E5, _
                                 0xF469, 0xDB4C, 0xF667, 0xD360, 0xA82F, 0x3F3B, 0x3F26, 0xEA32, _
                                 0xF43B, 0x3910, 0x7E2D, 0x639F, 0x35CD, 0xBB6B, 0xD1D4, 0xDCCF, _
                                 0x237E, 0xCD82, 0x99FF, 0x84F7, 0x882E, 0xEE4C, 0xFC3F, 0x7F34, _
                                 0x3143, 0x33E2, 0xF130, 0x24A9, 0x26DF, 0xB84E, 0x76DA, 0x95C4, _
                                 0x2CC3, 0x8D11, 0x3A3F, 0x07B1, 0x8686, 0x983C, 0x0708, 0x978E, _
                                 0xBB44, 0xB835, 0xD402, 0x55AF, 0xB7A9, 0x498C, 0x5907, 0x6C78 ]

Local $uxYFn
Local $JjGwl
Local $ELsAr
Local $zQTqo
Local $gmbXt
Local $MzeHF
Local $EOspd
Local $fXqkF
Local $PWZqH
Local $uEHXM
Local $eKQrB
Local $lfoFV
Local $EydXK

For $EydXK = 0 to 63
    $uxYFn = $autoit_obfuscator[$EydXK]
    For $JjGwl = 0 to 2
        For $ELsAr = 0 to 3
            $uxYFn = BitAND(BitAND($uxYFn, 0xFFFF) - 0x31EE, 0xFFFF)
        Next
        For $zQTqo = 0 to 2
            For $gmbXt = 0 to 2
                $uxYFn = BitAND(BitAND($uxYFn, 0xFFFF) + $EydXK, 0xFFFF)
            Next
        Next
        For $MzeHF = 0 to 3
            $uxYFn = BitAND(BitAND($uxYFn, 0xFFFF) + 0x9D00, 0xFFFF)
            For $EOspd = 0 to 1
                $uxYFn = BitAND(BitXOR(BitAND($uxYFn, 0xFFFF), 0xFFFF) + 1, 0xFFFF)
                $uxYFn = BitAND(BitOR(BitShift(BitAND($uxYFn, 0xFFFF), 8), BitShift(BitAND($uxYFn, 0xFFFF), -8)), 0xFFFF)
            Next
            For $fXqkF = 0 to 2
                $uxYFn = BitAND(BitAND($uxYFn, 0xFFFF) - $EydXK, 0xFFFF)
                $uxYFn = BitAND(BitOR(BitShift(BitAND($uxYFn, 0xFFFF), 3), BitShift(BitAND($uxYFn, 0xFFFF), -13)), 0xFFFF)
            Next
        Next
    Next
    $uxYFn = BitAND(BitAND($uxYFn, 0xFFFF) - 1, 0xFFFF)
    For $PWZqH = 0 to 2
        $uxYFn = BitAND(BitXOR($uxYFn, BitShift(BitAND($uxYFn, 0xFFFF), 13)), 0xFFFF)
        For $uEHXM = 0 to 3
            $uxYFn = BitAND(BitAND($uxYFn, 0xFFFF) - $EydXK, 0xFFFF)
            For $eKQrB = 0 to 3
                $uxYFn = BitAND(BitXOR($uxYFn, BitShift(BitAND($uxYFn, 0xFFFF), 11)), 0xFFFF)
            Next
            For $lfoFV = 0 to 3
                $uxYFn = BitAND(BitXOR($uxYFn, 0xA378), 0xFFFF)
                $uxYFn = BitAND(BitXOR($uxYFn, BitShift(BitAND($uxYFn, 0xFFFF), 10)), 0xFFFF)
            Next
        Next
    Next
    $uxYFn = BitAND(BitOR(BitShift(BitAND($uxYFn, 0xFFFF), -9), BitShift(BitAND($uxYFn, 0xFFFF), 7)), 0xFFFF)
    $uxYFn = BitAND(BitOR(BitShift(BitAND($uxYFn, 0xFFFF), Mod($EydXK, 16)), BitShift(BitAND($uxYFn, 0xFFFF), Mod($EydXK, 16) - 16)), 0xFFFF)
    $uxYFn = BitAND(BitAND($uxYFn, 0xFFFF) + 0xBA6E, 0xFFFF)
    $uxYFn = BitAND(BitAND($uxYFn, 0xFFFF) + 1, 0xFFFF)
    $autoit_obfuscator[$EydXK] = ChrW(BitAND($uxYFn, 0xFFFF))
Next

$autoit_obfuscator = _ArrayToString($autoit_obfuscator, "")

ConsoleWrite($autoit_obfuscator)
```

### PowerShell encryption (UNICODE example)

```powershell
# encrypted with https://www.stringencrypt.com (v1.5.0) [PowerShell]
# $Label = "Well, it has some interesting syntax!"
[uint16[]] $VmBdz = 0xDAD8, 0x5B96, 0x69A8, 0xE645, 0x103E, 0x2EC6, 0xF952, 0xB9BC,
                    0x5B7E, 0x5BE4, 0x9351, 0xBA3D, 0x8B87, 0x2602, 0x7B86, 0x7644,
                    0x1181, 0x9F1A, 0x2B2C, 0x7F19, 0xEE51, 0xFF94, 0x45F4, 0xC9AB,
                    0x9E16, 0xE741, 0x2EAF, 0x9B92, 0x2A9B, 0xCB47, 0xE5F1, 0x6487,
                    0x3FF0, 0x45DC, 0x8D7E, 0x16E2, 0x0E6A
[string] $Label = ""

for ($UiSVa = 0; $UiSVa -lt 37; $UiSVa++)
{
  $DVjgE = $VmBdz[$UiSVa]
  $DVjgE = (($DVjgE -band 0xFFFF) + 1) -band 0xFFFF
  $DVjgE = ((($DVjgE -band 0xFFFF) -shr 8) -bor (($DVjgE -band 0xFFFF) -shl 8)) -band 0xFFFF
  $DVjgE = ((($DVjgE -band 0xFFFF) -shl ($UiSVa % 16)) -bor (($DVjgE -band 0xFFFF) -shr (16 - ($UiSVa % 16)))) -band 0xFFFF
  $DVjgE = ($DVjgE -bxor $UiSVa) -band 0xFFFF
  $DVjgE = (($DVjgE -band 0xFFFF) - 0xB874) -band 0xFFFF
  for ($gxBSZ = 0; $gxBSZ -lt 3; $gxBSZ++)
  {
    for ($wSFcZ = 0; $wSFcZ -lt 2; $wSFcZ++)
    {
      for ($JnYoy = 0; $JnYoy -lt 4; $JnYoy++)
      {
        $DVjgE = (($DVjgE -band 0xFFFF) - $UiSVa) -band 0xFFFF
        $DVjgE = (($DVjgE -band 0xFFFF) - 0xE5E3) -band 0xFFFF
        $DVjgE = ((($DVjgE -band 0xFFFF) -shr 3) -bor (($DVjgE -band 0xFFFF) -shl 13)) -band 0xFFFF
      }
    }
    for ($FaUdp = 0; $FaUdp -lt 4; $FaUdp++)
    {
      $DVjgE = (($DVjgE -band 0xFFFF) - 0xF6F9) -band 0xFFFF
      for ($nHlOA = 0; $nHlOA -lt 2; $nHlOA++)
      {
        $DVjgE = ($DVjgE -bxor $UiSVa) -band 0xFFFF
        $DVjgE = (($DVjgE -band 0xFFFF) - $UiSVa) -band 0xFFFF
        $DVjgE = ((($DVjgE -band 0xFFFF) -bxor 0xFFFF) + 1) -band 0xFFFF
      }
    }
  }
  for ($xMFbR = 0; $xMFbR -lt 3; $xMFbR++)
  {
    for ($YjHOl = 0; $YjHOl -lt 2; $YjHOl++)
    {
      $DVjgE = (($DVjgE -band 0xFFFF) + $UiSVa) -band 0xFFFF
      $DVjgE = ((($DVjgE -band 0xFFFF) -bxor 0xFFFF) + 1) -band 0xFFFF
    }
    $DVjgE = ((($DVjgE -band 0xFFFF) -shr 3) -bor (($DVjgE -band 0xFFFF) -shl 13)) -band 0xFFFF
    $DVjgE = (($DVjgE -band 0xFFFF) - 1) -band 0xFFFF
  }
  $DVjgE = ((($DVjgE -band 0xFFFF) -shr 7) -bor (($DVjgE -band 0xFFFF) -shl 9)) -band 0xFFFF
  $DVjgE = ((($DVjgE -band 0xFFFF) -bxor 0xFFFF) + 1) -band 0xFFFF
  $DVjgE = ($DVjgE -bxor $UiSVa) -band 0xFFFF
  $Label += [char]($DVjgE -band 0xFFFF)
}

Write-Host $Label
```

### Haskell encryption (ANSI example)

```haskell
-- encrypted with https://www.stringencrypt.com (v1.5.0) [Haskell]
module Main where

import qualified Data.Char
import qualified Data.Bits

main = do
  putStrLn $ gimmeh

-- gimmeh = "Monads! I need more Monads!"
gimmeh = zipWith f [0..] [ 0x99, 0x68, 0x69, 0x6B, 0x2C, 0xEC, 0x42, 0x43,
                           0xE1, 0x25, 0xF1, 0x72, 0x63, 0x64, 0x29, 0x75,
                           0x46, 0x07, 0x09, 0xDE, 0xAC, 0xFB, 0xFC, 0xFE,
                           0x7E, 0xBE, 0x94 ]
  where
    f brtgn yeubg = let xsfdz0 = yeubg
                       xsfdz1 = xsfdz0 - brtgn
                       xsfdz2 = negate xsfdz1
                       xsfdz3 = xsfdz2 + 1
                       xsfdz4 = xsfdz3 - 0x6F
                       xsfdz5 = xsfdz4 `Data.Bits.xor` 0xB7
                       xsfdz6 = negate xsfdz5
                       xsfdz7 = xsfdz6 `Data.Bits.xor` (Data.Bits.shiftL xsfdz6 6 Data.Bits..&. 0xFF)
                       xsfdz8 = Data.Bits.rotateL xsfdz7 4
                       xsfdz9 = xsfdz8 - 1
                       xsfdz10 = xsfdz9 - brtgn
                       xsfdz11 = xsfdz10 - 0xD5
                    in Data.Char.chr (xsfdz11 Data.Bits..&. 0xFF)
```

### MASM Assembler 32 bit encryption (UNICODE example)

```asm
; encrypted with https://www.stringencrypt.com (v1.5.0) [MASM Assembler (32 bit)]

	; szMyGoodOldFriend = "I will be always here :)"
	local	szMyGoodOldFriend[25]:word

	lea	ecx, szMyGoodOldFriend

	mov	word ptr [ecx + 23], 025CEh
	mov	word ptr [ecx + 1], 0275Eh
	mov	word ptr [ecx + 8], 0D085h
	mov	word ptr [ecx + 20], 0EBABh
	mov	word ptr [ecx + 7], 0E321h
	mov	word ptr [ecx + 4], 00B03h
	mov	word ptr [ecx + 18], 00149h
	mov	word ptr [ecx + 19], 0F5C9h
	mov	word ptr [ecx + 13], 03E86h
	mov	word ptr [ecx + 17], 03908h
	mov	word ptr [ecx + 16], 09E1Bh
	mov	word ptr [ecx + 11], 0B6CFh
	mov	word ptr [ecx + 15], 064B2h
	mov	word ptr [ecx + 10], 02C84h
	mov	word ptr [ecx + 0], 09E02h
	mov	word ptr [ecx + 14], 043E8h
	mov	word ptr [ecx + 9], 00925h
	mov	word ptr [ecx + 5], 00323h
	mov	word ptr [ecx + 12], 03D5Fh
	mov	word ptr [ecx + 22], 02B04h
	mov	word ptr [ecx + 24], 06CA4h
	mov	word ptr [ecx + 6], 066B8h
	mov	word ptr [ecx + 2], 0E4FAh
	mov	word ptr [ecx + 21], 00ED1h
	mov	word ptr [ecx + 3], 00549h

	mov	eax, 25
	xor	ebx, ebx

@@:
	mov	dx, word ptr [ecx + ebx]
	sub	edx, 06818h
	add	edx, 0B8AAh

	push	eax
	mov	eax, 4
PazJT:
	push	eax
	movzx	eax, dx
	shl	eax, 13
	and	ax, 0xFFFF
	xor	dx, ax
	pop	eax

	push	eax
	mov	eax, 2
OjDVG:
	not	edx
	xor	edx, ebx

	push	eax
	mov	eax, 2
UjDCE:
	rol	dx, 8
	push	edx
	mov	cl, bl
	rol	word ptr [esp], cl
	pop	edx
	dec	eax
	jne	UjDCE
	pop	eax

	dec	eax
	jne	OjDVG
	pop	eax

	dec	eax
	jne	PazJT
	pop	eax


	push	eax
	mov	eax, 2
DFjca:

	push	eax
	mov	eax, 4
mPryd:

	push	eax
	mov	eax, 3
hgjbG:
	inc	edx
	push	edx
	mov	cl, bl
	ror	word ptr [esp], cl
	pop	edx
	sub	edx, ebx
	dec	eax
	jne	hgjbG
	pop	eax


	push	eax
	mov	eax, 4
VeiyM:
	dec	edx
	not	edx
	dec	eax
	jne	VeiyM
	pop	eax

	neg	edx
	dec	eax
	jne	mPryd
	pop	eax

	xor	edx, 0A257h
	push	edx
	mov	cl, bl
	rol	word ptr [esp], cl
	pop	edx
	dec	eax
	jne	DFjca
	pop	eax

	sub	edx, 0EEDDh
	inc	edx

	push	eax
	mov	eax, 2
VIHTa:
	add	edx, ebx
	dec	eax
	jne	VIHTa
	pop	eax

	dec	edx
	sub	edx, ebx
	inc	edx

	push	eax
	mov	eax, 2
vRUrO:
	push	edx
	mov	cl, bl
	ror	word ptr [esp], cl
	pop	edx
	sub	edx, ebx
	neg	edx
	dec	eax
	jne	vRUrO
	pop	eax

	push	edx
	mov	cl, bl
	rol	word ptr [esp], cl
	pop	edx
	neg	edx

	push	eax
	mov	eax, 4
ixfpU:

	push	eax
	mov	eax, 4
EzpCK:

	push	eax
	mov	eax, 4
LMBqn:
	sub	edx, ebx
	push	eax
	movzx	eax, dx
	shl	eax, 14
	and	ax, 0xFFFF
	xor	dx, ax
	pop	eax
	not	edx
	dec	eax
	jne	LMBqn
	pop	eax

	xor	edx, 0140Bh
	dec	eax
	jne	EzpCK
	pop	eax

	dec	eax
	jne	ixfpU
	pop	eax

	inc	edx
	mov	word ptr [ecx + ebx], dx
	inc	ebx
	dec	eax
	jne	@b

	push	0
	push	ecx
	push	ecx
	push	0
	call	MessageBoxW
```

### FASM Assembler 32 bit (ANSI example)

```asm
; encrypted with https://www.stringencrypt.com (v1.5.0) [FASM Assembler (32 bit)]

	; szFasm = "Hi Tomek Grysztar :)"
	local	szFasm[21]:BYTE

	lea	edx, [szFasm]

	mov	byte [edx + 17], 0B7h
	mov	byte [edx + 8], 0BBh
	mov	byte [edx + 1], 002h
	mov	byte [edx + 18], 013h
	mov	byte [edx + 6], 0B5h
	mov	byte [edx + 11], 023h
	mov	byte [edx + 20], 067h
	mov	byte [edx + 13], 02Dh
	mov	byte [edx + 4], 00Ch
	mov	byte [edx + 15], 0BDh
	mov	byte [edx + 7], 074h
	mov	byte [edx + 19], 035h
	mov	byte [edx + 0], 04Eh
	mov	byte [edx + 9], 0CEh
	mov	byte [edx + 12], 036h
	mov	byte [edx + 5], 09Ah
	mov	byte [edx + 16], 09Dh
	mov	byte [edx + 3], 0FCh
	mov	byte [edx + 2], 026h
	mov	byte [edx + 10], 08Dh
	mov	byte [edx + 14], 09Fh

	mov	ecx, 21
	sub	ebx, ebx

@@:
	mov	al, byte [edx + ebx]
	dec	eax
	push	eax
	mov	cl, bl
	ror	byte [esp], cl
	pop	eax
	sub	eax, 06Fh
	not	eax
	rol	al, 4
	inc	eax
	not	eax
	push	ecx
	movzx	ecx, al
	shl	ecx, 6
	and	cl, 0xFF
	xor	al, cl
	pop	ecx
	sub	eax, 04Ch
	dec	eax
	add	eax, 040h

	push	ecx
	mov	ecx, 3
gqOvB:
	rol	al, 4
	sub	eax, ebx
	dec	ecx
	jne	gqOvB
	pop	ecx

	sub	eax, 0B5h

	push	ecx
	mov	ecx, 2
PxTWp:

	push	ecx
	mov	ecx, 3
ZRKAu:
	not	eax
	dec	ecx
	jne	ZRKAu
	pop	ecx

	sub	eax, 007h

	push	ecx
	mov	ecx, 2
mrsaT:
	push	ecx
	movzx	ecx, al
	shl	ecx, 4
	and	cl, 0xFF
	xor	al, cl
	pop	ecx

	push	ecx
	mov	ecx, 4
fXqJc:
	push	ecx
	movzx	ecx, al
	shr	ecx, 7
	xor	al, cl
	pop	ecx
	dec	ecx
	jne	fXqJc
	pop	ecx

	dec	ecx
	jne	mrsaT
	pop	ecx

	dec	ecx
	jne	PxTWp
	pop	ecx


	push	ecx
	mov	ecx, 2
SDvsl:
	xor	eax, 097h
	dec	ecx
	jne	SDvsl
	pop	ecx

	mov	byte [edx + ebx], al
	inc	ebx
	dec	ecx
	jne	@b

	push	0
	push	edx
	push	edx
	push	0
	call	[MessageBoxA]
```

### NASM Assembler 32 bit encryption (ANSI example)

```nasm
; encrypted with https://www.stringencrypt.com (v1.5.0) [NASM Assembler (32 bit, template)]

	; szNasm = "NASM 32-bit demo"
	; NASM: reserve buffer on stack or BSS (FASM 'local' not available)
	; szNasm x 17 BYTE

	lea	ecx, [szNasm]

	mov	byte [ecx + 8], 0xD2
	mov	byte [ecx + 14], 0x10
	mov	byte [ecx + 4], 0x89
	mov	byte [ecx + 9], 0x42
	mov	byte [ecx + 1], 0xDF
	mov	byte [ecx + 12], 0x6E
	mov	byte [ecx + 15], 0xED
	mov	byte [ecx + 10], 0xEF
	mov	byte [ecx + 13], 0x9B
	mov	byte [ecx + 6], 0x93
	mov	byte [ecx + 0], 0x0E
	mov	byte [ecx + 16], 0x97
	mov	byte [ecx + 5], 0x04
	mov	byte [ecx + 11], 0xE0
	mov	byte [ecx + 3], 0x88
	mov	byte [ecx + 2], 0xAE
	mov	byte [ecx + 7], 0x00

	mov	ebx, 17
	and	eax, 0

Jtcmn:
	mov	dl, byte [ecx + eax]

	push	ebx
	mov	ebx, 3
kQyhD:
	push	ebx
	movzx	ebx, dl
	shr	ebx, 7
	xor	dl, bl
	pop	ebx
	dec	ebx
	jne	kQyhD
	pop	ebx

	xor	edx, 0x59
	xor	edx, eax
	push	ebx
	movzx	ebx, dl
	shr	ebx, 6
	xor	dl, bl
	pop	ebx

	push	ebx
	mov	ebx, 3
QvoTY:
	sub	edx, 0x0A
	dec	ebx
	jne	QvoTY
	pop	ebx


	push	ebx
	mov	ebx, 2
oWCAQ:

	push	ebx
	mov	ebx, 4
STBPV:

	push	ebx
	mov	ebx, 3
fPAhz:
	push	ebx
	movzx	ebx, dl
	shr	ebx, 7
	xor	dl, bl
	pop	ebx
	rol	dl, 4
	sub	edx, 0xC1
	dec	ebx
	jne	fPAhz
	pop	ebx


	push	ebx
	mov	ebx, 3
Vhgax:
	add	edx, eax
	rol	dl, 4
	add	edx, eax
	dec	ebx
	jne	Vhgax
	pop	ebx

	dec	ebx
	jne	STBPV
	pop	ebx

	dec	ebx
	jne	oWCAQ
	pop	ebx

	mov	byte [ecx + eax], dl
	inc	eax
	dec	ebx
	jne	Jtcmn

	push	0
	push	ecx
	push	ecx
	push	0
	call	[MessageBoxA]
```

## Free demo version limitations

The free demo version comes with some **limitations**.

| Feature                               | Demo version     | Full version |
|---------------------------------------|:----------------:|-------------:|
| String encryption                     | ✅              | ✅           |
| File encryption (text or binary file) | ❌              | ✅           |
| Nested polymorphic loops              | ❌              | ✅           |
| Max. label length (characters)        | `10`             | `64`         |
| Max. string length (characters)       | `10`             | `4096`       |
| Max. file length (bytes)              | —                | `4 MB`       |
| Min. number of encryption commands    | `3`              | `50`         |
| Max. number of encryption commands    | `3`              | `50`         |

## Pricing

To remove the limitations and support our project and its development, you need to buy an activation code at:

https://www.stringencrypt.com/buy/

Each activation code has an assigned number of **usage credits**. You can use the software in full version as many times as you have usage credits on your account balance.

## How to get a free activation code?

You can get a **free activation code** (500 usage credits) if you can advertise StringEncrypt service with a link to the project site https://www.stringencrypt.com/ at:

* Programming sites & forums
* Programming blogs
* Technical articles
* X or any other social media site
* ...or any other website related to programming and development

Send me all the details at my [contact address](https://www.stringencrypt.com/) and if it's legit - **bam!**, you got yourself a free code :)

## Changelog

### 2026-04-14

Encryption engine updated to v1.5.0 with major algorithmic improvements.

Support for new programming languages added:

* Kotlin
* Dart
* Go
* Rust
* Swift
* Lua
* PHP
* Objective-C
* NASM

#### Nested polymorphic encryption loops (matryoshka-style)

Available only for paying customers. The decryption loop can now contain randomly generated inner loops (up to 3 levels deep), each with 1–3 encryption commands. This dramatically increases the complexity of the generated polymorphic code, making static analysis significantly harder. Supported in all languages except Haskell. Assembly languages (MASM/FASM/NASM) use push/pop with randomly generated named labels for inner loop nesting.

Related to the nested loops, the C/C++ loop constructs are now using volatile keyword to prevent compiler loop unrolling, and it makes advanced string extraction tools unusable.

#### Bugfixes

* Fixed Python formatting to be compatible with PEP rules.
* Fixed Ruby generator by using valid method of storing encrypted unicode characters array.
* Fixed AutoIt generator.

#### 6 new encryption VM instructions:

* neg — two's complement negation (self-inverse)
* swap — nibble swap for 8-bit / byte swap for 16-bit values (self-inverse)
* c_rol / c_ror — counter-dependent bit rotation, shift amount varies per character making frequency analysis nearly impossible
* xor_shr / xor_shl — hash-like self-XOR mixing functions inspired by algorithms such as MurmurHash and SplitMix (self-inverse)

The total number of encryption VM instructions is now 17 (up from 11), providing a vastly larger space of possible encryption combinations.

#### New syntax highlighting

Legacy Syntax Highlighter library was replaced with modern Prism highlighter.

#### SDKs

* Official StringEncrypt PHP package published on Packagist
* StringEncrypt Python package on PyPi upgraded

# Fin

I hope you like it and you will try it at least :)

Bartosz Wójcik

* Visit my site at — https://www.pelock.com
* X — https://x.com/PELock
* GitHub — https://github.com/PELock