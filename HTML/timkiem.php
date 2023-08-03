<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="../CSS/content_sachtheloai.css">
	<link rel="stylesheet" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
	<?php include('header.php'); ?>
	<div class="content-banchay" style="padding-top: 20px;">
		<div class="container">
		</div>
		<div class="container">
			<div class="row">
				<link rel="stylesheet" href="../CSS/contentleft.css">
				<div class="col col-md-4 left">
					<?php include('danhmuc.php'); ?>
					<div class="quangcao">
						<img src="../Images/qcao3.gif" style="height: 230px">
						<img src="../Images/qcao9.gif">
						<img src="../Images/qcao1.gif">
					</div>
				</div>
				<div class="col col-md-8">
					<div class="sanpham">
						<div class="container-fluid">
							<div class="row">
								<?php
								$tk = '';
								if (isset($_POST['timkiem'])) {
									$key = $_POST['timkiem'];
									$sql = "SELECT * FROM books WHERE (LOWER (tensach) LIKE '%$key%' OR LOWER (tacgia) LIKE '%$key%' OR LOWER (congtyphathanh) LIKE '%$key%' OR LOWER (nsx) LIKE '%$key%')";
									$ketqua = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_assoc($ketqua)) {
								?>
									<div class="col-sm-6 col-md-4">
										<div class="product-grid">
											<div class="image">
												<a href="#">
													<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><img src=" . $row['image'] . ">"; ?>
												</a>
											</div>
											<div class="noidung">
												<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><p class='title' style='color: black;'>" . $row['tensach'] . "</p></a>";
												echo "<p class='author'>" . $row['tacgia'] . "</p></a>";
												?>
												<p class="price-sale">
													<?php echo "<span class='final-price'>" . number_format($row['gia'], 3) . " VNĐ</span>";
													?>
												</p>
												<?php
												echo "<button class='btn' type='button'><a style='color:black;text-decoration: none;' href='cart1.php?id=$row[id]'><i class='fa fa-cart-plus'></i></a></button>";

												?>
											</div>
										</div>
									</div>
								<?php } 
								}?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include('footer.php'); ?>
</body>

</html>