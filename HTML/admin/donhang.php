<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách Đơn hàng</title>
	<link rel="stylesheet" href="../../CSS/admin/dsdanhmuc.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-container">

	  <div class="container-fluid">

	    <?php 
			$conn = mysqli_connect("localhost","root","","bansach");
			?>
			<div class="tieude">
				<h1>Danh sách các đơn hàng</h1>
			</div>
			<table border="1px" style="text-align: center;">
				<tr style="background-color: #D8DFEF">
					<th width="40px">STT</th>
					<th width="50px">Mã đơn hàng</th>
					<th>ID KH</th>
					<th width="120px">Tên sách</th>
					<th width="60px">Số lượng</th>
					<th width="90px">Thành tiền</th>
					<th width="200px">Thông tin người nhận</th>
					<th width="150px">Ngày đặt</th>
					<th>Trạng thái</th>
				</tr>
			<?php 
				$i = 1;
				$sql = "SELECT * FROM chitiethd
					INNER JOIN hoadon ON hoadon.idhoadon = chitiethd.idHD
					INNER JOIN books ON books.id = chitiethd.idbooks";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo '<td style="text-align: center;">'.$i++.'</td>';
				echo '<td>'.$row['idHD'].'</td>';
				echo '<td >'.$row['iduser'].'</td>';
				echo '<td>'.$row['tensach'].'</td>';
				echo '<td >'.$row['soluong'].'</td>';
				echo '<td >'.$row['gia'].'</td>';
				echo '<td>';
					echo '<span>'.$row['nguoinhan'].'</span><br>';
					echo '<span>Số điện thoại: 0'.$row['dienthoai'].'</span><br>';
					echo '<span>Email: '.$row['email'].'</span><br>';
					echo '<span>Địa chỉ: '.$row['diachi'].'</span>';
				echo '</td>';
				echo '<td>'.$row['ngay'].'</td>';
				echo "<td style='text-align: center;'>";
					?>
					<form action="<?php echo "xulidonhang.php?id_cthd=$row[id_cthd]"; ?>" method="POST">
					
						<input type="text" name="tinhtrang" value="<?php echo $row['tinhtrangdonhang']; ?>">
						<input type="submit" name="sua" value="Sửa">
					</form>
					<?php
				echo "</td>";
				echo "</tr>";
				}
			?>
			</table>
	  </div>
	</div>
</body>
</html>