<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng xuất</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php session_start();
	unset($_SESSION['username']);
	header('location:trangchu.php');
	?>
</body>
</html>
<?php
	if (isset($_SESSION['username'])) {
		echo "<img src='../Images/{$row['anhdaidien']}' style='border-radius: 50%;display: flex; width:60px;height:60px;margin-top: -11px;' />";
		echo "<p style='font-size: 20px;margin-left: 7px;width: 110px;margin-top: -12px;'>".$_SESSION['username']."</p>";
	}else{
		echo "<i class='fa fa-user-o' style='display: flex;'><p style='font-size: 20px;margin-left: 9px;'>Tài khoản</p></i>";
	}
// }
?>