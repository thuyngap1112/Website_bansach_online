<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bansach');
$id_khachhang = $_SESSION['id'];
// print_r($id_khachhang);
// die();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
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
                        <span class="tieude" style="margin-right: -20px;">Mã ĐH</span>
                    </div>
                    <div class='col-md-2'>
                        <span class="tieude">Tên Khách hàng</span>
                        </a>
                    </div>
                    <div class="col-md-2"><span class="tieude">Email</span></div>
                    <div class='col-md-2'>
                        <span class="tieude">Số điện thoại</span>
                    </div>
                    <div class='col-md-1'>
                        <span class="tieude" style="margin-left: -35px;"> Địa chỉ</span>
                    </div>
                    <div class='col-md-2'>
                        <span class="tieude" style="margin-left: -20px;">Ngày đặt</span>
                    </div>
                    <div class='col-md-2'>
                        <span class="tieude">Xem đơn hàng</span>
                    </div>
                </div>
            </div>  
            <?php 
				
				$sql = "SELECT * FROM hoadon, user WHERE hoadon.iduser = user.id 
                AND hoadon.iduser = '$id_khachhang' ORDER BY hoadon.idhoadon DESC";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){?>

            <!-- thông tin đơn hàng -->
            <div class="procart" style="background-color: white;">
                <div class="row" style="padding-top: 25px;">
                    <div class="col-md-1">
                        <span class="than" style="margin-right: -20px;"><?php echo $row['idhoadon'] ?></span>
                    </div>
                    <div class='col-md-2'>
                        <span class="than"><?php echo $row['nguoinhan'] ?></span>
                        </a>
                    </div>
                    <div class="col-md-2"><span class="than"><?php echo $row['email'] ?></span></div>
                    <div class='col-md-2'>
                        <span class="than"><?php echo $row['dienthoai'] ?></span>
                    </div>
                    <div class='col-md-1'>
                        <span class="than" style="margin-left: -35px;"><?php echo $row['diachi'] ?></span>
                    </div>
                    <div class='col-md-2'>
                        <span class="than" style="margin-left: -20px;"><?php echo $row['ngay'] ?></span>
                    </div>
                    <div class='col-md-2'style="padding-bottom:40px;">
                        <span class="than"><a href="quanlidonhang.php?madonhang=<?php echo $row['idhoadon']?>" style="text-decoration: none;">Xem chi tiết</a></span>
                    </div>
                </div>
            </div>
            <?php } 
            // }?>

            <div class='' style="text-align: center; margin-top:30px">
                <b><a href='trangchu.php' style="text-decoration:none;">Mua Sách Tiếp</a> - <a href='delcart.php?id=0' style='text-decoration:none;'>Xóa Bỏ Giỏ Hàng</a></b>
            </div>

        </div>
    </div>


    <?php include('footer.php'); ?>

</body>

</html>