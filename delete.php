<?php
require 'settings.php';
header('Content-Type: application/json');

// التحقق من صحة مفتاح API
$key = $_GET['apikey'] ?? '';
if ($key !== API_KEY) {
    http_response_code(401);
    echo json_encode(["status" => false, "message" => "مفتاح API غير صالح"]);
    exit;
}

// التحقق من وجود اسم الملف المطلوب حذفه
$filename = $_GET['file'] ?? '';
if (!$filename) {
    echo json_encode(["status" => false, "message" => "لم يتم تحديد اسم الملف"]);
    exit;
}

// تحديد المسار الكامل للملف داخل مجلد X
$path = 'X/' . basename($filename);

// التحقق من وجود الملف فعليًا
if (!file_exists($path)) {
    echo json_encode(["status" => false, "message" => "الملف غير موجود"]);
    exit;
}

// محاولة حذف الملف
if (unlink($path)) {
    echo json_encode(["status" => true, "message" => "تم حذف الملف بنجاح"]);
} else {
    echo json_encode(["status" => false, "message" => "فشل في حذف الملف"]);
}
?>
