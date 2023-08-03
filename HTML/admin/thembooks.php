<?php 
session_start();
$conn = mysqli_connect("localhost","root","","bansach");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$tensach = $_POST['tensach'];$soluong = $_POST['soluong'];
	$tacgia = $_POST['tacgia']; $image=$_POST['image'];
	$gia = $_POST['gia']; $gioithieusp = $_POST['gioithieusp'];$idtheloai = $_POST['idtheloai'];
	$sql = "INSERT INTO books(tensach, tacgia, idtheloai, soluong, gia, image, congtyphathanh, ngaysx, kichthuoc, dichgia, loaibia, sotrang, nsx, gioithieusp) VALUES('$tensach','$tacgia','$idtheloai','$soluong','$gia','$image','','','','','','','','$gioithieusp')";
	$ketqua = mysqli_query($conn,$sql);
	header('location:dstheloai.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm Danh sách người dùng</title>
	<link rel="stylesheet" href="../../CSS/admin/dsdanhmuc.css">
	<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-container">

	  <div class="container-fluid">
			<h2>Thêm sản phẩm Sách</h2>
			<form action="thembooks.php" method="POST">
				Tên Sách: <input type="text" name="tensach"> <br><br>
				Tác Giả: <input type="text" name="tacgia"> <br><br>
				Số lượng: <input type="text" name="soluong"> <br><br>
				Đơn giá: <input type="text" name="gia"> <br><br>
				Hình ảnh: <input type="file" name="image"><br><br>
				Thể loại: 
				<select name="idtheloai">
				<?php
				$sql = "SELECT * FROM theloai";
				$ketqua = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_assoc($ketqua)) {
					echo '<option value="'.$row['id'].'">'.$row['tentheloai'].'</option>';
				}
				?>
				</select>
				<br><br>
				Giới thiệu sản phẩm: <br><br>
				<textarea name="gioithieusp"></textarea>
		                <script>
		                        CKEDITOR.replace( 'gioithieusp' );
		                </script><br><br>
				<input type="submit" value="Thêm">
			</form>
	  </div>
	</div>
</body>
</html>