
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../../CSS/admin_style.css">
	<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<header style="position: fixed;width: 1366px;">
		<nav class="navbar navbar-dark bg-dark justify-content-between" id="thanhtieude">
		  <p class="navbar-brand" href="#">Xin chào 
		  	<?php if ($_SESSION['level'] == 1) { 
		  	echo "<span style='color: RED;'>".$_SESSION['username']."<span>";
		   ?>
		  </p>
		  
		  <form class="form-inline">
				<i class="fa fa-home"></i>
				<a href="../trangchu.php" style="margin-right: 20px;" class="thea">Trang chủ</a>
				<i class="fas fa-sign-out-alt"></i>
				<a href="../dangxuat.php" style="margin-right:30px;" class="thea">Đăng xuất</a>
		  </form>
		</nav>

	</header><!-- /header -->
	<div class="sidebar-container" style="margin-top: 50px;">
	  <div class="sidebar-logo" style="font-family: cursive;">
	    MotSach
	  </div>
	  <ul class="sidebar-navigation">
	    <li class="header">Menu</li>
	    <li>
	      <a href="dstheloai.php">
	        <i class="fa fa-list-alt"></i> Thể loại
	      </a>
	    </li>
	    <li>
	      <a href="dsuser.php">
	        <i class="fa fa-list"></i> Danh sách người dùng
	      </a>
	    </li>
	    <li>
	      <a href="donhang.php">
	        <i class="fa fa-first-order"></i></i> Đơn hàng
	      </a>
	    </li>
	    <li>
	      <a href="binhluan.php">
	        <i class="fa fa-tachometer" aria-hidden="true"></i> Quản lí Bình luận
	      </a>
	    </li>
	  </ul>
	</div>
<?php }
else{
	header("location:../trangchu.php");
} ?>
</body>
</html>