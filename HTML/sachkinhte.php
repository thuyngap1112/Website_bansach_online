<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sách Kinh Tế</title>
	<link rel="stylesheet" href="../CSS/content_banchay.css">
	<link rel="stylesheet" href="../CSS/kinhte.css">
	<link rel="stylesheet" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php include('header.php'); ?>
	<div class="content-kinhte">
		<div class="container">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb" style="background-color: white;">
			    <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Sách Kinh Tế</li>
			  </ol>
			</nav>
		</div>
		<div class="container">
			<div class="row">
				<link rel="stylesheet" href="../CSS/contentleft.css">
				<div class="col col-md-3 left">
				<?php include('danhmuc.php'); ?>
					<div class="quangcao">
						<img src="../Images/qcao2.gif" style="height: 230px">
						<img src="../Images/qcao5.gif">
						<img src="../Images/qcao8.gif">
					</div>
				</div>
				<div class="col col-md-9">
					<div class="tieude">
						<h2>Sách Kinh Tế</h2>
					</div>
					<div class="thanhtieude">
						<div class="views">
							<a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-th-list" aria-hidden="true" style="color: black;"></i></a>
						</div>
						<div class="sorts">
							<span>Xem Theo: &nbsp;&nbsp;&nbsp;</span>
							<select>
								<option>Mới trước cũ sau</option>
								<option>Cũ trước mới sau</option>
								<option>Gía thấp đến giá cao</option>
								<option>Gía cao đến giá cao</option>
								<option>Xem nhiều</option>
								<option>Bán chạy nhất</option>
								<option>Ngày xuất bản</option>
							</select>
						</div>
					</div>
					<div class="sanpham">
						<div class="container-fluid">
							<div class="row">
								<?php $conn = mysqli_connect("localhost","root","","bansach");
											$sql = "SELECT count('id') FROM books WHERE idtheloai='24'";
											$ketqua = mysqli_query($conn,$sql);
											$limit = 10;
											$row = mysqli_fetch_array($ketqua);
	         						$rec_count = $row[0];
	         						if( isset($_GET['page'] ) )
							         {
							            $page = $_GET['page'] + 1;
							            $offset = $limit * $page ;
							         }
							         else
							         {
							            $page = 0;
							            $offset = 0;
							         }
						         $sql = "SELECT * FROM books WHERE idtheloai='24' limit ".$offset.",".$limit."";  
						         $retval = mysqli_query($conn, $sql);
											while($row = mysqli_fetch_array($retval)){
								?>
								<div class="col-sm-6 col-md-4">
									<div class="product-grid">
										<div class="image">
											<a href="#">
												<?php echo "<a href=chitietsp.php?id=".$row['id']."><img src='../Images/{$row['image']}'>"; ?>
											</a>
										</div>
										<div class="noidung">
											<?php echo "<a href=chitietsp.php?id=".$row['id']."><p class='title'>".$row['tensach']."</p>";
											 			echo "<p class='author'>".$row['tacgia']."</p>";
											?>
					            <p class="price-sale">
												<?php echo "<span class='final-price'>".number_format($row['gia'], 3)." VNĐ</span>"; 
												?>
											</p>
											<?php 
												echo "<button class='btn' type='button'><a style='color:black;text-decoration: none;' href='addcart.php?item=$row[id]'><i class='fa fa-cart-plus'></i></a></button>";
												 ?>
										</div>
									</div>
								</div>
							<?php } ?>
							
							</div>
							<?php if($page > 0) {
									$last = $page == 1 ? $page - 1 : $page -2;
									?>
									<a href="<?php echo $_SERVER['PHP_SELF']?>?page=<?php echo $last;?>">Prev</a> |
			          		<a href="<?php echo $_SERVER['PHP_SELF']?>?page=<?php echo $page;?>">Next</a>
									<?php }elseif($page == 0) {?>
										<a href="<?php echo $_SERVER['PHP_SELF']?>?page=<?php echo $page;?>">Next</a>
									<?php }else {
												$last = $page -2;
										?>
										<a href="<?php echo $_SERVER['PHP_SELF']?>?page=<?php echo $last;?>">Prev</a>
									<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include('footer.php'); ?>
</body>
</html>