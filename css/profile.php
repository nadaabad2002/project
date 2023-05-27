<!DOCTYPE html>
<html>
<head>
    <title>الملف الشخصي</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style> 
footer {
  color: #333;
  padding: 20px;
  text-align: center;
}

</style>
<body>

    <header>
        
<?php
session_start();

// التحقق مما إذا كان المستخدم مسجل الدخول
if (!isset($_SESSION['admin_name'])) {
    header('Location: login_form.php');
    exit();
}

// احصل على اسم المستخدم المسجل
$name = $_SESSION['admin_name'];

// يمكنك استخدام هذه المتغيرات لاستعراض المزيد من معلومات المستخدم إذا كانت مخزنة في قاعدة البيانات

// معلومات اتصال قاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استعلام SQL لاسترداد معلومات المستخدم
$sql = "SELECT * FROM user_form WHERE name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض بيانات المستخدم
    $row = $result->fetch_assoc();
    $email = $row['email'];

    echo "<h1>  My Profile</h1>";
  
    echo "<p><strong> Hello,</strong> $name</p>";

    echo "<p><strong>My Name :</strong> $name</p>";
    echo "<p><strong>My Email :</strong> $email</p>";

} else {
    echo "لا يوجد مستخدم بالمعلومات المسجلة.";
}

// إغلاق اتصال قاعدة البيانات
$conn->close();
?>



    </header>
    <div class="user-info">
            <?php
            echo "<a href='admin_page.php'>Logout </a></br>";
            ?>
        </div>
        <div>
    <footer>
    <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?> </p>
    </footer>
</div>
</body>
</html>

