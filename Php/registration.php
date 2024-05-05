<?php

include 'config.php';

if (isset($_POST['submit'])) {

     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $pass = mysqli_real_escape_string($conn, $_POST['password']);


     $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');

     if (mysqli_num_rows($select) > 0) {
          $message[] = 'user already exist!';
     } else {
          mysqli_query($conn, "INSERT INTO `user`(email, password) VALUES('$email', '$pass')") or die('query failed');
          $message[] = 'registered successfully!';
          header('location:index.php');
     }
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="../Css/registration.css" />
     <link rel="stylesheet" href="../Css/style.css" />

     <title>hiteca - Đăng kí tài khoản</title>
</head>

<body>
     <?php
     if (isset($message)) {
          foreach ($message as $message) {
               echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
          }
     }
     ?>
     <div class="wrapper-container">
          <div class="container">
               <div class="title">Đăng kí tài khoản</div>
               <div class="content">
                    <form action="#" method="post">
                         <div class="user-details">

                              <div class="input-box">
                                   <span class="details">Email</span>
                                   <input type="text" name="email" placeholder="Điền email " required>
                              </div>
                              <div class="input-box">
                                   <span class="details">Mật Khẩu</span>
                                   <input type="password" name="password" placeholder="Điền password" required>
                              </div>
                         </div>

                         <div class="button">
                              <button id="myButton" name="submit">Đăng kí</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>



     <script type="text/javascript">
          document.getElementById("myButton").onclick = function() {
               alert("Creat successfully");
               location.href = "index.html";
          };
     </script>

</body>

</html>