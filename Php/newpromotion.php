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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News&Promotion</title>
  <link rel="stylesheet" href="../Css/promotion.css">
  <link rel="stylesheet" href="../Css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header class="header">
    <!-- Navigation -->
    <a href="index.php" class="logo" title="hiteca">
      <img src="../images/Index/navMenu/logo.jpg" alt="" />
    </a>
    <nav class="navbar">
      <ul id="menu">
        <li class="menu-item-object-page menu-item">
          <a href="index.php">Home page</a>
        </li>
        <li class="menu-item-object-page menu-item">
          <a href="aboutus.php">About us</a>
        </li>
        <li class="menu-item-object-page menu-item">
          <a href="menu.php" aria-current="page">Menu</a>
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
			<a href="cart.php"> <div class="fas fa-shopping-cart" id="cart-btn" > </div> </a>
      <div class="fas fa-user" id="login-btn"></div>
    </div>

    <!-- <form action="" class="search-form">
      <input type="search" id="search-box" placeholder="Search here ..." />
      <label for="search-box" class="fas fa-search"></label>
    </form> -->

    
    <form action="search.php" method="GET" class="search-form">
    <input type="search" id="search-box" name="timkiem" placeholder="Search products...">
    <input type="submit" value="Search">
</form>

    <?php
    $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select_user) > 0) {
      $fetch_user = mysqli_fetch_assoc($select_user);
    };
    ?>
    <form action="" class="login-form">
      <h4>User Info</h4>
      <p> Email : <span><?php echo $fetch_user['email']; ?></span> </p>
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are your sure you want to logout?');" class="delete-btn">Logout</a>
    </form>
  </header>
  <!--end header-->

  <!-- Banner -->
  <div id="banner">
    <div class="box-left">
      <h2>
        <span>News &</span>
        <br>
        <span>Promotions</span>
      </h2>
      <p>Sư Kiện Sắp Tới</p>
      <a href="./menu.php"><button>Buy now</button></a> 
    </div>
  </div>
  <!-- Banner -->

  <div id="wp-products">
    <h2>FLASH SALE</h2>
    <ul id="list-products">
      <div class="list">
        <div class="item">
          <img src="../images/New_Promotions/blog-1.jpg" alt=""> <!-- Chỉnh file jgp -> webp ,New _ promotion thêm s -->
          <div class="name">Khai trương hiteca - Nhận quà không ít</div> 
          <div class="desc">
            <p>Thời gian diễn ra: 9h ngày 28/02/2024 </p>
          </div>
        </div>
        <div class="item">
          <img src="../images/New_Promotions/blog-2.webp" alt=""> <!-- Chỉnh file jgp -> webp ,New _ promotion thêm s -->
          <div class="name">Flashsale 08/03 năm nay</div>
          <div class="desc">Từ ngày 01/03 đến ngày 08/03/2024</div>
        </div>
        <div class="item">
          <img src="../images/New_Promotions/blog-3.webp" alt=""> <!-- Chỉnh file jgp -> webp ,New _ promotion thêm s, xóa index, thêm Menu -->
          <div class="name">Siêu Tiệc Bất Ngờ Năm Nay</div>
          <div class="desc">Từ ngày 20/2 đến ngày 10/3/2024
          </div>
        </div>
        <div class="item">
          <img src="../images/New_Promotions/Blue.jpg" alt="">
          <div class="name">Ra mắt sản phẩm mới</div>
          <div class="desc">Từ ngày 30/04 đến ngày 15/5/2024<br>
            Suggestion for you🎊</div>
        </div>

      </div>
    </ul>
    <!-- List Page -->
  </div>
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
          <a href="https://goo.gl/maps/XDPWwX3fv8B8fDVt6" class="links">
            <i class="fas fa-map-marker-alt"></i> 79 Đ. Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội
          </a>
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


  <!-- Custom JS -->
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <!-- Navigation -->
  <script src="../JS/navigation.js"></script>

  <!-- See more -->
  <script src="../JS/promotion.js"></script>
</body>

</html>