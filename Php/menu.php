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
if (isset($_POST['add_to_cart'])) {

	$product_name = $_POST['product_ten_sp'];
	$product_price = $_POST['product_gia_sp'];
	$product_image = $_POST['product_hinh_anh_sp'];
	$product_quantity = $_POST['product_soluong_sp'];

	$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE ten_sp = '$product_name' AND user_id = '$user_id'") or die('query failed');

	if (mysqli_num_rows($select_cart) > 0) {
		$message[] = 'product already added to cart!';
	} else {
		mysqli_query($conn, "INSERT INTO `cart` (user_id, ten_sp, hinh_anh_sp, gia_sp, soluong_sp) VALUES('$user_id', '$product_name',
	     '$product_image' , '$product_price', '$product_quantity')") or die('query failed');
		$message[] = 'product added to cart!';
	}
}


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="../Css/menu.css">
	<link rel="stylesheet" type="text/css" href="../Css/base.css">
	<link rel="stylesheet" type="text/css" href="../Css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<!-- Font awesome for icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	 <script src="../JS/getSanPham.js"></script>
</head>

<body>
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
	<!-- End header -->

	<!-- Body begin -->
	<main>
		<section class="vertical-menu">

			<div class="grid__row wrapper">
				<!--menu-->
				<div class="grid__collumn-2">
					<nav class="category">
						<h3 class="category__heading">
							<i class="category__heading-icon fa-solid fa-list"></i>
							LIST
						</h3>
						<ul class="category-list">
							<li class="category-item category-item--active ">
								<a href="menu.php" class="category-item__link">ALL PRODUCT</a>
							</li>
							<li class="category-item ">
								<a href="./Menu/tea.php" class="category-item__link">Tea</a>
							</li>
							<li class="category-item ">
								<a href="./Menu/MenuCake.php" class="category-item__link  ">Cake</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="grid__collumn-10">
					<!--product-->
					<article class="home-product">
						<div class="grid__row">
							<div class="grid__row-2">
								<?php
								$select_product = mysqli_query($conn, "SELECT * FROM `sanpham`") or die('query failed');
								if (mysqli_num_rows($select_product) > 0) {
									while ($fetch_product = mysqli_fetch_assoc($select_product)) {
								?>
											<div class="grid__row__collumn-2-3 product-container">
										<form action="" method="post">


												<div class="home-product-item product">
													<img class="home-product-item__img" src="<?php echo $fetch_product['hinh_anh_sp']; ?>" alt="">
													<h4 class="home-product-item__name"><?php echo $fetch_product['ten_sp']; ?></h4>
													<div class="home-product-item__price">
														<span class="home-product-item__new-price"><?php echo $fetch_product['gia_sp']; ?> VNĐ</span> <br>
														<input type="number" min="1" name="product_soluong_sp" value="1">
														<input type="hidden" name="product_hinh_anh_sp" value="<?php echo $fetch_product['hinh_anh_sp']; ?>">
														<input type="hidden" name="product_ten_sp" value="<?php echo $fetch_product['ten_sp']; ?>">
														<input type="hidden" name="product_gia_sp" value="<?php echo $fetch_product['gia_sp']; ?>">
													</div>
													<input type="submit" value="Add to cart" name="add_to_cart" class="btn">
												</div>
											</form>
										</div>
								<?php
									};
								};
								?>
							</div>
						</div>
					</article>

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
	<!-- Footer end -->
</body>

<!-- Custom JS -->
<!-- Navigation icons -->
<script src="../JS/navigation.js"></script>

<!-- Vertical Menu -->
<script src="../JS/menu.js"></script>

</html>