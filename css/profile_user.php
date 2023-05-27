<!DOCTYPE html>
<html>
<head>
    <title> Profile User</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<style> 
footer {
  color: #333;
  padding: 20px;
  text-align: center;
}

</style>
    <header>
        
<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header('Location: login_form.php');
    exit();
}

$name = $_SESSION['user_name'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$sql = "SELECT * FROM user_form WHERE name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];

    echo "<h1>  My Profile</h1>";
  
    echo "<p><strong> Hello,</strong> $name</p>";

    echo "<p><strong>My Name :</strong> $name</p>";
    echo "<p><strong>My Email :</strong> $email</p>";
   

} else {
    echo "لا يوجد مستخدم بالمعلومات المسجلة.";
}

$conn->close();
?>



    </header>
    <div class="user-info">
            <?php
            echo "<a href='user_page.php'>Logout </a></br>";
            ?>
        </div>
        <div>
    <footer>
    <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?> </p>
    </footer>
</div>
</body>
</html>

