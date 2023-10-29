<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $age = $email = "";

    // Validate and sanitize user input
    $name = sanitizeInput($_POST['name']);
    $age = sanitizeInput($_POST['age']);
    $email = sanitizeInput($_POST['email']);

    // Check for empty fields
    if (empty($name) || empty($age) || empty($email)) {
        echo "<p><font color='red'>Please fill in all fields.</font></p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p><font color='red'>Invalid email format.</font></p>";
    } else {
        // Insert data into database using prepared statement
        $stmt = $mysqli->prepare("INSERT INTO users (name, age, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $name, $age, $email);

        if ($stmt->execute()) {
            // Success message
            echo "<p><font color='green'>Data added successfully!</font></p>";
            echo "<a href='index.php'>View Result</a>";
        } else {
            // Error message
            echo "<p><font color='red'>An error occurred.</font></p>";
        }
        $stmt->close();
    }
}

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
</body>
</html>
