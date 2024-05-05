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
  <main>
    <!-- Slider -->
    <div class="owl-carousel owl-theme">
      <div class="slide slide-1">
        <div class="slide-content">
          <img src="../images/index/Slider/slide1.jpg" alt="">
        </div>
      </div>
      <div class="slide slide-2">
        <div class="slide-content">
          <img src="../images/index/Slider/slide2.jpg" alt="">
        </div>
      </div>
      <div class="slide slide-3">
        <div class="slide-content">
          <img src="../images/index/Slider/slide3.jpg" alt="">
        </div>
      </div>
      <div class="slide slide-4">
        <img src="../images/index/Slider/slide4.jpg" alt="">
        <div class="slide-content"></div>
      </div>
    </div>
    <!-- Our features -->
    <section class="features">
      <div class="wrapper">

        <h1 class="heading">Our Features
        </h1>
        <div class="box-container">
          <div class="box">
            <img src="../images/Index/How to order/under30mins.png" alt="Shipping under 30mins">
            <h3>Giao Hàng Nhanh</h3>
            <p>Bạn sẽ nhận được hàng chỉ dưới 30 phút </p>
          </div>
          <div class="box">
            <img src="../images/Index/How to order/free-shipping.png" alt="free ship">
            <h3>Miễn Phí giao Hàng</h3>
            <p> Chúng tôi sẽ miễn phí phí vận chuyển cho những đơn hàng dưới 2Km hoặc giá trị lớn hơn 150.000 (không bao gồm voucher)</p>
          </div>
          <div class="box">
            <img src="../images/Index/How to order/flexible-payment.png" alt="Flexible payments">
            <h3>Thanh Toán Dễ Dàng</h3>
            <p> Chúng tôi chấp nhận tất cả các hình thức thanh toán:Credit card, visa card, e-wallet, cash. Thêm nữa, chúng tôi hỗ trợ thanh toán khi nhận hàng. </p>
          </div>
        </div>
    </section>
    <!-- About us -->
    <section class="about">
      <div class="wrapper">
        <h1 class="heading">
          About Us
        </h1>
        <div class="row">
          <div class="video-container">
            <div class="video-container">
              <video src="../images/index/Video/About_video.mp4" loop autoplay muted></video>
            </div>
          </div>
          <div class="content">
            <h3>Why choose us?</h3>
            <p>Thức uống cực đỉnh dành cho những ai thích ngọt ngào hoặc muốn thưởng thức sự kết hợp độc đáo giữa tráng miệng và đồ uống. Hơn thế nữa, không gian quán cực kỳ rộng rãi mà sang trọng thích hợp cho bạn ngồi làm việc, nói chuyện bạn bè...</p>
            <a href="./aboutus.php" class="btn">Đọc Thêm</a>
          </div>
        </div>

      </div>
    </section>
    <!-- New & Promotion -->
    <section class="blogs" id="blogs">
      <div class="wrapper">

        <h1 class="heading"> New &amp Promotions
        </h1>
        <div class="box-container">
          <div class="box">
            <img src="../images/Index/New_promotion/blog-1.jpg" alt="">
            <div class="content">
              <div class="icons">
                <a href="#">
                  <i class="fas fa-calendar"></i> 15/04/2024</a>
              </div>
              <h3>Khai trương hiteca - Nhận quà không ít</h3>
              <p>Thời gian diễn ra: 9h ngày 15/04/2023 <br> Giới thiệu trang bán đồ ăn nhanh hiteca với khách hàng. <br> 79 Đ. Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội
              </p>
              <a href="#" class="btn">Đọc Thêm</a>
            </div>
          </div>
          <div class="box">
          <img src="../images/Index/New_promotion/blog-3.webp" alt="">
            <div class="content">
              <div class="icons">
                <a href="#">
                  <i class="fas fa-calendar"></i> 19/04/2024</a>
              </div>
              <h3>Flashsale 19/04 - 20/04 năm nay</h3>
             
              <p> Từ ngày 19/04 đến ngày 20/04/2024 <br> Đối tượng khách hàng: Tất cả khách hàng trên cả nước. <br> Các sản phẩm áp dụng chương trình: Tất cả các sản phẩm mà hiteca đang bán. <br> Trong khoảng từ 20/04 đến 25/04 với ngập tràn ưu đãi cho bạn tha hồ sử dụng.<br>
                Tại sự kiện 20/04 - Siêu đại tiệc, hiteca sẽ mang đến hàng loạt ưu đãi và quà tặng hấp dẫn nhất, bao gồm: Siêu deal chỉ 1 đồng, 1.000 đồng, voucher giảm giá đến 50%...

              </p>
              <a href="#" class="btn">Đọc Thêm</a>
            </div>
          </div>
          <div class="box">
           
            <img src="../images/Index/New_promotion/blog-2.webp" alt="">
            <div class="content">
              <div class="icons">
                <a href="#">
                  <i class="fas fa-calendar"></i> 30/04/2024 </a>
              </div>
              <h3>Siêu Tiệc Bất Ngờ Năm Nay
              </h3>
              <p>Từ ngày 30/04 đến ngày 01/05/2023, SALE mạnh nhất. <br> Các sản phẩm áp dụng chương trình: Tất cả các sản phẩm mà hiteca đang bán.
                Thông tin giảm giá: trong khoảng từ 30/04 đến 01/05 với ngập tràn ưu đãi cho bạn tha hồ sử dụng <br>
              </p>
            
              <a href="#" class="btn">Đọc Thêm</a>
            </div>
          </div>
        </div>
        <div class="more">
          <a href="./newpromotion.php" class="btn-more">Xem Tất Cả</a>
        </div>
      </div>
      </div>

    </section>
  </main>
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