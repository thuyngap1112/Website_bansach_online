<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách người dùng</title>
	<link rel="stylesheet" href="../../CSS/admin/dsdanhmuc.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-container">

	  <div class="container-fluid">

	    <?php 
			$conn = mysqli_connect("localhost","root","","bansach");
			?>
			<div class="tieude">
				<h1>Danh sách người dùng</h1>
				<button type=""><a href="themuser.php">Thêm người dùng</a></button>
			</div>
			<table border="1px">
				<tr style="text-align: center; background-color: #D8DFEF">
					<th width="50px">STT</th>
					<th width="150px">Tên người dùng</th>
					<th width="100px">Mật khẩu</th>
					<th width="150px">Số điện thoại</th>
					<th width="240px">Email</th>
					<th width="200px">Ảnh đại diện</th>
					<th width="100px">Xoá || Sửa</th>
				</tr>
			<?php 
			$i = 1;
			$sql = "SELECT * FROM user";
			$ketqua = mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_assoc($ketqua)){ 
				echo "<tr>";
				echo '<td style="text-align: center;">'.$i++.'</td>';
				echo '<td>'.$row['username'].'</td>';
				echo '<td>'.$row['password'].'</td>';
				echo '<td>'.$row['phone'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				echo "<td style='text-align:center;'><img src='../../Images/{$row['anhdaidien']}' style = 'width:50px;height:50px;margin:10px;'></td>";
				echo "<td style='text-align: center;'><a href='xoauser.php?id=".$row['id']."'><i class='far fa-trash-alt' style='font-size:25px;margin-right: 10px;color: black;'></i></a>||<a href='suauser.php?id=".$row['id']."'><i class='fas fa-pen-alt'php style='font-size:25px;margin-left: 10px;color: black;'></i></a></td>";
				echo "</tr>";
			}
			?>
			</table>
	  </div>
	</div>
</body>
</html>