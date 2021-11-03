<?php

	require("bezahlcode.class.php");
	
	// IBAN, BIC, accountowner, qrcodeprovider, use Bezahlcode-Frame
	// string qrprovider = default phpqrcode, options: phpqrcode, google
	// boolean use_frame = default true // Use the Frame around the QR-Code with the text "Zahlen mit Code"
	// it's possible to change the frame by setting the variable $bezahlcode->base64_frame with your own frame
	$bezahlcode = new Bezahlcode("DE72 3702 0500 0009 7097 00", "BFSWDE33XXX", "Ärzte ohne Grenzen e.V.");
	$bezahlcode = new Bezahlcode("DE72 3702 0500 0009 7097 00", "BFSWDE33XXX", "Ärzte ohne Grenzen e.V.", "phpqrcode", false);
	$bezahlcode = new Bezahlcode("DE72 3702 0500 0009 7097 00", "BFSWDE33XXX", "Ärzte ohne Grenzen e.V.", "google");
	$bezahlcode->generatePayload("Donation", 10.99);
	
	/*	get Bezahlcode as base64-string
	generateBase64(filetype)
	filetype defaults to jpg; options: jpg, png, gif
	----------------------------------- */
	$base64 = $bezahlcode->generateBase64('png');
	echo "<img src=\"".$base64."\" title=\"Donate via Bezahlcode\">";
	
	/*	save Bezahlcode
	saveImage(filename, filetype)
	filetype defaults to jpg; options: jpg, png, gif
	----------------------------------- */
	$filename = $bezahlcode->saveImage("donation.jpg", "jpg");
	// or
	$filename = $bezahlcode->saveImage("output.jpg");
	// or
	$filename = $bezahlcode->saveImage("output.png", "png");
	// or
	$filename = $bezahlcode->saveImage();

	/*	output Bezahlcode to Webbrowser
	outputImage(filetype)
	filetype defaults to jpg; options: jpg, png, gif
	----------------------------------- */
	$bezahlcode->outputImage('png');
	// or
	$bezahlcode->outputImage();
