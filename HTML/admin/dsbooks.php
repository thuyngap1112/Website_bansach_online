<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách Sản phẩm</title>
	<link rel="stylesheet" href="../../CSS/admin/dsdanhmuc.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-container">

	  <div class="container-fluid">

	    <?php 
			$conn = mysqli_connect("localhost","root","","bansach");
			 $sql= "SELECT * FROM books";
			?>
			<div class="tieude">
				<h1>Danh sách sản phẩm Sách</h1>
				<button><a href="thembooks.php">Thêm Sách</a></button>
			</div>
			<table border="1px">
				<tr style="text-align: center;background-color: #D8DFEF">
					<th width="50px">STT</th>
					<th width="150px">Tên sách</th>
					<th width="100px">Tác giả</th>
					<th width="60px">Số lượng</th>
					<th width="100px">Giá</th>
					<th width="150px">Ảnh</th>
					<th>Dịch giả</th>
					<th width="300px">Nội dung sách</th>
					<th width="100px">Xoá || Sửa</th>
				</tr>
			<?php 
				$i = 1;
				$idtheloai = $_GET['idtheloai'];
				$sql= "SELECT * FROM books WHERE idtheloai=$idtheloai";
				$ketqua = mysqli_query($conn,$sql); 
				while($row=mysqli_fetch_assoc($ketqua)){
				echo "<tr>";
				echo '<td style="text-align: center;">'.$i++.'</td>';
				echo '<td>'.$row['tensach'].'</td>';
				echo '<td >'.$row['tacgia'].'</td>';
				echo '<td >'.$row['amount'].'</td>';
				echo '<td >'.$row['gia'].'</td>';
				echo "<td style='text-align:center;'><img src='../../Images/{$row['image']}' style = 'width:150px;height:150px;'></td>";
				echo '<td>'.$row['dichgia'].'</td>';
				echo '<td>'.$row['gioithieusp'].'</td>';
				echo "<td style='text-align: center;'><a href='xoabooks.php?id=".$row['id']."'><i class='far fa-trash-alt' style='font-size:25px;margin-right: 10px;color: black;'></i></a>||<a href='suabooks.php?id=".$row['id']."'><i class='fas fa-pen-alt'style='font-size:25px;margin-left: 10px;color: black;'></i></a></td>";
				echo "</tr>";
			}
			?>
			</table>
	  </div>
	</div>
</body>
</html>