<?php 
session_start(); 
$conn = mysqli_connect("localhost","root","","bansach");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$tensach = $_POST['tensach'];$soluong = $_POST['soluong'];
	$tacgia = $_POST['tacgia']; $image=$_POST['image'];
	$gia = $_POST['gia']; $idtheloai = $_POST['idtheloai'];
	$sql = "INSERT INTO books(tensach, tacgia, idtheloai, soluong, gia, image, congtyphathanh, ngaysx, kichthuoc, dichgia, loaibia, sotrang, nsx, gioithieusp) VALUES('$tensach','$tacgia','$idtheloai','$soluong','$gia','$image','','','','','','','','')";
	$ketqua = mysqli_query($conn,$sql);
	header('location:trangchu.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
</head>
<style>
	.content{
	background-color: #f5f5f5;
	padding-top: 30px;
   padding-bottom: 40px;
}
.content .them{
	background-color: white;
	padding: 20px;
}
</style>
<body>
	<?php include("header.php"); ?>
	<div class="content">
		<div class="container them">
			<h2>Thêm sản phẩm Sách</h2>
			<form action="themsanpham.php" method="POST">
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
				<textarea name="editor1"></textarea>
		                <script>
		                        CKEDITOR.replace( 'editor1' );
		                </script><br><br>
				<input type="submit" value="Thêm">
			</form>
		</div>
		
	</div>
	<?php include("footer.php"); ?>
</body>
</html>