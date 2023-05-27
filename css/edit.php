<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eidt</title>
    <style> 
footer {
  color: #333;
  padding: 20px;
  text-align: center;
}
</style>
</head>
<body>
<header>
      <h1>Eidt Page</h1>
   </header>
<div class="form-container">

   <?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = 'user_db';
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM user_form WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    

        echo " name: " . $name . "<br>";
        echo "email : " . $email . "<br>";
        echo "<form action='update.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "New Name : <input type='text' name='new_name'><br>";
        echo "New Email  : <input type='text' name='new_email'><br>";
        echo "<input type='submit' value='Update '></br>";
        echo "<a href='login_form.php'>Logout </a></br>";

        echo "</form>";
    } else {
        echo "لا يوجد مستخدم بالمعرف المحدد.";
    }
} else {
    echo "معرف المستخدم غير موجود.";
}

$conn->close();
?> 
<div>
    <footer>
    <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?> </p>
    </footer>
</div>
</body>
</html>


