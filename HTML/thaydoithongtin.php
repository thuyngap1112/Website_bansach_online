<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thay đổi thông tin cá nhân</title>
	<link rel="stylesheet" href="../CSS/thaydoithongtin.css">
	<link rel="stylesheet" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php include('header.php'); ?>

	<div class="content-container">

	  <div class="container-fluid">
	  	<?php
	  	  $conn = mysqli_connect('localhost','root','','bansach');
			?>
	    <div class="jumbotron">
	      <h2>Thay đổi thông tin cá nhân</h2>
	      <form action="suathongtin.php" method="POST">
	      	<input type="hidden" name="id">
	      	<label>Tên đăng nhập:</label>
	      	<input type="text" name="username"><br><br>
	      	<label>Số điện thoại:</label>
	      	<input type="text" name="phone"><br><br>
	      	<label>Email:</label>
	      	<input type="text" name="email"><br><br>
	      	<label>Ảnh đại diện:</label>
	      	<input type="file" name="anhdaidien"><br><br>
	      	<button type="submit">Cập nhật</button>
	      </form>
		      
	    </div>

	  </div>
	</div>

	<?php include('footer.php'); ?>
</body>
</html>