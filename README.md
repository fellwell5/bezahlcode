# Bezahlcode
Generates SEPA QR-Codes for money transfer

## Get started
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

# API
If you don't want to install the class, you can also use our api:
http://dev.matthiasschaffer.com/bezahlcode/api.php?iban=[IBAN]&bic=[BIC]&name=[bankaccountowner]&usage=[usage]&amount=[amount]
