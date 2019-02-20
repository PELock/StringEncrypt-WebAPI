# StringEncrypt — String & File Encryption for Developers

StringEncrypt page allows you to **encrypt strings and files** using
randomly generated algorithm, generating a unique decryption code
(so called *polymorphic code*) each time in the selected programming
language.

https://www.stringencrypt.com

# The problem

I'm a developer, I love programming. I'm also an avid [reverse engineer](https://www.pelock.com/services).
I perform a wide array of software analysis in my daily work and sometimes
I find things in compiled applications that **shouldn't be exposed** to the
first person with a simple hex-editor in hand.

## What can be found in application binaries?

Everything! I've listed a few examples of the things I found below.
Sometimes these things shouldn't even be included in applications
at all (they are there due to poor design choices or rushed work),
but some are just cannot be avoided.

* Database passwords
* FTP passwords
* Login credentials
* Encryption & decryption keys
* Custom code scripts in readable text
* Complex SQL queries in plain text
* Hidden website endpoints
* BitCoin wallets locations
* ...and many more

Ask yourself, did you ever put some sensitive content in your software that
you later regret?

## Why should I care?

If any of these things were to fall into the **wrong hands**, they could be
used to compromise your software or your infrastructure.

![You don't want this to happen to your software.](https://www.pelock.com/img/en/products/string-encrypt/database-password-plain-text.png)

Take for example database passwords. They could be used by a competitor
to view your database structure or dump all of its contents. You don't want
to lose all your hard work just because someone with a simple hex-editor can
discover your password in plain text.

# The solution — String Encrypt

I've decided to create a simple service called String Encrypt for developers,
offering fast string & file encryption without the need to write custom
encryption tools over and over again, because I did that many times.

String Encrypt can help you hide the things that shouldn't be visible at first
glance to anyone with a hex-editor.

![StringEncrypt main window](https://www.stringencrypt.com/images/stringencrypt.png)

## String Encrypt comes with:

* Online interface at https://www.stringencrypt.com
* Windows based GUI application available to download at https://www.stringencrypt.com/download/
* And WebApi interface (automation) https://www.stringencrypt.com/api/

## WebApi usage

You can use all of the features of StringEncrypt via our Web API interface.

Our API is based on POST requests and JSON encoded response.

In our PHP example, first you have to setup configuration array $options = array();, specify API
command to execute and call stringencrypt() function that will return $result array.

Currently we support only 2 commands:

* **encrypt** - encrypt a string or file (raw bytes)
* **is_demo** - returns information about current activation code status

### "encrypt" command usage example

```php
<?php

////////////////////////////////////////////////////////////////////////////////
//
// StringEncrypt.com Web API usage example
//
// Version        : v1.3
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
//$options["lang"] = "vbnet";
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
```

#### Return values:

* $result["error"] (int) - error code
* $result["source"] (string) - decryptor source code
* $result["expired"] (boolean) - expiration flag
* $result["credits_left"] (int) - number of credits left
* $result["credits_total"] (int) - initial number of credits

#### Error codes:

* ERROR_SUCCESS (0) - everything went fine
* ERROR_EMPTY_LABEL (1) - label parameter is empty
* ERROR_LENGTH_LABEL (2) - label length is too long
* ERROR_EMPTY_STRING (3) - input string is empty
* ERROR_EMPTY_BYTES (4) - input file bytes array is empty
* ERROR_EMPTY_INPUT (5) - input source (either string or file) is missing
* ERROR_LENGTH_STRING (6) - string or bytes length is too long
* ERROR_INVALID_LANG (7) - programming language not supported
* ERROR_INVALID_LOCALE (8) - language locale is not supported
* ERROR_CMD_MIN (9) - invalid number of minimum encryption commands
* ERROR_CMD_MAX (10) - invalid number of maximum encryption commands
* ERROR_DEMO (100) - you need a valid code to use full version features

### "is_demo" command usage example

This example shows how to get information about current activation code and its features.

```php
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
```

#### Return values:

* $result["demo"] (boolean) - demo mode flag
* $result["label_limit"] (int) - label limit length
* $result["string_limit"] (int) - string/file limit lenght
* $result["credits_left"] (int) - number of credits left
* $result["credits_total"] (int) - initial number of credits
* $result["cmd_min"] (int) - minimum number of encryption commands
* $result["cmd_max"] (int) - maximum number of encryption commands

#### Error codes
* none

## Features

String Encrypt is pretty simple, but it has a few things you might be interested to use.

* String or file encryption (**yes** you can encrypt file contents)
* UNICODE and ANSI strings supported
* Selectable Windows (\r\n), Mac (\r) or Linux (\n) new lines output encoding
* You can generate a code with global or local declared strings (like in a function)
* Adjustable number of encryption commands (you can create really huge decryptors if you want)

# How does it work?

I like simplicity and String Encrypt is very simple to use. All you
need to do is:

1. Enter the label of your string, say "szSecret"
2. Enter the string content, for example "Hello"
3. Select the output programming language for the decryption code
4. Hit the Encrypt and Generate Decryptor button


## The result
String Encrypt uses random encryption code for each string and the sample result
might look like this for the following supported set of programming languages.

![Output code](https://www.stringencrypt.com/images/stringencrypt_code.png)

## Supported programming languages

I have tried to cover most of the popular programming languages and a few favourite
of mine (like MASM). If you need something else - [contact with me](https://www.pelock.com/contact).


### C/C++ encryption (UNICODE example)
```cpp
// encrypted with https://www.stringencrypt.com (v1.3.0) [C/C++]
// wszLabel = "C/C++ String Encryption"
wchar_t wszLabel[24] = { 0x5ADA, 0x6C21, 0x5A24, 0x6DEF, 0x6DFE, 0x74C5, 0x5240, 0x428B,
                         0x4382, 0x4F69, 0x4CDC, 0x4827, 0x73A6, 0x598D, 0x4CF8, 0x4A43,
                         0x40AA, 0x3FB1, 0x4D34, 0x42DF, 0x474E, 0x42D5, 0x4C50, 0x8514 };
 
for (unsigned int JTIif = 0, ktTcs = 0; JTIif < 24; JTIif++)
{
        ktTcs = wszLabel[JTIif];
        ktTcs ^= JTIif;
        ktTcs ++;
        ktTcs += JTIif;
        ktTcs ^= JTIif;
        ktTcs = (((ktTcs & 0xFFFF) >> 3) | (ktTcs << 13)) & 0xFFFF;
        ktTcs = ~ktTcs;
        ktTcs += JTIif;
        ktTcs = (((ktTcs & 0xFFFF) >> 1) | (ktTcs << 15)) & 0xFFFF;
        ktTcs = ~ktTcs;
        ktTcs += JTIif;
        ktTcs ^= 0xB7B5;
        ktTcs += JTIif;
        ktTcs ^= JTIif;
        ktTcs -= JTIif;
        ktTcs = ((ktTcs << 13) | ( (ktTcs & 0xFFFF) >> 3)) & 0xFFFF;
        wszLabel[JTIif] = ktTcs;
}

wprintf(wszLabel);
```

### C# Sharp encryption (UNICODE example)

```csharp
// encrypted with https://www.stringencrypt.com (v1.3.0) [C#]
// superSecretString = "Easy encryption in C#"
String superSecretString = "\u6B56\uA14A\u834B\u954C\uD95A\uB14E\u814F\u595D" +
                           "\u9551\u8152\u9553\uBF54\u5B62\u9556\u9157\u2F65" +
                           "\u5366\u9F5A\uC568\u0169\uFF6A";
 
for (int XBasD = 0, Dbzej = 0; XBasD < 21; XBasD++)
{
        Dbzej = superSecretString[XBasD];
        Dbzej -= XBasD;
        Dbzej = ((Dbzej << 8) | ( (Dbzej & 0xFFFF) >> 8)) & 0xFFFF;
        Dbzej ^= 0xF9A1;
        Dbzej = (((Dbzej & 0xFFFF) >> 1) | (Dbzej << 15)) & 0xFFFF;
        Dbzej -= 0xA3CC;
        Dbzej ^= XBasD;
        Dbzej += 0x4C2C;
        superSecretString = superSecretString.Substring(0, XBasD) + (char)(Dbzej & 0xFFFF) + superSecretString.Substring(XBasD + 1);
}
 
MessageBox.Show(superSecretString);
```

## Visual Basic .NET aka VB.NET encryption (UNICODE EXAMPLE)

```vbnet
' encrypted with https://www.stringencrypt.com (v1.3.0) [Visual Basic .NET]
' EncryptedString = "Visual Basic .NET string encryption"
Dim epTlz() As Integer = { &H8ED9, &H3BD9, &HF1D8, &HAFD8, &H63D8, &H38D8, &H44D8, &HC2D7,
                           &H85D7, &H33D7, &HFDD6, &HA3D6, &HC4D6, &H76D6, &H16D6, &HC1D5,
                           &H90D5, &H84D5, &HF1D4, &HB0D4, &H76D4, &H3FD4, &HFAD3, &HBDD3,
                           &HC4D3, &H21D3, &HFAD2, &HC7D2, &H76D2, &H2DD2, &HF4D1, &HB0D1,
                           &H63D1, &H35D1, &HF6D0 }
Dim EncryptedString As String
Dim BePuQ As Integer
 
Dim blvjn As Integer
For blvjn = 0 To 34
  BePuQ = epTlz(blvjn)
  BePuQ -= 1
  BePuQ = (((BePuQ And &HFFFF) >> 13) Or (BePuQ << 3)) And &HFFFF
  BePuQ += blvjn
  BePuQ -= &HF74C
  BePuQ += blvjn
  BePuQ -= &H2E7B
  BePuQ = (((BePuQ And &HFFFF) >> 8) Or (BePuQ << 8)) And &HFFFF
  BePuQ = Not BePuQ
  BePuQ = BePuQ Xor blvjn
  BePuQ += 1
  BePuQ += blvjn
  BePuQ = ((BePuQ << 13) Or ( (BePuQ And &HFFFF) >> 3)) And &HFFFF
  EncryptedString = EncryptedString + ChrW(BePuQ And &HFFFF)
Next blvjn

MessageBox.Show(EncryptedString)
```

## Delphi & Pascal encryption (UNICODE example)

```delphi
// encrypted with https://www.stringencrypt.com (v1.3.0) [Delphi / Pascal]
var
  // mySecret = "Delphi is awesome!"
  mySecret: array[0..19] of WideChar;
  EPmwd: Integer;
  ZHnps: Integer;
 
begin
 
  mySecret[16] := WideChar($C22E); mySecret[5] := WideChar($C1FA);
  mySecret[7] := WideChar($C206); mySecret[8] := WideChar($C208);
  mySecret[10] := WideChar($C1FA); mySecret[4] := WideChar($C1FB);
  mySecret[9] := WideChar($C1AD); mySecret[17] := WideChar($C1EA);
  mySecret[2] := WideChar($C1FB); mySecret[11] := WideChar($C1BC);
  mySecret[3] := WideChar($C1FD); mySecret[6] := WideChar($C1BF);
  mySecret[15] := WideChar($C202); mySecret[0] := WideChar($C18F);
  mySecret[1] := WideChar($C1EE); mySecret[12] := WideChar($C206);
  mySecret[18] := WideChar($C28F); mySecret[14] := WideChar($C200);
  mySecret[13] := WideChar($C1B8);
 
  for ZHnps := 0 to 19 do
  begin
    EPmwd := Ord(mySecret[ZHnps]);
    EPmwd := EPmwd - ZHnps;
    EPmwd := EPmwd - $01BE;
    EPmwd := not EPmwd;
    EPmwd := EPmwd + $2D7A;
    EPmwd := EPmwd - ZHnps;
    EPmwd := EPmwd xor ZHnps;
    EPmwd := EPmwd + $004B;
    EPmwd := EPmwd xor ZHnps;
    EPmwd := EPmwd + ZHnps;
    Inc(EPmwd);
    EPmwd := EPmwd xor $EB5C;
    EPmwd := EPmwd + $799C;
    EPmwd := EPmwd xor ZHnps;
    mySecret[ZHnps] := WideChar(EPmwd);
  end;
 
  ShowMessage(mySecret);
```

## Java encryption (UNICODE example)

```java
// encrypted with https://www.stringencrypt.com (v1.3.0) [Java]
// myJavaPassword = "Very secret password! QWERTY"
String myJavaPassword = "";
 
int JbeMY[] = { 0x0434, 0x842C, 0x0426, 0x8422, 0x03CD, 0x8423, 0x842C, 0x842B,
                0x0416, 0x843C, 0x0413, 0x03DD, 0x0415, 0x843E, 0x8413, 0x8413,
                0x8421, 0x8425, 0x0426, 0x040B, 0x83AE, 0x03AD, 0x8436, 0x8431,
                0x83CC, 0x0406, 0x0403, 0x8402 };
 
for (int zuLRG = 0, tnYzy = 0; zuLRG < 28; zuLRG++)
{
        tnYzy = JbeMY[zuLRG];
        tnYzy --;
        tnYzy ^= zuLRG;
        tnYzy += 0x99C8;
        tnYzy ^= zuLRG;
        tnYzy ^= 0x95C1;
        tnYzy = (((tnYzy & 0xFFFF) >> 15) | (tnYzy << 1)) & 0xFFFF;
        tnYzy --;
        tnYzy ^= 0xFFFF;
        tnYzy += 0x10CA;
        myJavaPassword = myJavaPassword + (char)(tnYzy & 0xFFFF);
}
 
System.out.println(myJavaPassword);
```

### JavaScript encryption (ANSI)

```js
<script type="text/javascript">
// encrypted with https://www.stringencrypt.com (v1.3.0) [JavaScript]
// hiddenJavaScriptString = "How to encrypt string in JavaScript? That\'s how!"
var hiddenJavaScriptString = "\x8C\xB4\x4E\x5B\x4A\xD4\x07\xBC\xB4\xC4\x52\x7E\x1A\x72\xE7\xB6" +
                             "\xDA\xDA\x88\x67\xF8\x5C\x67\x49\x50\xB9\x47\xFA\x1D\xED\x2D\x39" +
                             "\x8D\x21\x57\x66\xA0\xB1\xA9\x8D\x5F\xF0\x53\x9C\x7A\x1E\xC3\xF0";
 
for (var oBFEi = 0, hFSrA = 0; oBFEi < 48; oBFEi++)
{
        hFSrA = hiddenJavaScriptString.charCodeAt(oBFEi);
        hFSrA = ((hFSrA << 1) | ( (hFSrA & 0xFF) >> 7)) & 0xFF;
        hFSrA += 0x9E;
        hFSrA = ((hFSrA << 6) | ( (hFSrA & 0xFF) >> 2)) & 0xFF;
        hFSrA ^= oBFEi;
        hFSrA -= oBFEi;
        hFSrA ^= 0xFF;
        hFSrA = (((hFSrA & 0xFF) >> 6) | (hFSrA << 2)) & 0xFF;
        hFSrA ^= 0xC3;
        hFSrA = ((hFSrA << 4) | ( (hFSrA & 0xFF) >> 4)) & 0xFF;
        hFSrA += 0xD1;
        hFSrA -= oBFEi;
        hFSrA += 0x0B;
        hFSrA ^= 0xD8;
        hFSrA = (((hFSrA & 0xFF) >> 7) | (hFSrA << 1)) & 0xFF;
        hFSrA += 0xB0;
        hiddenJavaScriptString = hiddenJavaScriptString.substr(0, oBFEi) + String.fromCharCode(hFSrA & 0xFF) + hiddenJavaScriptString.substr(oBFEi + 1);
}
 
alert(hiddenJavaScriptString);
</script>
```

### Python encryption (UNICODE example)

```python
# encrypted with https://www.stringencrypt.com (v1.3.0) [Python]
# cute_wabbit = "A little girl goes into a pet show and asks for a wabbit... http..."
cute_wabbit = [ 0x1005, 0x4004, 0x4005, 0x5006, 0x4003, 0x0004, 0x4002, 0x9001,
                0x0009, 0x300E, 0x100F, 0xE00F, 0xC00A, 0x400D, 0xF00C, 0x300B,
                0x5013, 0x7013, 0x8015, 0x5012, 0xE018, 0x0018, 0x7016, 0xC011,
                0x1019, 0x401E, 0x801C, 0x901C, 0x401D, 0x4019, 0xB01F, 0x401F,
                0xF02F, 0x302F, 0x8029, 0xD02E, 0xE02C, 0x002B, 0x802E, 0xD029,
                0x3026, 0xF026, 0xB028, 0xC024, 0x6022, 0xB021, 0xA023, 0xC027,
                0x103B, 0x4040, 0xF03A, 0xD03A, 0x2040, 0x603F, 0x103E, 0x803E,
                0xE035, 0xA036, 0x6037, 0xC038, 0x8036, 0x0036, 0xC037, 0xC038,
                0x3058, 0xE053, 0x7051, 0x3052, 0x7053, 0x3054, 0xF051, 0x2055,
                0x005E, 0xD05D, 0xC060, 0x4060, 0xF05A, 0xA059, 0x6060, 0x305B,
                0x2044, 0x3044, 0x7045, 0x8042, 0xF048, 0x7047, 0x7042, 0x4045,
                0x504A, 0x904A, 0x704B, 0xE04B, 0xF04A, 0x7049, 0xB050, 0x9050,
                0x4080, 0x1080, 0x5079, 0xB07D, 0x107C, 0x607B, 0xA07A, 0x5079,
                0x4076 ]
 
for wEzdt in range(105):
  zWqET = cute_wabbit[wEzdt]
  zWqET -= 1
  zWqET ^= wEzdt
  zWqET = (((zWqET & 0xFFFF) >> 14) | (zWqET << 2)) & 0xFFFF
  zWqET ^= wEzdt
  zWqET = (((zWqET & 0xFFFF) >> 14) | (zWqET << 2)) & 0xFFFF
  cute_wabbit[wEzdt] = zWqET
 
cute_wabbit = ''.join(chr(zWqET & 0xFFFF) for zWqET in cute_wabbit)
 
del wEzdt, zWqET
 
print(cute_wabbit)
```

### Ruby encryption (UNICODE example)

```ruby

# encrypted with https://www.stringencrypt.com (v1.3.0) [Ruby]
# ruby = "Ruby on rails"
ruby = "\u68EA\u60A2\u78C6\u7096\u4946\u40A6\u58A6\u5140\u287A\u209A\u38C8\u30C0\u0870"
 
ruby.codepoints.each_with_index do |komgu, rydut|
  komgu = ((komgu << 5) | ( (komgu & 0xFFFF) >> 11)) & 0xFFFF
  komgu ^= rydut
  komgu = (((komgu & 0xFFFF) >> 6) | (komgu << 10)) & 0xFFFF
  komgu += rydut
  komgu -= 0x34D0
  komgu ^= rydut
  komgu = ((komgu << 13) | ( (komgu & 0xFFFF) >> 3)) & 0xFFFF
  komgu = ~komgu
  komgu -= 1
  komgu = ((komgu << 3) | ( (komgu & 0xFFFF) >> 13)) & 0xFFFF
  komgu ^= rydut
  ruby[rydut] = [komgu & 0xFFFF].pack('U').force_encoding('UTF-8')
end
 
puts ruby
```

```AutoIt encryption (UNICODE example)

```autoit
; encrypted with https://www.stringencrypt.com (v1.3.0) [AutoIt]
#include <Array.au3>
 
; $autoit_obfuscator = "We got it too https://www.pelock.com/products/autoit-obfuscator"
Global $autoit_obfuscator[64] = [ 0xD440, 0xCD01, 0xEF42, 0xCC83, 0xC944, 0xC485, 0xEE46, 0xCA87, _
                                  0xC7C8, 0xED89, 0xC74A, 0xCA8B, 0xCB4C, 0xEC8D, 0xC84E, 0xC60F, _
                                  0xC1D0, 0xC391, 0xC2D2, 0xE613, 0xED54, 0xED15, 0xC1D6, 0xC197, _
                                  0xC258, 0xEE99, 0xC15A, 0xCB9B, 0xCEDC, 0xCF1D, 0xC9DE, 0xCD9F, _
                                  0xE0E0, 0xC621, 0xC0E2, 0xC1A3, 0xE164, 0xCEA5, 0xCF66, 0xC1A7, _
                                  0xC7E8, 0xCF29, 0xC4EA, 0xCF2B, 0xCD6C, 0xE32D, 0xC4EE, 0xCEAF, _
                                  0xC9F0, 0xC431, 0xC7F2, 0xC933, 0xE474, 0xC535, 0xC376, 0xC137, _
                                  0xCB78, 0xC839, 0xC0FA, 0xC1BB, 0xCAFC, 0xC73D, 0xC97E, 0xF03F ]
 
For $PxWtE = 0 to 63
    $eUOPa = $autoit_obfuscator[$PxWtE]
    $eUOPa = BitXOR($eUOPa, $PxWtE)
    $eUOPa = $eUOPa - 1
    $eUOPa = BitRotate($eUOPa, 10, "W")
    $eUOPa = $eUOPa + 1
    $eUOPa = BitXOR($eUOPa, $PxWtE)
    $eUOPa = BitNOT($eUOPa)
    $eUOPa = BitRotate($eUOPa, 15, "W")
    $autoit_obfuscator[$PxWtE] = ChrW(BitAND($eUOPa, 0xFFFF))
Next
 
$autoit_obfuscator = _ArrayToString($autoit_obfuscator, "")
 
ConsoleWrite($autoit_obfuscator)
```

### PowerShell encryption (UNICODE example)

```powershell
# encrypted with https://www.stringencrypt.com (v1.3.0) [PowerShell]
# $Label = "Well, it has some interesting syntax!"
[uint16[]] $pYeOS = 0x5654, 0x5651, 0x1650, 0x9650, 0x1661, 0x9664, 0xD652, 0x9650,
                    0x1666, 0x9654, 0xD656, 0xD652, 0x1668, 0xD653, 0x5655, 0x5656,
                    0xD658, 0x966A, 0xD658, 0x1658, 0x1657, 0x565B, 0x9658, 0x565C,
                    0x5659, 0x9659, 0xD65C, 0x165C, 0x565E, 0x9670, 0x565C, 0x565B,
                    0x965E, 0x965D, 0xD662, 0x965D, 0xD673
[string] $Label = ""
 
for ($TPYSL = 0; $TPYSL -lt 37; $TPYSL++)
{
  $kqSuK = $pYeOS[$TPYSL]
  $kqSuK = -bnot $kqSuK
  $kqSuK = (($kqSuK -shl 7) -bor ( ($kqSuK -band 0xFFFF) -shr 9)) -band 0xFFFF
  $kqSuK += 1
  $kqSuK = ((($kqSuK -band 0xFFFF) -shr 5) -bor ($kqSuK -shl 11)) -band 0xFFFF
  $kqSuK += $TPYSL
  $kqSuK -= 1
  $kqSuK += $TPYSL
  $kqSuK -= 0xAE56
  $Label += [char]($kqSuK -band 0xFFFF)
}
 
Write-Host $Label
```

### Haskell encryption (ANSI example)

```haskell
-- encrypted with https://www.stringencrypt.com (v1.3.0) [Haskell]
module Main where
 
import qualified Data.Char
import qualified Data.Bits
 
main = do
  putStrLn $ gimmeh
 
-- gimmeh = "Monads! I need more Monads!"
gimmeh = zipWith f [0..] [ 0x40, 0x7F, 0x61, 0x53, 0x6D, 0x67, 0x96, 0x96,
                           0x4C, 0x98, 0x69, 0x47, 0x44, 0x40, 0x9F, 0x4B,
                           0x4E, 0x6E, 0xBE, 0x82, 0x94, 0xB3, 0xB5, 0x47,
                           0xB1, 0xA3, 0x8A ]
  where
    f vpkqq ujzsd = let wcufe0 = ujzsd
                        wcufe1 = wcufe0 `Data.Bits.xor` 0xB0
                        wcufe2 = Data.Bits.complement wcufe1
                        wcufe3 = wcufe2 - 0xD0
                        wcufe4 = Data.Bits.complement wcufe3
                        wcufe5 = wcufe4 - 0x0E
                        wcufe6 = wcufe5 - vpkqq
                        wcufe7 = wcufe6 `Data.Bits.xor` vpkqq
                        wcufe8 = wcufe7 - vpkqq
                        wcufe9 = Data.Bits.complement wcufe8
                    in Data.Char.chr (wcufe9 Data.Bits..&. 0xFF)
```

### MASM Assembler 32 bit encryption (UNICODE example)

```asm
; encrypted with https://www.stringencrypt.com (v1.3.0) [MASM Assembler (32 bit)]
 
.data
 
        ; szMyGoodOldFriend = "I will be always here :)"
        szMyGoodOldFriend       dw 0BD37h, 0BD4Bh, 0BD63h, 0BD14h, 0BD0Ch, 0BD13h, 0BD4Eh, 0BD17h
                                dw 0BD13h, 0BD53h, 0BD15h, 0BD55h, 0BCE9h, 0BD5Ah, 0BCF1h, 0BCE2h
                                dw 0BC94h, 0BD63h, 0BD59h, 0BCB3h, 0BD5Fh, 0BC9Fh, 0BCF8h, 0BCA8h
                                dw 0BD3Ch
 
.code
        mov     ecx, offset szMyGoodOldFriend
        mov     edx, 25
        and     eax, 0
 
@@:
        mov     bx, word ptr [ecx + eax]
        not     ebx
        sub     ebx, eax
        not     ebx
        xor     ebx, 02C59h
        sub     ebx, 0DFB5h
        add     ebx, eax
        not     ebx
        add     ebx, 061C5h
        xor     ebx, 04FBCh
        dec     ebx
        add     ebx, eax
        not     ebx
        mov     word ptr [ecx + eax], bx
        inc     eax
        dec     edx
        jne     @b
 
        push    0
        push    ecx
        push    ecx
        push    0
        call    MessageBoxW
```

### FASM Assembler 32 bit (ANSI example)

```asm

; encrypted with https://www.stringencrypt.com (v1.3.0) [FASM Assembler (32 bit)]
 
        ; szFasm = "Hi Tomek Grysztar :)"
        local   szFasm[21]:BYTE
 
        lea     edx, [szFasm]
 
        mov     byte [edx + 8], 0D6h
        mov     byte [edx + 9], 0F5h
        mov     byte [edx + 5], 09Fh
        mov     byte [edx + 0], 0EEh
        mov     byte [edx + 3], 084h
        mov     byte [edx + 2], 0E2h
        mov     byte [edx + 16], 08Ch
        mov     byte [edx + 19], 0FBh
        mov     byte [edx + 10], 0A4h
        mov     byte [edx + 7], 09Dh
        mov     byte [edx + 18], 0FCh
        mov     byte [edx + 17], 094h
        mov     byte [edx + 4], 0ADh
        mov     byte [edx + 6], 0A7h
        mov     byte [edx + 11], 0BBh
        mov     byte [edx + 12], 0A1h
        mov     byte [edx + 15], 0ABh
        mov     byte [edx + 14], 0BEh
        mov     byte [edx + 20], 0FEh
        mov     byte [edx + 13], 0AAh
        mov     byte [edx + 1], 093h
 
        mov     eax, 21
        sub     ebx, ebx
 
@@:
        mov     cl, byte [edx + ebx]
        xor     ecx, ebx
        dec     ecx
        xor     ecx, 043h
        not     ecx
        add     ecx, 015h
        xor     ecx, ebx
        add     ecx, ebx
        add     ecx, 055h
        xor     ecx, ebx
        xor     ecx, 029h
        xor     ecx, ebx
        xor     ecx, 034h
        xor     ecx, ebx
        xor     ecx, 0EFh
        dec     ecx
        mov     byte [edx + ebx], cl
        inc     ebx
        dec     eax
        jne     @b
 
        push    0
        push    edx
        push    edx
        push    0
        call    [MessageBoxA]
```

# Fin

I hope you like it and you will try it at least :)

Bartosz Wójcik
https://www.pelock.com
