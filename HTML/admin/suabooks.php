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
			 	$sql = "SELECT *FROM books WHERE id =".$_GET['id'];
			 	$ketqua = mysqli_query($conn, $sql);
			 	$row = mysqli_fetch_assoc($ketqua);	
			 } 
			 if (isset($_POST['capnhat'])){
			 	$tensach = $_POST['tensach'];$tacgia = $_POST['tacgia'];
			 	$gia = $_POST['gia'];$image = $_POST['image'];
			 	$dichgia = $_POST['dichgia'];$noidung = $_POST['noidung'];
			 	$sqli = "UPDATE danhmuc SET tendanhmuc='$tensach', tacgia='$tacgia', gia='$gia', image='$image', dichgia='$dichgia', gioithieusp='$noidung' WHERE id = ".$_POST['id']."";
			 	$ketqua1 = mysqli_query($conn,$sqli);
			 	header('location:dsbooks.php');
			 }
			?>
			<div class="tieude">
				<h1>Thay đổi thông tin sản phẩm</h1>
			</div>
			<form action="suabooks.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $row['id'];?>">
				Tên sách:
				<input type="text" name="tensach" value="<?php echo $row['tensach']; ?>"><br><br>
				Tác giả: <input type="text" name="tacgia" value="<?php echo $row['tacgia']; ?>"><br><br>
				Thể loại: 
				<select name="idtheloai">
				<?php
				$sql = "SELECT * FROM theloai";
				$ketqua = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_assoc($ketqua)) {
					$selected ='';
					if($row['id']==$row1['idtheloai']) $selected = " selected";
					echo '<option value="'.$row['id'].'" '.$selected.' name="idtheloai">'.$row['tentheloai'].'</option>';
				}
				?>
				</select><br><br>
				Giá: <input type="text" name="gia" value="<?php echo $row['gia']; ?>"><br><br>
				Ảnh Sách: <input type="file" name="image" value="" value="<?php echo $row['image']; ?>"><br><br>
				Dịch giả: <input type="text" name="dichgia" value="<?php echo $row['dichgia']; ?>"><br><br>
				Nội dung Sách:
				<textarea name="noidung" value="<?php echo $row['gioithieusp']; ?>"></textarea>
				<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
        <script>
                CKEDITOR.replace('noidung');
        </script><br><br>
				<input type="submit" value="Cập Nhật" name="capnhat">
			</form>
	  </div>
	</div>
</body>
</html>