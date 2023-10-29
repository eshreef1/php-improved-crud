<?php
// تضمين ملف اتصال قاعدة البيانات
require_once("dbConnection.php");

// استعلام لاختيار البيانات بترتيب تنازلي
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>	
	<title>الصفحة الرئيسية</title>
	<style>
		table {
			width: 80%;
			border-collapse: collapse;
			margin: 20px auto;
		}
		table, th, td {
			border: 1px solid #000;
		}
		th, td {
			padding: 8px;
			text-align: center;
		}
	</style>
</head>

<body>
	<h2>الصفحة الرئيسية</h2>
	<p>
		<a href="add.php">إضافة بيانات جديدة</a>
	</p>
	<table>
		<tr>
			<th><strong>الاسم</strong></th>
			<th><strong>العمر</strong></th>
			<th><strong>البريد الإلكتروني</strong></th>
			<th><strong>الإجراء</strong></th>
		</tr>
		<?php
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $res['name'] . "</td>";
			echo "<td>" . $res['age'] . "</td>";
			echo "<td>" . $res['email'] . "</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">تحرير</a> | 
			<a href=\"delete.php?id=$res[id]\" onclick=\"return confirm('هل أنت متأكد من رغبتك في الحذف؟')\">حذف</a></td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>
