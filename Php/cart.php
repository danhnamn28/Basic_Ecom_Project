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

	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_image = $_POST['product_image'];
	$product_quantity = $_POST['product_quantity'];

	$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE ten_sp = '$product_name' AND user_id = '$user_id'") or die('query failed');

	if (mysqli_num_rows($select_cart) > 0) {
		$message[] = 'product already added to cart!';
	} else {
		mysqli_query($conn, "INSERT INTO `cart`(user_id, ten_sp, gia_sp, hinh_anh_sp, soluong_sp) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
		$message[] = 'product added to cart!';
	}
};

if (isset($_POST['update_cart'])) {
	$update_quantity = $_POST['cart_quantity'];
	$update_id = $_POST['cart_id'];
	mysqli_query($conn, "UPDATE `cart` SET soluong_sp = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
	$message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
	$remove_id = $_GET['remove'];
	mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
	header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
	mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
	header('location:cart.php');
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="../Css/menu.css">
	<link rel="stylesheet" type="text/css" href="../Css/base.css">
	<link rel="stylesheet" type="text/css" href="../Css/style.css">
	<link rel="stylesheet" type="text/css" href="../Css/cart.css">

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
	<div class="container-cart">
		<div class="box-container-cart">
			<div class="shopping-cart">

				<h1 class="heading">shopping cart</h1>

				<table>
					<thead>
						<th>product</th>
						<th>name</th>
						<th>price</th>
						<th>quantity</th>
						<th>total price</th>
						<th>action</th>
					</thead>
					<tbody>
						<?php
						$cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
						$grand_total = 0;
						if (mysqli_num_rows($cart_query) > 0) {
							while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
						?>
								<tr>
									<td><img src="<?php echo $fetch_cart['hinh_anh_sp']; ?>" height="100" alt=""></td>
									<td><?php echo $fetch_cart['ten_sp']; ?></td>
									<td><?php echo $fetch_cart['gia_sp']; ?> VNĐ</td>
									<td>
										<form action="" method="post">
											<input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
											<input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['soluong_sp']; ?>">
											<input type="submit" name="update_cart" value="update" class="option-btn">
										</form>
									</td>
									<td> <?php echo $sub_total = ($fetch_cart['gia_sp'] * $fetch_cart['soluong_sp']); ?> VNĐ</td>
									<td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
								</tr>
						<?php
								$grand_total += $sub_total;
							}
						} else {
							echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
						}
						?>
						<tr class="table-bottom">
							<td colspan="4"> Total :</td>
							<td><?php echo $grand_total; ?> VNĐ</td>
							<td><a href="cart.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a></td>
						</tr>
					</tbody>
				</table>

				<div class="cart-btn">
					<a href="pay.php" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Pay for cart</a>
				</div>

			</div>

		</div>

	</div>
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

	<!-- Custom JS -->
	<!-- Navigation icons -->
	<script src="../JS/navigation.js"></script>

	<!-- Vertical Menu -->
	<script src="../JS/menu.js"></script>
</body>


</html>