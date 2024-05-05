<?php

include 'config.php';
session_start();

$user_id = $_SESSION['id'];

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:login.php');
};

if (!isset($user_id)) {
  header('location:login.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Css/style.css" />
  <link rel="stylesheet" href="../Css/index.css" />
  <link rel="stylesheet" href="../Css/nav_style.css" />
  <!-- Font awesome for icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- Owl carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <title>hiteca - Home page</title>

  <style>
   /* .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* chiều cao cả trang */
   


.centered-image {
    max-width: 100%; /* ảnh không vượt quá kích thước của container */
    max-height: 100%;
    right: 20%;
}


  </style>
</head>

<body>
  <?php
  if (isset($message)) {
    foreach ($message as $message) {
      echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
    }
  }
  ?>
  <!-- Header begin -->
  <header class="header">
    <!-- Navigation -->
    <a href="index.php" class="logo" title="hiteca">
      <img src="../images/Index/navMenu/logo.jpg" alt="">
    </a>
    <nav class="navbar">
      <ul id="menu">
        <li class="menu-item-object-page menu-item">
          <a href="index.php" aria-current="page">Home page</a>
        </li>
        <li class="menu-item-object-page menu-item">
          <a href="aboutus.php">About us</a>
        </li>
        <li class="menu-item-object-page menu-item">
          <a href="menu.php">Menu</a>
          <ul class="sub-menu">
            <li class="menu-item-inner">
              <a href="./Menu/tea.php">Tea</a>
            </li>
            <li class="menu-item-inner">
              <a href="./Menu/MenuCake.php">Cake</a>
            </li>
          </ul>
        </li>
        <li class="menu-item-object-page menu-item">
          <a href="newpromotion.php">New &amp; Promotions</a>
        </li>
        <li class="menu-item-object-page menu-item">
          <a href="contact.php">Contact</a>
        </li>
      </ul>
    </nav>
    <div class="icons">
      <div class="fas fa-search" id="search-btn"></div>
      <a href="cart.php">
        <div class="fas fa-shopping-cart" id="cart-btn"> </div>
      </a>
      <div class="fas fa-user" id="login-btn"></div>
    </div>

    <!-- <form action="" class="search-form">
      <input type="search" id="search-box" placeholder="Search here ..."> 
      <input type="submit" name="timkiem" value="Timkiem"> 
    <label for="search-box" class="fas fa-search"></label> 
    </form>   -->
    



      <form action="search.php" method="GET" class="search-form">
    <input type="search" id="search-box" name="timkiem" placeholder="Search products...">
    <input type="submit" value="Search">
</form>


    <?php
    $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed'); 
    //Lấy thông tin người dùng, nếu có sẽ lưu vào mảng
    if (mysqli_num_rows($select_user) > 0) {
      $fetch_user = mysqli_fetch_assoc($select_user);
    };
    ?>
    <form action="" class="login-form">
      <h4>User Info</h4>
      <p> Email : <span><?php echo $fetch_user['email']; ?></span> </p>  <!-- Hiển thị email -->
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are your sure you want to logout?');" class="delete-btn">Logout</a>
    </form>
  </header>
  <!-- Header end -->

  <!-- Body begin -->
  <div class="centered-image">
    <!-- Đường dẫn đến hình ảnh -->
    
    <img src="../images/Pay/payment.jpg" alt="Centered Image">
    
</div>
  <!-- Body end -->

  <!-- Footer begin -->
  <footer>
    <section class="footer">
      <div class="box-container">
        <div class="box">
          <a href="index.php" class="logo" title="hiteca">
            <img src="../images/Index/navMenu/logo.jpg" alt="">
          </a>
          <p>Make your life sweater!</p>
          <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
          </div>
        </div>
        <div class="box">
          <h3>Contact info</h3>
          <a href="#" class="links">
            <i class="fas fa-phone"></i> 0963589999 </a>
          <a href="#" class="links">
            <i class="fas fa-envelope"></i> hiteca@gmail.com </a>
          <a href="https://goo.gl/maps/zWTFb2aY75sgPy2P7" class="links">
            <i class="fas fa-map-marker-alt"></i> 79 Đ. Hồ Tùng Mậu, Mai Dịch, Cầu Giấy </a>
        </div>
        <div class="box">
          <h3>Quick links</h3>
          <a href="index.php" class="links">
            <i class="fas fa-arrow-right"></i> Home </a>
          <a href="aboutus.php" class="links">
            <i class="fas fa-arrow-right"></i> About us </a>
          <a href="menu.php" class="links">
            <i class="fas fa-arrow-right"></i> Menu </a>
          <a href="newpromotion.php" class="links">
            <i class="fas fa-arrow-right"></i> New &amp Promotions </a>
          <a href="contact.php" class="links">
            <i class="fas fa-arrow-right"></i> Contact </a>
        </div>

      </div>
      <div class="credit"> <span> Team 2 </span> </div>
    </section>
  </footer>
  <!-- Footer end -->

  <!-- Custom JS -->
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- Owl carousel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- Navigation -->
  <script src="../JS/navigation.js"></script>
  <!-- Slider -->
  <script src="../JS/index.js"></script>





</body>

</html>