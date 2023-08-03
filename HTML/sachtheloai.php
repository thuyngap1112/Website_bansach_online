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
								$idtheloai = $_GET['idtheloai'];
								$conn = mysqli_connect("localhost", "root", "", "bansach");
								$sql = "SELECT count('id') FROM books WHERE idtheloai=$idtheloai";
								$ketqua = mysqli_query($conn, $sql);
								$limit = 10;
								$row = mysqli_fetch_array($ketqua);
								$rec_count = $row[0];
								if (isset($_GET['page'])) {
									$page = $_GET['page'];
									$offset = $limit * $page;
								} else {
									$page = 0;
									$offset = 0;
								}
								$sql = "SELECT * FROM books WHERE idtheloai=$idtheloai limit " . $offset . "," . $limit . "";
								$retval = mysqli_query($conn, $sql);
								$row_count = mysqli_num_rows($retval);
								while ($row = mysqli_fetch_array($retval)) {
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
								<?php } ?>
							</div>
							<?php if (!empty($rec_count)) { ?>
								<?php if ($page > 0 && $row_count == $limit) {
									$last = $page + 1;
									$prev = $page - 1;
								?>
									<a href="<?php echo $_SERVER['PHP_SELF'] ?>?idtheloai=<?php echo $idtheloai; ?>&page=<?php echo $prev; ?>">Prev</a> |
									<a href="<?php echo $_SERVER['PHP_SELF'] ?>?idtheloai=<?php echo $idtheloai; ?>&page=<?php echo $last; ?>">Next</a>
								<?php } elseif ($page == 0) {
									$next_page = $page + 1;
								?>
									<a href="<?php echo $_SERVER['PHP_SELF'] ?>?idtheloai=<?php echo $idtheloai; ?>&page=<?php echo $next_page; ?>">Next</a>
								<?php } else {
									$last = $page - 1;
								?>
									<a href="<?php echo $_SERVER['PHP_SELF'] ?>?idtheloai=<?php echo $idtheloai; ?>&page=<?php echo $last; ?>">Prev</a>
								<?php } ?>
							<?php } else {
								echo "<h3>Chưa có sản phẩm trong thể loại này.</h3>";
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include('footer.php'); ?>
</body>

</html>