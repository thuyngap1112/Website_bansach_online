<?php 
session_start();
$conn = mysqli_connect("localhost","root","","bansach");
if (isset($_GET['tentheloai']))
{
	$sql = "INSERT INTO theloai(tentheloai) VALUES('".$_GET['tentheloai']."')";
	$ketqua = mysqli_query($conn,$sql);
	header('location:dstheloai.php');
}
if (isset($_GET['id'])) {
			 	$sql = "SELECT *FROM theloai WHERE id =".$_GET['id'];
			 	$ketqua = mysqli_query($conn, $sql);
			 	$row1 = mysqli_fetch_assoc($ketqua);	
			 } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm thể loại</title>
	<link rel="stylesheet" href="../../CSS/admin/dsdanhmuc.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-container">

	  <div class="container-fluid">
			<h1>Thêm Thể loại</h1>
			<form action="themtloai.php" method="GET">
				Tên thể loại: <input type="text" name="tentheloai"><br><br>
				<input type="submit" value="Thêm Thể loại">
			</form>
	  </div>
	</div>
</body>
</html>