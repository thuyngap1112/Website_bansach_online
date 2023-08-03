<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bansach');
$id_khachhang = $_SESSION['id'];
$idhoadon = $_GET['madonhang'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gio hang</title>
    <link rel="stylesheet" href="../CSS/thongtin_giohang.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include('header.php'); ?>

    <div class="container-fuild" style="background-color: #f5f5f5;padding-bottom:40px;">

        <div class="container">
            <h1 style="padding-top: 40px;text-align: center;">Thông Tin Đơn Hàng Của Bạn</h1>
            <!-- tiêu đề -->
            <div class="procart1" style="background-color: white;">
                <div class="row" style="padding-top: 25px;">
                    <div class="col-md-1">
                        <span class="tieude" style="margin-right: -20px;">STT</span>
                    </div>
                    <div class='col-md-2'>
                        <span class="tieude">Tên Sách</span>
                        </a>
                    </div>
                    <div class="col-md-2"><span class="tieude">Số lượng</span></div>
                    <div class='col-md-2'>
                        <span class="tieude">Thành tiền</span>
                    </div>
                    <div class='col-md-2'>
                        <span class="tieude" style="margin-left: -35px;">Trạng thái</span>
                    </div>
                    <div class='col-md-3'>
                        <span class="tieude" style="margin-left: -20px;">Hình thức thanh toán</span>
                    </div>
                </div>
            </div>
            <?php 
                $i=0;
                $tongtien = 0;
				$sql = "SELECT * FROM chitiethd, books WHERE chitiethd.idbooks = books.id
                        AND chitiethd.idHD ='$idhoadon'";
                $result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){
                $i++;
                $thanhtien = $row['gia'] * $row['soluong'];
                $tongtien += $thanhtien;
                ?>
                

            <!-- thông tin đơn hàng -->
            <div class="procart" style="background-color: white;">
                <div class="row" style="padding-top: 25px;">
                    <div class="col-md-1">
                        <span class="than" style="margin-right: -20px;"><?php echo $i ?></span>
                    </div>
                    <div class='col-md-2'>
                        <span class="than"><?php echo $row['tensach'] ?></span>
                        </a>
                    </div>
                    <div class="col-md-2"><span class="than"><?php echo $row['soluong'] ?></span></div>
                    <div class='col-md-2'>
                        <span class="than"><?php echo number_format($row['gia'],3) ?> VNĐ</span>
                    </div>
                    <div class='col-md-2'>
                        <span class="than" style="margin-left: -35px;"><?php echo $row['tinhtrangdonhang'] ?></span>
                    </div>
                    <div class='col-md-3'>
                        <span class="than" style="margin-left: -20px;">Tiền mặt</span>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="procart3" style="background-color: white;padding-top:20px;padding-right:55px; padding-bottom: 15px;text-align:right">
                        <b>Tổng tiền các món hàng: <?php echo number_format($tongtien, 3) ?> VNĐ</b><br><br>
                    </div>
            

            <div class='' style="text-align: center; margin-top:30px">
                <b><a href='trangchu.php' style="text-decoration:none;">Mua Sách Tiếp</a> - <a href='delcart.php?id=0' style='text-decoration:none;'>Xóa Bỏ Giỏ Hàng</a></b>
            </div>

        </div>
    </div>


    <?php include('footer.php'); ?>

</body>

</html>