<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cập nhật lại thông tin người dùng</title>
	<link rel="stylesheet" href="../../CSS/admin/dsdanhmuc.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-container">

	  <div class="container-fluid">

	    <?php 
			$conn = mysqli_connect("localhost","root","","bansach");
			if (isset($_GET['id'])){
			 	$sql = "SELECT *FROM user WHERE id =".$_GET['id'];
			 	$ketqua = mysqli_query($conn, $sql);
			 	$row1 = mysqli_fetch_assoc($ketqua);
			} 
			 if (isset($_POST['capnhat'])){
			 	$username = $_POST['username'];
			 	$password = $_POST['password'];
			 	$phone = $_POST['phone'];
			 	$email = $_POST['email'];
			 	$anhdaidien = $_POST['anhdaidien'];
			 	$sqli = "UPDATE user SET username ='$username', password ='$password', phone ='$phone',email = '$email',anhdaidien = '$anhdaidien' WHERE id = ".$_POST['id']."";
			 	$ketqua1 = mysqli_query($conn,$sqli);
			 	header('location:dsuser.php');
			 }
			?>
			<div class="tieude">
				<h1>Cập nhật thông tin người dùng</h1>
			</div>
			<form action="suauser.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $row1['id'];?>">
				Tên Đăng nhập: <input type="text" name="username" value="<?php echo $row1['username']; ?>" required=""><br><br>
				Mật khẩu: <input type="password" name="password" placeholder="Nhập mật khẩu" value="<?php echo $row1['password']; ?>" required=""><br><br>
				Số điện thoại: <input type="text" name="phone" value="<?php echo $row1['phone']; ?>" required=""><br><br>
				Email: <input type="text" name="email" placeholder="Nhập email" value="<?php echo $row1['email']; ?>" required=""	><br><br>
				Ảnh đại diện: <input type="file" name="anhdaidien" value ="<?php echo $row1['anhdaidien']; ?>"><br><br>
				<input type="submit" value="Cập Nhật" name="capnhat">
			</form>
	  </div>
	</div>
</body>
</html>