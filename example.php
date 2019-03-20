<?php
	require "bezahlcode.class.php";

	$bezahlcode = new Bezahlcode("IBAN", "BIC", "bankaccount owner");
	$bezahlcode->generatePayload("usage", "amount");

	/*	get Bezahlcode as base64-string
	generateBase64(filetype)
	filetype defaults to jpg; options: jpg, png, gif
	----------------------------------- */
	$base64 = $bezahlcode->generateBase64();
	echo "<img src='$base64' alt='Bezahlcode' />";

	/*	save Bezahlcode
	saveImage(filename, filetype)
	filetype defaults to jpg; options: jpg, png, gif
	----------------------------------- */
	$bezahlcode->saveImage("output.jpg", "jpg");
	// or
	$bezahlcode->saveImage("output.jpg");
	// or
	$bezahlcode->saveImage("output.png", "png");

	/*	output Bezahlcode to Webbrowser
	outputImage(filetype)
	filetype defaults to jpg; options: jpg, png, gif
	----------------------------------- */
	$bezahlcode->outputImage();
?>
