<?php
// تضمين ملف اتصال قاعدة البيانات
require_once("dbConnection.php");

if (isset($_POST['update'])) {
    // تنظيف البيانات المدخلة
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $age = mysqli_real_escape_string($mysqli, $_POST['age']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);    
    
    // التحقق من البيانات الفارغة
    if (empty($name) || empty($age) || empty($email)) {
        $errors = array();
        if (empty($name)) {
            $errors[] = "حقل الاسم فارغ.";
        }
        if (empty($age)) {
            $errors[] = "حقل العمر فارغ.";
        }
        if (empty($email)) {
            $errors[] = "حقل البريد الإلكتروني فارغ.";
        }

        // عرض رسائل الخطأ
        foreach ($errors as $error) {
            echo "<p><font color='red'>$error</font></p>";
        }
    } else {
        // تحديث البيانات في قاعدة البيانات
        $result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email' WHERE `id` = $id");
        
        if ($result) {
            // عرض رسالة نجاح
            echo "<p><font color='green'>تم تحديث البيانات بنجاح!</font></p>";
            echo "<a href='index.php'>عرض النتائج</a>";
        } else {
            // عرض رسالة خطأ
            echo "<p><font color='red'>حدث خطأ أثناء تحديث البيانات.</font></p>";
        }
    }
}
?>
