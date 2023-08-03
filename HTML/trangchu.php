	<?php
	session_start();
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Nhà Sách Online</title>
		<link rel="stylesheet" href="../CSS/header1.css">
		<link rel="stylesheet" href="../CSS/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	</head>

	<body>
		<?php include('header.php'); ?>

		<div class="phanthan" style="margin-top: 10px; margin-bottom: 30px;">
			<div class="noidung_1">
				<div class="container">
					<div class="row">

						<link rel="stylesheet" href="../CSS/contentleft.css">
						<div class="col col-md-4">
							<?php include('danhmuc.php'); ?>
						</div>
						<div class="col col-md-8">
							<div id="demo" class="carousel slide" data-ride="carousel">
								<ul class="carousel-indicators">
									<li data-target="#demo" data-slide-to="0" class="active" style="width: 20px"></li>
									<li data-target="#demo" data-slide-to="1" style="width: 20px"></li>
									<li data-target="#demo" data-slide-to="2" style="width: 20px"></li>
									<li data-target="#demo" data-slide-to="3" style="width: 20px"></li>
								</ul>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="../Images/banner6.jpg">
									</div>
									<div class="carousel-item">
										<img src="../Images/banner2.png">
									</div>
									<div class="carousel-item">
										<img src="../Images/banner4.jpg">
									</div>
									<div class="carousel-item">
										<img src="../Images/banner1.jpg">
									</div>
								</div>
								<a class="carousel-control-prev" href="#demo" data-slide="prev">
									<span class="carousel-control-prev-icon"></span>
								</a>
								<a class="carousel-control-next" href="#demo" data-slide="next">
									<span class="carousel-control-next-icon"></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<link rel="stylesheet" href="../CSS/content.css">
			<div class="container">
				<div class="cac-dm-sach">

					<div class="sachtuduy">
						<h3>
							<a href="sachtheloai.php?idtheloai=4" class="title">Sách Tư duy - Kỹ năng sống</a>
							<a href="sachtheloai.php?idtheloai=4" class="more">Xem tất cả</a>
						</h3>

						<div class="bc-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-12">
										<div id="inam1" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner">
												<div class="carousel-item active">
													<div class="row">
														<?php
														$sql = "SELECT * FROM books WHERE idtheloai='4' AND (id>'60' AND id<'66')";
														$ketqua = mysqli_query($conn, $sql);
														while ($row = mysqli_fetch_assoc($ketqua)) {
														?>
															<div class="col-sm-12 col-lg-2 col-md-2">
																<div class="card">
																	<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><img src=" . $row['image'] . " class='card-img-top'>"; ?>
																	<div class="card-body">
																		<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><p class='title'>" . $row['tensach'] . "</p></a>";
																		echo "<p class='author'>" . $row['tacgia'] . "</p>";
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
														<?php }		 ?>
													</div>
												</div>

												<div class="carousel-item">
													<div class="container">
														<div class="row">
															<?php
															$sql = "SELECT * FROM books WHERE idtheloai='4' AND (id>'65' AND id<'71')";
															$ketqua = mysqli_query($conn, $sql);
															while ($row = mysqli_fetch_assoc($ketqua)) {
															?>
																<div class="col-sm-12 col-lg-2 col-md-2">
																	<div class="card">
																		<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><img src=" . $row['image'] . " class='card-img-top'></a>"; ?>
																		<div class="card-body">
																			<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><p class='title'>" . $row['tensach'] . "</p></a>";
																			echo "<p class='author'>" . $row['tacgia'] . "</p>";
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
															<?php }		?>
														</div>
													</div>
												</div>
											</div>
											<a href="#inam1" class="carousel-control-prev" data-slide="prev">
												<span class="carousel-control-prev-icon"></span>
											</a>
											<a href="#inam1" class="carousel-control-next" data-slide="next">
												<span class="carousel-control-next-icon"></span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="sachtamly">
						<h3>
							<a href="sachtheloai.php?idtheloai=3" class="title">Sách Tâm lý</a>
							<a href="sachtheloai.php?idtheloai=3" class="more">Xem tất cả</a>
						</h3>

						<div class="ph-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-12">
										<div id="inam2" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner">
												<div class="carousel-item active">
													<div class="container">
														<div class="row">
															<?php
															$sql = "SELECT * FROM books WHERE idtheloai='3' AND (id>'45' AND id<'51')";
															$ketqua = mysqli_query($conn, $sql);
															while ($row = mysqli_fetch_assoc($ketqua)) {
															?>
																<div class="col-sm-12 col-lg-2 col-md-2">
																	<div class="card">
																		<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><img src=".$row['image']." class='card-img-top'></a>"; ?>
																		<div class="card-body">
																			<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><p class='title'>" . $row['tensach'] . "</p></a>";
																			echo "<p class='author'>" . $row['tacgia'] . "</p>";
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
															<?php }		?>
														</div>
													</div>
												</div>

												<div class="carousel-item">
													<div class="container">
														<div class="row">
															<?php
															$sql = "SELECT * FROM books WHERE idtheloai='3' AND (id>'50' AND id<'56')";
															$ketqua = mysqli_query($conn, $sql);
															while ($row = mysqli_fetch_assoc($ketqua)) {
															?>
																<div class="col-sm-12 col-lg-2 col-md-2">
																	<div class="card">
																		<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><img src=" . $row['image'] . " class='card-img-top'></a>"; ?>
																		<div class="card-body">
																			<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><p class='title'>" . $row['tensach'] . "</p></a>";
																			echo "<p class='author'>" . $row['tacgia'] . "</p>";
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
															<?php }	?>
														</div>
													</div>
												</div>
											</div>
											<a href="#inam2" class="carousel-control-prev" data-slide="prev">
												<span class="carousel-control-prev-icon"></span>
											</a>
											<a href="#inam2" class="carousel-control-next" data-slide="next">
												<span class="carousel-control-next-icon"></span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="truyen">
						<h3>
							<a href="sachtheloai.php?idtheloai=1" class="title">Truyện - Tiểu thuyết</a>
							<a href="sachtheloai.php?idtheloai=1" class="more">Xem tất cả</a>
						</h3>

						<div class="bc-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-12">
										<div id="inam1" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner">
												<div class="carousel-item active">
													<div class="row">
														<?php
														$sql = "SELECT * FROM books WHERE idtheloai='1' AND (id>'0' AND id<'6')";
														$ketqua = mysqli_query($conn, $sql);
														while ($row = mysqli_fetch_assoc($ketqua)) {
														?>
															<div class="col-sm-12 col-lg-2 col-md-2">
																<div class="card">
																	<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><img src=" . $row['image'] . " class='card-img-top'>"; ?>
																	<div class="card-body">
																		<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><p class='title'>" . $row['tensach'] . "</p></a>";
																		echo "<p class='author'>" . $row['tacgia'] . "</p>";
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
														<?php }		 ?>
													</div>
												</div>

												<div class="carousel-item">
													<div class="container">
														<div class="row">
															<?php
															$sql = "SELECT * FROM books WHERE idtheloai='1' AND (id>'5' AND id<'11')";
															$ketqua = mysqli_query($conn, $sql);
															while ($row = mysqli_fetch_assoc($ketqua)) {
															?>
																<div class="col-sm-12 col-lg-2 col-md-2">
																	<div class="card">
																		<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><img src=" . $row['image'] . " class='card-img-top'></a>"; ?>
																		<div class="card-body">
																			<?php echo "<a href=chitietsp.php?id=" . $row['id'] . "><p class='title'>" . $row['tensach'] . "</p></a>";
																			echo "<p class='author'>" . $row['tacgia'] . "</p>";
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
															<?php }		?>
														</div>
													</div>
												</div>
											</div>
											<a href="#inam1" class="carousel-control-prev" data-slide="prev">
												<span class="carousel-control-prev-icon"></span>
											</a>
											<a href="#inam1" class="carousel-control-next" data-slide="next">
												<span class="carousel-control-next-icon"></span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<script type="text/javascript">
						$(function() {
							$('.panel').hover(function() {
								$(this).find('.panel-footer').slideDown(250);
							}, function() {
								$(this).find('.panel-footer').slideUp(250);
							});
						})
					</script>


					<div class="danhmuc">
						<h3>
							<a href="#" class="title">Thể loại</a>
						</h3>

						<div class="dm-content">
							<div class="container-fluid">

								<div class="row hang1">
									<div class="col-sm-6 col-md-2 sach">
										<div class="panel panel-default">
											<div class="panel-body">
												<p style="text-align:center;margin:0px;"><a href="#"><img src="../Images/sachkinhte.jpg" class="img-responsive" alt="Sách Kinh Tế"></a>
												</p>
											</div>
											<div class="panel-footer">
												<a href="sachtheloai.php?idtheloai=24">
													<h4 style="font-size: 1rem;">Sách Kinh Tế</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-2 sach">
										<div class="panel panel-default">
											<div class="panel-body">
												<p style="text-align:center;margin:0px;"><a href="#"><img src="../Images/vhnuocngoai.jpg" class="img-responsive" alt="Văn Học Nước Ngoài"></a>
												</p>
											</div>
											<div class="panel-footer">
												<a href="#">
													<h4 style="font-size: 1rem;">Văn Học Nước Ngoài</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-2 sach">
										<div class="panel panel-default">
											<div class="panel-body">
												<p style="text-align:center;margin:0px;"> <a href="#"><img src="../Images/vhtrongnuoc.jpg" class="img-responsive" alt="Văn Học Trong Nước"></a>
												</p>
											</div>
											<div class="panel-footer">
												<a href="#">
													<h4 style="font-size: 1rem;">Văn Học Trong Nước</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-2 sach">
										<div class="panel panel-default">
											<div class="panel-body">
												<p style="text-align:center;margin:0px;"> <a href="#"><img src="../Images/kinangsong.jpg" class="img-responsive" alt="Sách Kĩ Năng Sống"></a>
												</p>
											</div>
											<div class="panel-footer">
												<a href="#">
													<h4 style="font-size: 1rem;">Sách Kĩ Năng Sống</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-2 sach">
										<div class="panel panel-default">
											<div class="panel-body">
												<p style="text-align:center;margin:0px;"> <a href="#"><img src="../Images/tuoiteen.jpg" class="img-responsive" alt="Sách Tuổi Teen"></a>
												</p>
											</div>
											<div class="panel-footer">
												<a href="#">
													<h4 style="font-size: 1rem;">Sách Tuổi Teen</h4>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="row hang2">
									<div class="col-sm-6 col-md-2 sach1">
										<div class="panel panel-default">
											<div class="panel-body">
												<p style="text-align:center;margin:0px;"><a href="#"><img src="../Images/ngoaiingu.jpg" class="img-responsive" alt="Học Ngoại Ngữ"></a>
												</p>
											</div>
											<div class="panel-footer">
												<a href="#">
													<h4 style="font-size: 1rem;">Học Ngoại Ngữ</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-2 sach1">
										<div class="panel panel-default">
											<div class="panel-body">
												<p style="text-align:center;margin:0px;"> <a href="#"><img src="../Images/thieunhi.jpg" class="img-responsive" alt="Sách Thiếu Nhi"></a>
												</p>
											</div>
											<div class="panel-footer">
												<a href="#">
													<h4 style="font-size: 1rem;">Sách Thiếu Nhi</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-2 sach1">
										<div class="panel panel-default">
											<div class="panel-body">
												<p style="text-align:center;margin:0px;"> <a href="#"><img src="../Images/doisong.jpg" class="img-responsive" alt="Thường Thức Đời Sống"></a>
												</p>
											</div>
											<div class="panel-footer">
												<a href="#">
													<h4 style="font-size: 1rem;">Thường Thức Đời Sống</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-2 sach1">
										<div class="panel panel-default">
											<div class="panel-body">
												<p style="text-align:center;margin:0px;"> <a href="#"><img src="../Images/chuyennganh.jpg" class="img-responsive" alt="Sách Chuyên Ngành"></a>
												</p>
											</div>
											<div class="panel-footer">
												<a href="#">
													<h4 style="font-size: 1rem;">Sách Chuyên Ngành</h4>
												</a>
											</div>
										</div>
									</div>
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