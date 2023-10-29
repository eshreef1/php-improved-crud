<?php
// تضمين ملف اتصال قاعدة البيانات
require_once("dbConnection.php");

// الحصول على قيمة المعرف من معلمة URL
$id = $_GET['id'];

if (isset($id) && is_numeric($id)) {
    // التحقق من أن المعرف ليس فارغًا وهو قيمة رقمية

    // حذف الصف من جدول قاعدة البيانات
    $result = mysqli_query($mysqli, "DELETE FROM users WHERE id = $id");

    if ($result) {
        // إعادة توجيه إلى الصفحة الرئيسية بعد الحذف الناجح
        header("Location: index.php");
        exit;
    } else {
        echo "حدث خطأ أثناء عملية الحذف.";
    }
} else {
    echo "معرف غير صالح.";
}
?>
