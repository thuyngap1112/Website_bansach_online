<?php 
session_start();
$conn = mysqli_connect("localhost","root","","bansach");
if (isset($_GET['id'])) {
 	$sql = "SELECT *FROM books WHERE id =".$_GET['id'];
 	$ketqua = mysqli_query($conn, $sql);
 	$row1 = mysqli_fetch_assoc($ketqua);
 } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa sản phẩm</title>
	<link rel="stylesheet" type="text/css" href="../CSS/suahanghoa.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
</head>
<body>
	<?php include("header.php"); ?>
	<div class="content">
		<div class="container sua">
			<h1>Sửa Sản Phẩm</h1>
			<form action="suathongtin.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $row1['id'];?>">
				<!-- <form action="suahanghoa.php?id=<?php echo $row1['id'];?>" method="POST"> -->
				Tên Sách: <input type="text" name="tensach" value="<?php echo $row1['tensach']; ?>"> <br><br>
				Số lượng: <input type="text" name="soluong" value="<?php echo $row1['soluong']; ?>"> <br><br>
				Đơn giá: <input type="text" name="dongia" value="<?php echo $row1['gia']; ?>"> <br><br>
				Thể loại: 
				<select name="idtheloai">
				<?php
				$sql = "SELECT * FROM theloai";
				$ketqua = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_assoc($ketqua)) {
					$selected ='';
					if($row['id']==$row1['idtheloai']) $selected = " selected";
					echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['tentheloai'].'</option>';
				}
				?>
				</select>
				<br><br>
				<textarea name="editor1"></textarea>
		            <script>
		                    CKEDITOR.replace( 'editor1' );
		            </script><br><br>
				<input type="submit" value="Sửa">
			</form>
		</div>
		
	</div>
	<?php include("footer.php"); ?>
</body>
</html>