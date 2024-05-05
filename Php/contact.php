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
  <meta id="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Css/style.css" />
  <link rel="stylesheet" href="../Css/contact.css" />
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <!-- Font awesome for icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <title>Contact us</title>

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
<!-- 
    <form action="" class="search-form">
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

  <main>
    <div class="banner">
      <img src="../images/Contact/contactBanner.svg" alt="">
      <div class="name">Contact Us</div>
    </div>
    <section>
      <div class="wrapper">
        <p>
          hiteca luôn mong muốn nhận được những ý kiến ​​đóng góp quý báu từ khách hàng để có cơ hội hoàn thiện sản phẩm và dịch vụ hơn nữa. Những đóng góp của bạn luôn là vô giá đối với chúng tôi.
        </p>
        <form id="form" action="" method="post" class="form">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" class="form-input" id="fullname" placeholder="Họ Và Tên" />
                <span></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="email" class="form-input" id="email" placeholder="Email" />
                <span></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="tel" class="form-input" id="phone" placeholder="Số Điện Thoại" />
                <span></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <select id="select-city" id="city" id="" class="form-input">
                      <option value="-1">Tỉnh</option>
                      <option value="41">Kien Giang</option>
                      <option value="44">Soc Trang</option>
                      <option value="47">Nha Trang</option>
                      <option value="49">Đa Lat</option>
                      <option value="21">Ho Chi Minh</option>
                      <option value="20">Ha Noi</option>
                      <option value="30">Đa Nang</option>
                      <option value="28">Binh Duong</option>
                      <option value="23">Bien Hoa</option>
                      <option value="26">Can Tho</option>
                      <option value="35">Long An</option>
                      <option value="27">Hue</option>
                      <option value="36">My Tho</option>
                      <option value="29">Vung Tau</option>
                      <option value="25">Thanh Hoa</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <h2>Để Lại Ý Kiến</h2>
            <textarea class="form-control" id="feedback_content" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group" id="form-action-wrap">
            <button id="action-send-feedback" type="submit" id="submit" class="btn btn-primary">
              Gửi
            </button>
          </div>
        </form>
      </div>
    </section>
  </main>
  <!-- Footer begin -->
  <footer>
    <section class="footer">
      <div class="box-container">
        <div class="box">
          <a href="index.php" class="logo" title="hiteca">
            <img src="../images/Index/navMenu/logo.jpg" alt="" />
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
            <i class="fas fa-envelope"></i> hiteca@gmail.com
          </a>
          <a href="https://goo.gl/maps/XDPWwX3fv8B8fDVt6" class="links">
            <i class="fas fa-map-marker-alt"></i> 79 Đ. Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội
          </a>
        </div>

        <div class="box">
          <h3>Quick links</h3>
          <a href="#" class="links">
            <i class="fas fa-arrow-right"></i> Home
          </a>
          <a href="#" class="links">
            <i class="fas fa-arrow-right"></i> About us
          </a>
          <a href="#" class="links">
            <i class="fas fa-arrow-right"></i> Menu
          </a>
          <a href="#" class="links">
            <i class="fas fa-arrow-right"></i> New &amp Promotions
          </a>
          <a href="#" class="links">
            <i class="fas fa-arrow-right"></i> Contact
          </a>
        </div>

        
      </div>

      <div class="credit">
        <span> Team 2 </span>
      </div>
    </section>
  </footer>

  <!-- Custom JS -->
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <!-- Navigation -->
  <script src="../JS/navigation.js"></script>
</body>

</html>