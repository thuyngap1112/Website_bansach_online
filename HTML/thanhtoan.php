<?php
ob_start();
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bansach');

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
$user = $_SESSION["username"];
$id_user = $_SESSION['id'];
if (!isset($_SESSION['username'])) {
	header('location:dangnhap.php');
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đặt hàng</title>
	<link rel="stylesheet" href="../CSS/thanhtoan.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include("header.php"); ?>
	<?php
	$error = false;
	$string = implode(",", $item ?? []);
	$total = 0;

	$conn = mysqli_connect('localhost', 'root', '', 'bansach');
	if (isset($_POST['dathang'])) {
		$nguoinhan = $_POST['nguoinhan'];
		$email = $_POST['email'];
		$dienthoai = $_POST['sdt'];
		$diachi = $_POST['diachi'];
		$ghichu = $_POST['note'];
		$total = $_SESSION['total'];
		$today = date("Y-m-d G.i:s");
		$sql = "INSERT INTO hoadon(iduser, nguoinhan, email, dienthoai, tongtien, ngay, diachi, ghichu) 
		VALUES('$id_user','$nguoinhan','$email','$dienthoai','$total','$today','$diachi','$ghichu')";
		$result = mysqli_query($conn, $sql);
		if($result){
			$id_order = mysqli_insert_id($conn);
			foreach($cart as $value){
				mysqli_query($conn, "INSERT INTO `chitiethd`(`idHD`, `idbooks`, `soluong`, `gia`, `ngay`, `tinhtrangdonhang`) 
				VALUES ('$id_order','$value[id]','$value[quantily]','$value[price]','$today','Đang chờ xử lí')");
			}
			unset($_SESSION['cart']);
			header('Location: trangchu.php');
			ob_end_flush();
		}
	}
	?>
	<div class="content">
		<div class="container thanhtoan">
			<main role="main">

				<div class="container mt-4">
					<form class="needs-validation" method="POST" action="thanhtoan.php">
						<div class="py-5 text-center">
							<i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
							<h2>Thanh toán</h2>
							<p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
						</div>

						<div class="row">
							<div class="col-md-6 order-md-2 mb-4">
								<h4 class="d-flex justify-content-between align-items-center mb-3">
									<span class="text-muted">Giỏ hàng</span>
								</h4>
								<?php
								foreach ($cart as $key => $value){
									$total += ($value['price'] * $value['quantily']);?>
									<ul class='list-group mb-3'>
									<li class='list-group-item d-flex justify-content-between lh-condensed'>
									<div>
									<h6 class='my-0'><?php echo $value['name'] ?></h6>
									<small class='text-muted'> <?php echo $value['price'] ?>  x  <?php echo $value['quantily'] ?></small>
									</div>
									<span class='text-muted'><?php echo number_format(($value['price'] * $value['quantily']), 3)?></span>
									</li>
								<?php
                				$_SESSION["total"]=$total; } ?>
								
								<li class="list-group-item d-flex justify-content-between">
									<span>Tổng thành tiền</span>
									<?php echo  "<strong>" . number_format($total, 3) . " VNĐ</strong>"; ?>
								</li>
								</ul>



							</div>
							<div class="col-md-6 order-md-1">
								<h4 class="mb-3">Thông tin người nhận</h4>

								<div class="row">
									<div class="col-md-12">
										<label for="kh_ten">Họ và tên</label>
										<input type="text" class="form-control" name="nguoinhan" required="" placeholder="Nhập tên khách hàng">
									</div>

									<div class="col-md-12">
										<label for="kh_diachi">Địa chỉ</label>
										<input type="text" class="form-control" name="diachi" required="" placeholder="Địa chỉ">
									</div>
									<div class="col-md-12">
										<label for="kh_dienthoai">Điện thoại</label>
										<input type="text" class="form-control" name="sdt" required="" placeholder="Số điện thoại">
									</div>
									<div class="col-md-12">
										<label for="kh_email">Email</label>
										<input type="text" class="form-control" name="email" required="" placeholder="Nhập Email">
									</div>

									<div class="col-md-12">
										<label for="kh_cmnd">Ghi Chú</label>
										<textarea class="form-control" name="note" placeholder="Ghi chú của bạn" rows="3"></textarea>
									</div>
								</div>

								<h4 class="mb-3" style="margin-top: 15px;">Hình thức thanh toán</h4>

								<div class="d-block my-3">
									<div class="">
										<label class="customlabel" for="httt-1">Tiền mặt</label>
									</div>

								</div>
								<hr class="mb-4">
								<button class="btn btn-primary btn-lg btn-block" type="submit" name="dathang">Đặt hàng</button>
							</div>
						</div>
					</form>

				</div>

			</main>
		</div>
	</div>
	<?php include("footer.php"); ?>
</body>

</html>