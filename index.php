<?php
$string = '544049568640'; 
$iv = '55555555'; 
$passphrase = '8chrsLng'; 

$encryptedString = encryptString($string, $passphrase, $iv); 

$decryptedString = decryptString($encryptedString, $passphrase, $iv); 

function encryptString($unencryptedText, $passphrase, $iv) { 
  $enc = mcrypt_encrypt(MCRYPT_BLOWFISH, $passphrase, $unencryptedText, MCRYPT_MODE_CBC, $iv); 
  return base64_encode($enc); 
} 

function decryptString($unencryptedText, $passphrase, $iv) {
  $enc = base64_decode($unencryptedText);
  $enc = mcrypt_decrypt(MCRYPT_BLOWFISH, $passphrase, $enc, MCRYPT_MODE_CBC, $iv); 
  return  rtrim($enc, "\0");
} 


var_dump($encryptedString);
var_dump($decryptedString);