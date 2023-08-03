
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="../CSS/header1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

	<header>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "bansach");
		$sql = "SELECT anhdaidien FROM user";
		$ketqua = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($ketqua);
		?>
		<div id="header">
			<div class="top_header">
				<div class="container">
					<div class="left">
						<span><i class="fa fa-phone" aria-hidden="true"></i></span>
						<span class="sp1">(+84) 327 216 383</span>
						<span><i class="fa fa-envelope" aria-hidden="true"></i></span>
						<span class="sp1">nttnga.19it1@vku.udn.vn</span>
					</div>
					<div class="right">
						<ul>
							<li><a href="dangnhap.php">Đăng nhập</a></li>
							<span>|</span>
							<li><a href="dangnhap.php">Đăng kí</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="top1_header">
				<div class="container">
					<div class="row">

						<div class="col col-md-3" style="margin-top: -8px">
							<a href="trangchu.php" class="logo"><img src="../Images/boook.png" style="width: 70px;height: 55px;margin-top: -12px;">
								<span style="padding-left: 10px;">MotSach</span></a>
						</div>

						<div class="col col-md-5">
							<form class="form-inline" action="timkiem.php" method="POST" style="font-size: 15px;">
								<input type="text" name="timkiem" placeholder="Bạn tìm sách gì? Nhập tên sách hoặc tác giả..." id="search" / size="50" style="border-radius: 15px;">
								<input type="submit" value="Tìm Kiếm" style="margin-left: 395px;margin-top: -40px;font-size: 18px; border-radius: 13px;padding:2px;" />
							</form>
						</div>


						<div class="col col-md-4" id="p3">
							<nav class="navbar navbar-expand-sm">
								<ul class="navbar-nav">

									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Giỏ hàng
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-top: -34px">
											<a class="dropdown-item" href="view_cart.php">Giỏ hàng của bạn</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="thongtin_giohang.php">Tình trạng đơn hàng</a>
										</div>
									</li>
									<!-- <li style="font-size: 28px; margin-top: 4px; margin-left: 10px;display: contents; ">
									
								</li> -->
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?php
											if (isset($_SESSION['username'])) {
												echo "<img src='../Images/{$row['anhdaidien']}' style='border-radius: 50%;display: flex; width:50px;height:50px;margin-top: -13px;' />";
												echo "<p style='font-size: 20px;margin-left: 55px;width: 110px;margin-top: -42px;'>" . $_SESSION['username'] . "</p>";
											} else {
												echo "<i class='fa fa-user-o' style='display: flex;'><p style='font-size: 20px;margin-left: 9px;'>Tài khoản</p></i>";
											}
											// }
											?>
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-top: -34px">
											<a class="dropdown-item" href="dangxuat.php">Đăng Xuất</a>
										</div>
									</li>


								</ul>
							</nav>
						</div>

					</div>
				</div>
			</div>
		</div>
	</header>
</body>

</html>