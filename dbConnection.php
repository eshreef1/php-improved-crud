<?php
$databaseHost = 'localhost';
$databaseName = 'test';
$databaseUsername = 'root';
$databasePassword = 'root';

// افحص ما إذا كان هناك خطأ في الاتصال بقاعدة البيانات
$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($mysqli->connect_error) {
    die('فشل الاتصال بقاعدة البيانات: ' . $mysqli->connect_error);
} else {
    // الاتصال بقاعدة البيانات ناجح
    // يمكنك استخدام متغير $mysqli في العمليات اللاحقة مثل إجراء الاستعلامات والتحديثات.
}

// يفضل إغلاق الاتصال بقاعدة البيانات عند الانتهاء من العمليات
 $mysqli->close();
?>
