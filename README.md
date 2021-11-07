# Bezahlcode
Generates SEPA QR-Codes for money transfer

## Prerequisite

php GD2 extension must be installed

## Get started
Copy "bezahlcode.class.php" and "phpqrcode.php" to your desired location.
"phpqrcode.php" is only needed if you want to generate the QRCodes local, it is possible to use the Google QRcode API.

```php
require "bezahlcode.class.php";

$bezahlcode = new Bezahlcode("IBAN", "BIC", "bankaccount owner");
$bezahlcode->generatePayload("usage", "amount");
```

You can get the code as base 64:
```php
$base64 = $bezahlcode->generateBase64(); // Specified filetypes can be: jpg, png, gif; defaults to jpg
echo "<img src='$base64' alt='Bezahlcode' />";
```

or save the code as image file
```php
$bezahlcode->saveImage("output.jpg");
$bezahlcode->saveImage("output.png", "png"); // Specified filetypes can be: jpg, png, gif; defaults to jpg
```

or output the Bezahlcode to the webbrowser
```php
$bezahlcode->outputImage();
$bezahlcode->outputImage("jpg"); // Specified filetypes can be: jpg, png, gif; defaults to jpg
```

There are two optional arguments for the constructor.
```php
/**
 * @param string $iban
 *
 * @param string $bic
 *
 * @param string $name Name of the bank account owner.
 *
 * @param string $qrprovider (optional)
 * 		Defaults to 'phpqrcode'.
 * 		options are 'phpqrcode' or 'google'
 *
 * @param boolean $use_frame (optional) Use Bezahlcode-Frame around the QRcode. Defined by the public variable $base64_frame
 */
$bezahlcode = new Bezahlcode("IBAN", "BIC", "bankaccount owner", "phpqrcode", true);
```

# API
If you don't want to install the class, you can also use our api:
https://dev.matthiasschaffer.com/bezahlcode/api.php?iban=[IBAN]&bic=[BIC]&name=[bankaccountowner]&usage=[usage]&amount=[amount]
