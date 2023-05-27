<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $currentPassword = md5($_POST['current_password']);
   $newPassword = md5($_POST['new_password']);
   $confirmPassword = md5($_POST['confirm_password']);

   if ($newPassword !== $confirmPassword) {
      $error = "The new password and the confirm password do not match.";
   } else {
      // تحقق من صحة كلمة المرور الحالية
      $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$currentPassword'";
      $result = mysqli_query($conn, $select);

      if (mysqli_num_rows($result) > 0) {
         // تحديث كلمة المرور الجديدة في قاعدة البيانات
         $update = "UPDATE user_form SET password = '$newPassword' WHERE email = '$email'";
         $result = mysqli_query($conn, $update);

         if ($result) {
            $success = "Password changed successfully!";
         } else {
            $error = "Failed to change password. Please try again.";
         }
      } else {
         $error = "Incorrect current password.";
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Change Password</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      header {
         padding: 20px;
         display: flex;
         justify-content: center;
         align-items: center;
      }
      footer {
  color: #333;
  padding: 20px;
  text-align: center;
}
   </style>
</head>
<body>
   <header>
      <h1>Change Password</h1>
   </header>

   <div class="form-container">
      <form action="" method="post">
         <?php
         if (isset($error)) {
            echo '<span class="error-msg">' . $error . '</span>';
         } elseif (isset($success)) {
            echo '<span class="success-msg">' . $success . '</span>';
         }
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="current_password" required placeholder="Enter your current password">
         <input type="password" name="new_password" required placeholder="Enter your new password">
         <input type="password" name="confirm_password" required placeholder="Confirm your new password">
         <input type="submit" name="submit" value="Change Password" class="form-btn">
             <a href='login_form.php'>Logout</a>

      </form>
   </div>

   <footer>
    <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?> </p>
    </footer>
</body>
</html>
