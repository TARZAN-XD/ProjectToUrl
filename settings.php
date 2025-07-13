<?php
// إعداد مفتاح API الموثوق
$trustedKey = 'uploader@hosting.com';

// الحصول على ترويسة مخصصة للتحقق
$customKey = $_SERVER['HTTP_X_SC_KEY'] ?? '';
$referer   = $_SERVER['HTTP_REFERER'] ?? '';
$xhr       = $_SERVER['HTTP_X_REQUESTED_WITH'] ?? '';
$host      = $_SERVER['HTTP_HOST'];

// التحقق من:
$isTrustedBot = $customKey === $trustedKey;               // هل هو بوت موثوق؟
$isFromSite   = strpos($referer, $host) !== false;        // هل الطلب من نفس الموقع؟
$isAjax       = strtolower($xhr) === 'xmlhttprequest';    // هل هو طلب AJAX؟

// إذا لم يكن الطلب موثوقًا نمنعه
if (!$isTrustedBot && !$isFromSite && !$isAjax) {
    http_response_code(403);
    exit('🚫 تم رفض الوصول!');
}

// 🛠️ يمكنك تغيير مفتاح API من هنا فقط:
define("API_KEY", "TarzanWaqdi-886"); // مفتاح API الخاص بـ طرزان الواقدي
?>
