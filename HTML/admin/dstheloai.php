<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách thể loại</title>
	<link rel="stylesheet" href="../../CSS/admin/dsdanhmuc.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-container">

	  <div class="container-fluid">

	    <?php 
			$conn = mysqli_connect("localhost","root","","bansach");
			?>
			<div class="tieude">
				<h1>Thể loại</h1>
				<button type=""><a href="themtloai.php">Thêm Thể loại</a></button>
			</div>
			<table border="1px">
				<tr style="text-align: center;background-color: #D8DFEF">
					<th width="50px">STT</th>
					<th width="300px">Tên thể loại</th>
					<th width="100px">Xoá || Sửa</th>
				</tr>
			<?php 
			$i = 1;
			$sql = "SELECT * FROM theloai";
			$ketqua = mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_assoc($ketqua)){ 
				echo "<tr>";
				echo '<td style="text-align: center;">'.$i++.'</td>';
				echo '<td><a href="dsbooks.php?idtheloai='.$row['id'].'" style="color:black;text-decoration: none;">'.$row['tentheloai'].'</a></td>';
				echo "<td style='text-align: center;'><a href='xoatloai.php?id=".$row['id']."'><i class='far fa-trash-alt' style='font-size:25px;margin-right: 10px;color: black;'></i></a>||<a href='suatloai.php?id=".$row['id']."'><i class='fas fa-pen-alt' style='font-size:25px;margin-left: 10px;color: black;'></i></a></td>";
				echo "</tr>";
			}
			?>
			</table>
	  </div>
	</div>
</body>
</html>