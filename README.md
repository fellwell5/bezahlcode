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
$base64 = $bezahlcode->generateBase64();
echo "<img src='$base64' alt='Bezahlcode' />";
```

or save the code as png file
```php
$bezahlcode->savePNG("output.png");
```

# API
If you don't want to install the class, you can also use our api:
http://dev.matthiasschaffer.com/bezahlcode/api.php?iban=[IBAN]&bic=[BIC]&name=[bankaccountowner]&usage=[usage]&amount=[amount]
