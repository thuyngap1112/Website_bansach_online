<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa Danh mục</title>
	<link rel="stylesheet" href="../../CSS/admin/dsdanhmuc.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-container">

	  <div class="container-fluid">

	    <?php 
			$conn = mysqli_connect("localhost","root","","bansach");
			if (isset($_GET['id'])) {
			 	$sql = "SELECT *FROM danhmuc WHERE id =".$_GET['id'];
			 	$ketqua = mysqli_query($conn, $sql);
			 	$row = mysqli_fetch_assoc($ketqua);	
			 } 
			 if (isset($_POST['capnhat'])){
			 	$tendanhmuc = $_POST['tendanhmuc'];
			 	$sqli = "UPDATE danhmuc SET tendanhmuc='$tendanhmuc' WHERE id = ".$_POST['id']."";
			 	$ketqua1 = mysqli_query($conn,$sqli);
			 	header('location:dsdanhmuc.php');
			 }
			?>
			<div class="tieude">
				<h1>Cập nhật danh mục</h1>
			</div>
			<form action="suadmuc.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $row['id'];?>">
				<input type="text" name="tendanhmuc" value="<?php echo $row['tendanhmuc']; ?>"><br><br>
				<input type="submit" value="Cập Nhật" name="capnhat">
			</form>
	  </div>
	</div>
</body>
</html>