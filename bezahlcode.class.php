<?php
	/**
	 * Bezahlcode 0.3
	 *
	 * Generates SEPA QR-Codes for money transfer
	 *
	 * PHP version tested up to 7.3
	 *
	 * Bezahlcode is distributed under LGPL 3
	 * Copyright (C) 2019 Matthias Schaffer
	 *
	 * @package    Bezahlcode
	 * @author     Matthias Schaffer <hello <at> matthiasschaffer <dot> com>
	 * @copyright  2019
	 * @license    https://www.gnu.org/licenses/lgpl LGPL 3
	 * @link       https://github.com/fellwell5/bezahlcode/
	 * @since      File available since beginning of project
	*/
	class Bezahlcode {
		public $base64_frame = "data:image/png;base64,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";
		public $phpqrcode_path = "./phpqrcode.php";
		private $qrprovider, $use_frame, $iban, $bic, $name, $payload, $usage, $amount;
		
		/**
		 * __construct
		 * 
		 * Create class object and save data for further use.
		 *
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
		 *
		 * @access public
		 * @since Method available since Release 0.1
		 */
		function __construct($iban, $bic, $name, $qrprovider = "phpqrcode", $use_frame = true){
			$this->iban = $iban;
			$this->bic = $bic;
			$this->name = $name;
			$this->qrprovider = $qrprovider;
			$this->use_frame = $use_frame;
			
			if ($qrprovider == "phpqrcode") {
				if (!file_exists($this->phpqrcode_path)) {
					die("PHPQRCODE was selected as QR-Code provider, but phpqrcode.php was not found at the specified path. Please set the variable to the path.");
				}
				require_once $this->phpqrcode_path;
				if (!class_exists("QRcode")) {
					die("PHPQRCODE was selected as QR-Code provider, but QRcode class could not be loaded.");
				}
			}
		}
		
		/**
		 * generatePayload
		 * 
		 * Generate payload array with specified data and save it for further use.
		 *
		 * @param string $usage
		 *
		 * @param decimal $amount Formatted like 10.56
		 *
		 * @access public
		 * @since Method available since Release 0.1
		 */
		public function generatePayload($usage, $amount){
			$this->usage = $usage;
			$this->amount = $amount;
			$payload = array("BCD", "001", "1", "SCT", $this->bic, $this->name, $this->iban, "EUR".$amount, "", "", $usage);
			$this->payload = implode("\n", $payload);
		}
		
		/**
		 * getPayload
		 * 
		 * Return the payload saved from Bezahlcode->generatePayload().
		 *
		 * @return string
		 *
		 * @access private
		 * @since Method available since Release 0.1
		 */
		private function getPayload(){
			return $this->payload;
		}
		
		/**
		 * getQRCode
		 * 
		 * Return image resource with specified payload 
		 *
		 * @param string $data Should be the payload but any text could be used.
		 *
		 * @return resource
		 *
		 * @access private
		 * @since Method available since Release 0.2
		 */
		private function getQRCode(){
			if ($this->qrprovider == "phpqrcode") {
				ob_start();
				QRcode::png($this->payload, false, QR_ECLEVEL_L, 9, 1);
				$qr = ob_get_contents();
				ob_end_clean();
				$qr = imagecreatefromstring($qr);
			} elseif ($this->qrprovider == "google") {
				$qr = imagecreatefrompng("https://chart.apis.google.com/chart?cht=qr&chs=350x350&chld=L|0&chl=".urlencode($this->payload));
			} else {
				die("QRCode provider $this->qrprovider is not valid");
			}
			
			if ($this->use_frame) {
				$img = str_replace('data:image/png;base64,', '', $this->base64_frame);
				$img = str_replace(' ', '+', $img);
				$img = base64_decode($img);
				$layer = imagecreatefromstring($img);
				imagealphablending($layer, true);
				imagesavealpha($layer, true);
				imagecopy($layer, $qr, 33, 33, 0, 0, 350, 350);
				
				return $layer;
			} else {
				return $qr;
			}
			
		}
			
    
		/**
		 * selectType
		 * 
		 * Return the content type and extension from specified image type.
		 *
		 * @param string $type optional The file type as which the image should be generated.
		 * 		Defaults to '' if nothing is specified jpg is used. See at Bezahlcode->selectType.
		 *
		 * @return array With the content type and the extension.
		 * 		for example: array("image/png", "png");
		 *
		 * @access private
		 * @since Method available since Release 0.2
		 */
		private function selectType($type=''){
			switch(strtolower($type)){
				case "gif": return ["image/gif", "gif"];
				case "png": return ["image/png", "png"];
				default: 		return ["image/jpeg", "jpg"];
			}
		}
    
		/**
		 * generateBase64
		 * 
		 * Generate a Bezahlcode with saved Payload and return the Bezahlcode as base64 encoded string.
		 *
		 * @param string $type optional The file type as which the image should be generated.
		 * 		Defaults to '' if nothing is specified jpg is used. See at Bezahlcode->selectType.
		 *
		 * @return string The generated base64 string.
		 *
		 * @access public
		 * @since Method available since Release 0.1
		 */
		public function generateBase64($type=''){
			$type = $this->selectType($type);
			$bezahlcode = $this->getQRCode();
			
			ob_start();
			if($type[1] == "gif"){
				imagegif($bezahlcode);
			}elseif($type[1] == "png"){
				imagepng($bezahlcode);
			}else{
				imagejpeg($bezahlcode);
			}
			$imagedata = ob_get_contents();
			ob_end_clean();
			imagedestroy($bezahlcode);
			
			header("Content-Type: text/html; charset=UTF-8");
			return 'data:'.$type[0].';base64,'.base64_encode($imagedata);
		}
		
		/**
		 * saveImage
		 * 
		 * Generate a Bezahlcode with saved Payload and save it as file.
		 *
		 * @param string $filename optional The path and filename where the Bezahlcode should be saved.
		 * 		Defaults to '' and then a filename is generated from the usage field.
		 * @param string $type optional The file type as which the image should be saved.
		 * 		Defaults to '' if nothing is specified jpg is used. See at Bezahlcode->selectType.
		 *
		 * @return string The filename where the Bezahlcode was saved.
		 *
		 * @access public
		 * @since Method available since Release 0.2
		 */
		public function saveImage($filename='',$type=''){
			$type = $this->selectType($type);
			$bezahlcode = $this->getQRCode();
			
			if(empty($filename)) $filename = "bezahlcode_".preg_replace('/[^a-zA-Z0-9\-\_]/','', $this->usage).".".$type[1];
			
			if($type[1] == "gif"){
				imagegif($bezahlcode, $filename);
			}elseif($type[1] == "png"){
				imagepng($bezahlcode, $filename);
			}else{
				imagejpeg($bezahlcode, $filename);
			}
			
			return $filename;
		}
		
		
		/**
		 * outputImage
		 * 
		 * Generate a Bezahlcode and output it to the webbrowser.
		 * After the output the function exit() is called to suppress further output.
		 *
		 * @param string $type optional The file type as which the image should be outputted.
		 * 		Defaults to '' if nothing is specified jpg is used. See at Bezahlcode->selectType.
		 *
		 *
		 * @access public
		 * @since Method available since Release 0.2
		 */
		public function outputImage($type=''){
			$type = $this->selectType($type);
			$bezahlcode = $this->getQRCode();
			
			header("Content-type: ".$type[0]);
			header("Content-Disposition: inline; filename=bezahlcode.".$type[1]);
			if($type[1] == "gif"){
				imagegif($bezahlcode);
			}elseif($type[1] == "png"){
				imagepng($bezahlcode);
			}else{
				imagejpeg($bezahlcode);
			}
			imagedestroy($bezahlcode);
			
			exit();
		}
	}
?>
