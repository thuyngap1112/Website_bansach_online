<?php 
session_start();
$conn = mysqli_connect("localhost","root","","bansach");
if (isset($_GET['username']))
{
	$username = $_GET['username'];
	$password = $_GET['password'];
	$phone = $_GET['phone'];
	$email = $_GET['email'];
	$anhdaidien = $_GET['anhdaidien'];
	$sql = "INSERT INTO user(username,password,level,phone,email,anhdaidien) VALUES('$username','$password','','$phone','$email','$anhdaidien')";
	$ketqua = mysqli_query($conn,$sql);
	header('location:dsuser.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm Danh sách người dùng</title>
	<link rel="stylesheet" href="../../CSS/admin/dsdanhmuc.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-container">

	  <div class="container-fluid">
			<h1>Thêm Người dùng</h1>
			<form action="themuser.php" method="GET">
				Tên Đăng nhập: <input type="text" name="username"><br><br>
				Mật khẩu: <input type="password" name="password" placeholder="Nhập mật khẩu"><br><br>
				Số điện thoại: <input type="text" name="phone"><br><br>
				Email: <input type="text" name="email" placeholder="Nhập email"><br><br>
				Ảnh đại diện: <input type="file" name="anhdaidien"><br><br>
				<input type="submit" value="Thêm Người dùng">
			</form>
	  </div>
	</div>
</body>
</html>