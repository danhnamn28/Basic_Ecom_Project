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
  <link rel="stylesheet" href="../Css/aboutus.css">
  <link rel="stylesheet" href="../Css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <title>ABOUT US</title>

</head>

<body>
  <!-- Header begin -->
  <header class="header">
    <!-- Navigation -->
    <!-- Trang chu -->
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
			<a href="cart.php"> <div class="fas fa-shopping-cart" id="cart-btn" > </div> </a>
      <div class="fas fa-user" id="login-btn"></div>
    </div>
    <form action="" class="search-form">
      <input type="search" id="search-box" placeholder="Search here ...">
      <label for="search-box" class="fas fa-search"></label>
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
  <!-- Header end -->

  <!-- Body begin -->
  <main>
    <!-- Banner -->
    <div class="slide">
      <div class="slide-left">
        <div class="name">ABOUT US</div>
        <h1>HÃY TẬN HƯỞNG <br>
          THEO CÁCH CỦA BẠN</h1>
      </div>
      <div class="slide-right">
        <img src="../images/AboutUs/Picture3.jpg" alt="img">
      </div>
    </div>

    <!-- Learn about our story -->
    <section class="section-slide">
      <div class="wrapper">
        <div class="section-content left">
          <img id="img1" src="../images/AboutUs/contentimg5.jpg" alt="">
        </div>
        <div class="section-content mid">
          <h1>LEARN ABOUT <br>OUR STORY___ </h1>
          <p>hiteca sẽ là nơi mọi người xích lại gần nhau, đề cao giá trị kết nối con người và sẻ chia thân tình bên gia đình và người thân. hiteca  sử dụng nguyên liệu tươi 100% không đông lạnh kết hợp với hương vị sốt gia truyền, thơm ngon, đã tạo nên sự khác biệt so với các thương hiệu khác. Chúng tôi luôn không ngừng nỗ lực đem lại niềm vui đến khách hàng với dịch vụ nhanh chóng, dễ dàng và đồ ăn ngon, giá hợp lý cùng tiêu chuẩn cao về an toàn và chất lượng.</p>
          <div class="sign">
            <img src="../images/AboutUs/sign1.png" alt="">
          </div>
        </div>
        <div class="section-content right">
          <img id="img3" src="../images/AboutUs/contentimg6.jpg" alt="">
        </div>
      </div>
    </section>

    <!-- Core value -->
    <section class="section-item">
      <div class="wrapper">
        <h1>hiteca</h1>
        <ul>
          <li>
            <h1>CHẤT LƯỢNG TỐT</h1>
            <div class="rounded-image">
              <img src="../images/AboutUs/icon1.png" alt="img">
            </div>
            <p>hiteca là một trong những cửa hàng thức ăn nhanh với sự đa dạng về đồ ăn và rất hợp vệ sinh nên được khách hàng tới ăn. Ở đây cũng có món gà rán, khoai tây chiên, cơm gà. Ngoài món kem ra thì hiteca còn có thêm món ăn nữa đó chính là mỳ Ý, món mỳ Ý của cửa hàng là một trong những điều đặc biệt khi khách hàng ghé thăm.
            </p>
          </li>
          <li>
            <h1>DỊCH VỤ TUYỆT VỜI</h1>
            <div class="rounded-image">
              <img src="../images/AboutUs/icon2.png" alt="img">
            </div>
            <p>hiteca không đơn thuần phục vụ những món thức ăn nhanh chất lượng theo quy trình được kiểm duyệt nghiêm khắc, mà còn mang đến cho mọi người không gian ấm áp, sang trọng để ai cũng được thưởng thức ẩm thực vui vẻ, thoải mái nhất bên gia đình và bè bạn. Từ những nền tảng này</p>
          </li>
          <li>
            <h1>TẦM NHÌN</h1>
            <div class="rounded-image">
              <img src="../images/AboutUs/icon3.png" alt="img">
            </div>
            <p>hiteca luôn ấp ủ trở thành thương hiệu thức ăn nhanh mang đến những món ăn ngon với hương vị phù hợp cho người Việt bên cạnh mục tiêu tạo ra một địa điểm ẩm thực góp phần gắn kết gia đình Việt qua bữa ăn ngon. Và đây cũng chính là tiền đề để hiteca củng cố và phát triển bền vững trong dài hạn.
            </p>
          </li>
        </ul>
      </div>
    </section>

    <!-- Invitation -->
    <div id="invitation">
      <div class="invitation-content">
        <div class="invitation-img">
          <img src="../images/AboutUs/inv1.jpg" alt="" class="invitation_img-img" />
        </div>
        <div class="invitation-text">
          <h1 class="invitation-title">COME HERE!<br>
            <br>
          </h1>
          <p class="text-3"><i class="icon fa-sharp fa-solid fa-clock"></i>Mở Cửa: 8:30 - 22:30</p> <br>
          <p class="text-4">
            <i class="icon fa-solid fa-house"></i>Địa Chỉ: 372-374 Cầu Giấy, Quận Cầu Giấy, Tp. Hà Nội
          </p>
        </div>
      </div>
    </div>

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
          <a href="https://goo.gl/maps/XDPWwX3fv8B8fDVt6" class="links">
            <i class="fas fa-map-marker-alt"></i> 79 Đ. Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội </a>
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
        <!-- <div class="box">
          <h3>Newsletter</h3>
          <p>Subscribe for latest updates</p>
          <input type="email" placeholder="your email" class="email">
          <input type="submit" value="subscribe" class="btn">
          <img src="../images/Index/Footer/payment.png" class="payment-img" alt="">
        </div> -->
      </div>
      <div class="credit"> <span> Team 2 </span> </div>
    </section>

  </footer>
  <!-- Footer end -->

  <!-- Navigation -->
  <script src="../JS/navigation.js"></script>
  <!-- Slider -->
  <script src="../JS/aboutus.js"></script>
</body>

</html>