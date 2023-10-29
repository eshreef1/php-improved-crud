<!DOCTYPE html>
<html>
<head>
    <title>إضافة بيانات</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2>إضافة بيانات</h2>
    <p>
        <a href="index.php">الرئيسية</a>
    </p>

    <form action="addAction.php" method="post" name="add">
        <table width="25%" border="0">
            <tr> 
                <td><label for="name">الاسم:</label></td>
                <td><input type="text" name="name" id="name" required></td>
            </tr>
            <tr> 
                <td><label for="age">العمر:</label></td>
                <td><input type="number" name="age" id="age" required></td>
            </tr>
            <tr> 
                <td><label for="email">البريد الإلكتروني:</label></td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="submit" value="إضافة"></td>
            </tr>
        </table>
    </form>
</body>
</html>
