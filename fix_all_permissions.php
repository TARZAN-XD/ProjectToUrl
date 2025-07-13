<?php
/**
 * 🔧 سكربت تصحيح صلاحيات الملفات والمجلدات
 * 🛡️ لحل مشاكل الصلاحيات (403 / 404)
 * ✍️ © 2025 طرزان الواقدي
 * 
 * المجلدات = 755 | الملفات = 644
 */

// دالة لضبط صلاحيات الملفات والمجلدات
function fixPermissions($dir) {
    $rii = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($rii as $file) {
        $path = $file->getPathname();

        if ($file->isDir()) {
            chmod($path, 0755); // صلاحيات المجلد
        } elseif ($file->isFile()) {
            chmod($path, 0644); // صلاحيات الملف
        }
    }

    // ضبط صلاحيات المجلد الرئيسي
    chmod($dir, 0755);
}

// 🔁 المجلدات المطلوب تصحيح صلاحياتها
$targets = ['X', __DIR__]; // مجلد X والمجلد الرئيسي للمشروع

foreach ($targets as $folder) {
    $path = is_dir($folder) ? realpath($folder) : $folder;
    if ($path) {
        fixPermissions($path);
    }
}

echo "✅ تم تصحيح جميع صلاحيات الملفات والمجلدات بنجاح.";
?>
