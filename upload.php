<?php
// إعداد نوع الاستجابة بصيغة JSON
header('Content-Type: application/json');

// التحقق من نوع الطلب
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => false, "message" => "يُرجى استخدام طلب من نوع POST فقط"]);
    exit;
}

// التحقق من وجود الملف المرسل
if (!isset($_FILES['file'])) {
    echo json_encode(["status" => false, "message" => "لم يتم إرسال أي ملف"]);
    exit;
}

// أنواع الملفات المسموح بها
$allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'audio/mpeg', 'video/mp4'];
$maxSize = 80 * 1024 * 1024; // 80 ميجابايت
$target_dir = "X/";

// دالة لتوليد اسم عشوائي للملف
function generateRandomName($length = 8) {
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, $length);
}

$file = $_FILES['file'];
$type = mime_content_type($file['tmp_name']);
$size = $file['size'];

// التحقق من نوع الملف
if (!in_array($type, $allowedTypes)) {
    echo json_encode(["status" => false, "message" => "نوع الملف غير مدعوم"]);
    exit;
}

// التحقق من حجم الملف
if ($size > $maxSize) {
    echo json_encode(["status" => false, "message" => "الحجم الأقصى المسموح به هو 80 ميجابايت"]);
    exit;
}

// تجهيز الاسم الجديد للملف
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
$randomName = generateRandomName();
$filename = $randomName . "." . $ext;
$target_file = $target_dir . $filename;

// إنشاء مجلد الحفظ إن لم يكن موجودًا
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

// نقل الملف إلى المسار المستهدف
if (move_uploaded_file($file['tmp_name'], $target_file)) {
    echo json_encode([
        "status" => true,
        "message" => "تم رفع الملف بنجاح!",
        "filename" => $filename,
        "url" => ($_SERVER['REQUEST_SCHEME'] ?? 'https') . "://" . $_SERVER['HTTP_HOST'] . "/" . $target_file
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        "status" => false,
        "message" => "حدث خطأ أثناء حفظ الملف"
    ]);
}
?>
