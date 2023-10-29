<?php
// تضمين ملف اتصال قاعدة البيانات
require_once("dbConnection.php");

// الحصول على معرف السجل من معلمة URL
$id = $_GET['id'];

// استعلام قاعدة البيانات لاختيار البيانات المرتبطة بمعرف معين
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) == 1) {
    $userData = mysqli_fetch_assoc($result);
    $name = $userData['name'];
    $age = $userData['age'];
    $email = $userData['email'];
} else {
    echo "لم يتم العثور على السجل المحدد.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>تحرير البيانات</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2>تحرير البيانات</h2>
    <p>
        <a href="index.php">الرئيسية</a>
    </p>
    
    <form name="edit" method="post" action="editAction.php">
        <table border="0">
            <tr> 
                <td><label for="name">الاسم:</label></td>
                <td><input type="text" name="name" id="name" value="<?php echo $name; ?>" required></td>
            </tr>
            <tr> 
                <td><label for="age">العمر:</label></td>
                <td><input type="number" name="age" id="age" value="<?php echo $age; ?>" required></td>
            </tr>
            <tr> 
                <td><label for="email">البريد الإلكتروني:</label></td>
                <td><input type="email" name="email" id="email" value="<?php echo $email; ?>" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="تحديث"></td>
            </tr>
        </table>
    </form>
</body>
</html>
