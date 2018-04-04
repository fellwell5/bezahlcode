<?php
  require "bezahlcode.class.php";
	
	$bezahlcode = new Bezahlcode("IBAN", "BIC", "bankaccount owner");
	$bezahlcode->generatePayload("usage", "amount");
	
	/*	get Bezahlcode as base64-string
	----------------------------------- */
	$base64 = $bezahlcode->generateBase64();
	echo "<img src='$base64' alt='Bezahlcode' />";
	
	/*	save Bezahlcode as png
	----------------------------------- */
	$bezahlcode->savePNG("output.png");
?>
