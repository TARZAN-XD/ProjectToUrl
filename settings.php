<?php

$trustedKey = 'uploader@hosting.com';
$customKey = $_SERVER['HTTP_X_SC_KEY'] ?? '';
$referer    = $_SERVER['HTTP_REFERER'] ?? '';
$xhr        = $_SERVER['HTTP_X_REQUESTED_WITH'] ?? '';
$host       = $_SERVER['HTTP_HOST'];

$isTrustedBot = $customKey === $trustedKey;
$isFromSite   = strpos($referer, $host) !== false;
$isAjax       = strtolower($xhr) === 'xmlhttprequest';

if (!$isTrustedBot && !$isFromSite && !$isAjax) {
  http_response_code(403);
  exit('🚫 Access Denied!');
} 

// Jika Ingin Mengubah Apikey Ubah Bagian Ini saja: Vanzryuichi-886

define("API_KEY", "Vanzryuichi-886");  
