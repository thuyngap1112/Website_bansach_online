<?php
session_start();
$user = $_SESSION["username"];
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../CSS/chitiet1_sm.css">
	<link rel="stylesheet" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
	<?php include('header.php'); ?>

	<div class="content-sachmoi">
		<div class="container">
			<?php
			$conn = mysqli_connect("localhost", "root", "", "bansach");
			$sql = "SELECT * FROM books";
			?>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="trangchu.php">Quay lại trang Chủ</a></li>
				</ol>
			</nav>


			<div class="chitietsach">
				<div class="container">
					<form action="cart1.php" method="GET">
						<div class="row">
							<?php
							$id = $_GET['id'];
							$sql = "SELECT * FROM books WHERE id=$id";
							$ketqua = mysqli_query($conn, $sql);
							foreach ($ketqua as $key => $value) {
							?>
								<div class="col-md-4 col-sm-4">
									<div class="example">
										<div class="zoom-box">
											<?php echo "<img class='img-name' src=" . $value['image'] . "  width='370' height='370'/>";  ?>
										</div>
									</div>
								</div>
								<div class="col-md-8 col-sm-8">
									<div class="header-sach">
										<?php
										echo "<h3>" . $value['tensach'] . "</h3>";
										?>
										<span class="star" class="left">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</span>
										<div class="brand">
											<h6>Tác giả: <?php echo "<a href='#'>" . $value['tacgia'] . "</a>";  ?></h6>
											<h6>Bìa mềm</h6>
										</div>
									</div>

									<div class="gia-sp">
										<?php echo "<p class='price'>" . number_format($value['gia'], 3) . " VNĐ</p>"; ?>
									</div>


									<div class="chon-sp">
										<div class="buttons_added">
											<p>Số lượng:&nbsp;&nbsp;</p>
											<input type="number" value="1" style="width: 70px; padding: 3px 12px;" id="textbox" name="quantily" min="1" max="50">
											<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
										</div>

										<button class='btn btn-add-to-cart' type="submit"><i class='fa fa-cart-plus'></i>MUA HÀNG</button>


									</div>

								</div>
						</div>
					</form>
				</div>
			</div>

			<div class="thongtinchitiet">
				<h2>Thông Tin Chi Tiết</h2>
				<div class="table">
					<table class="table table-striped table-bordered">
						<tr>

							<td>Công ty phát hành</td>
							<?php echo "<td>" . $value['congtyphathanh'] . "</td>"; ?>
						</tr>
						<tr>
							<td>Ngày xuất bản</td>
							<?php echo "<td>" . $value['ngaysx'] . "</td>"; ?>
						</tr>
						<tr>
							<td>Kích thước</td>
							<?php echo "<td>" . $value['kichthuoc'] . "</td>"; ?>
						</tr>
						<tr>
							<td>Dịch Giả</td>
							<?php echo "<td>" . $value['dichgia'] . "</td>"; ?>
						</tr>
						<tr>
							<td>Loại bìa</td>
							<?php echo "<td>" . $value['loaibia'] . "</td>"; ?>
						</tr>
						<tr>
							<td>Số trang</td>
							<?php echo "<td>" . $value['sotrang'] . "</td>"; ?>
						</tr>
						<tr>
							<td>Nhà xuất bản</td>
							<?php echo "<td>" . $value['nsx'] . "</td>"; ?>
						</tr>
					</table>
				</div>
				<div class="sale">
					<img src="../Images/sale.jpg" alt="sale">
				</div>
			</div>

			<div class="gioithieu-sp">
				<h2>Giới Thiệu Sản Phẩm</h2>
				<div class="box">
				<?php echo "<p>" . $value['gioithieusp'] . "</p>";
						} ?>
				<a href="javascript:void();" class="readmore-btn">Hiển Thị Thêm</a>
				</div>
			</div>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script>
				$(".readmore-btn").on('click', function() {
					$(this).parent().toggleClass("showContent");

					var replaceText = $(this).parent().hasClass("showContent") ? "Thu gọn" : "Hiển Thị Thêm";
					$(this).text(replaceText);
				});
			</script>

			<div class="danhgia-sp">
				<h2>Đánh Giá Sản Phẩm</h2>
				<p style="font-weight: bold;font-size: 20px;">Đánh giá của bạn</p>
				<div class="stars">
					<form action="">
						<input class="star star-5" id="star-5" type="radio" name="star" />
						<label class="star star-5" for="star-5"></label>
						<input class="star star-4" id="star-4" type="radio" name="star" />
						<label class="star star-4" for="star-4"></label>
						<input class="star star-3" id="star-3" type="radio" name="star" />
						<label class="star star-3" for="star-3"></label>
						<input class="star star-2" id="star-2" type="radio" name="star" />
						<label class="star star-2" for="star-2"></label>
						<input class="star star-1" id="star-1" type="radio" name="star" />
						<label class="star star-1" for="star-1"></label>
					</form>
				</div>
				<form>
					<div class="form-group">
						<label for="comment" style="font-weight: bold;font-size: 20px;">Nhận xét của bạn:</label><br><br><!-- 
		      <label>Tên:</label><br>
		      <input type="text" name="username"/><br><br> -->
						<label>Nội dung bình luận: </label><br>
						<input type="text" name="binhluan" id="noidungbinhluan" />
					</div>
					<button type="button" name="submit" class="btn btn-primary" style="width: 93px;height: 40px;" id="guibinhluan">Bình luận</button>
				</form>
				<script>
					$(document).ready(function() {
						$("#guibinhluan").click(function() {
							var url_string = window.location.href;
							var url = new URL(url_string);
							var idsp = url.searchParams.get("id");
							var txt = $("#noidungbinhluan").val();
							$.post("xulibinhluan.php", {
								binhluan: txt,
								id: idsp
							}, function(result) {
								$("#dsbinhluan").append('<hr>' + txt);
							});
						});
					});
				</script>
				<div id="dsbinhluan">
					<?php
					$sql1 = "SELECT * FROM binhluan WHERE idbooks = '$id' AND username = '$user'";
					$ketqual = mysqli_query($conn, $sql1);
					while ($dong = mysqli_fetch_assoc($ketqual)) {
						echo "<hr/>";
						echo "<p>" . $dong['binhluan'] . "</p>";
					}
					?>
				</div>
			</div>


		</div>
	</div>


	<?php include('footer.php'); ?>
</body>

</html>