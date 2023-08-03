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
			 	$sql = "SELECT *FROM theloai WHERE id =".$_GET['id'];
			 	$ketqua = mysqli_query($conn, $sql);
			 	$row1 = mysqli_fetch_assoc($ketqua);	
			 } 
			if (isset($_POST['capnhat'])){
			 	$tentheloai = $_POST['tentheloai'];
			 	$sqli = "UPDATE theloai SET tentheloai='$tentheloai' WHERE id = ".$_POST['id']."";
			 	$ketqua1 = mysqli_query($conn,$sqli);
			 	header('location:dstheloai.php');
			 }
			?>
			<div class="tieude">
				<h1>Cập nhật thể loại</h1>
			</div>
			<form action="suatloai.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $row1['id'];?>">
				<input type="text" name="tentheloai" value="<?php echo $row1['tentheloai']; ?>">
				<br><br>
						<input type="submit" value="Cập Nhật" name="capnhat">
			</form>
	  </div>
	</div>
</body>
</html>