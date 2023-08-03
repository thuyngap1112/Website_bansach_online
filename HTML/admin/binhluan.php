<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách bình luận</title>
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
			
			<div class="content">
				<div class="tieude"style="text-align: center; margin-bottom: 30px;">
					<h1>Danh sách các bình luận</h1>
				</div>
				<div class="row" style="font-weight: bold;padding-bottom: 20px;text-align: center;background-color: #D8DFEF">
					<div class="col-sm-1">STT</div>
					<div class="col-sm-2">Tên sách</div>
					<div class="col-sm-2">Tên khách hàng</div>
					<div class="col-sm-3">Nội dung bình luận</div>
					<div class="col-sm-2">Ngày bình luận</div>
					<div class="col-sm-2">Hoạt động</div>
				</div>
				<hr>
				<?php 
					$i = 1;
					$sql = "SELECT * FROM binhluan INNER JOIN books ON books.id = binhluan.idbooks";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){
				?>
				<div class="row" style="padding-bottom: 10px;text-align: center;">
					<div class="col-sm-1"><?php echo $i++; ?></div>
					<div class="col-sm-2"><?php echo $row['tensach']; ?></div>
					<div class="col-sm-2"><?php echo $row['username']; ?></div>
					<div class="col-sm-3"><?php echo $row['binhluan']; ?></div>
					<div class="col-sm-2"><?php echo $row['ngaygio']; ?></div>
					<?php echo "<div class='col-sm-2'><a href='xoabinhluan.php?id_binhluan=".$row['id_binhluan']."'><i class='fas fa-trash-alt' style='font-size:35px;color:#E71010;'></i></a></div>"; ?>
				</div>
				<hr>

			<?php } ?>
				
			</div>

	  </div>
	</div>
</body>
</html>