<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bansach');

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

if (isset($_POST["update"])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $_SESSION['cart'][$value['id']]['quantily'] = $_POST['quantily' . $value['id']];
    }
}
// echo "<pre>";
// print_r($cart);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gio hang</title>
    <link rel="stylesheet" href="../CSS/giohang.css">
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
        <form action="view_cart.php" method="POST">
            <div class="container">
                <h1 style="padding-top: 60px;text-align: center;">Giỏ hàng của bạn</h1>
                <?php
                $total = 0;
                $check = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        if (isset($key)) {
                            $check = 1;
                        }
                    }
                }
                if ($check == 1) {
                    foreach ($cart as $key => $value) {
                        $total += ($value['price'] * $value['quantily']);
                ?>

                        <div class="procart" style="background-color: white;">
                            <div class="row" style="padding-top: 25px;">
                                <div class="col-md-2" style="text-align: center;">
                                    <span><img src="<?php echo $value['image']; ?>" class="imgcart" style="width: 185px;"></span>
                                </div>
                                <div class='col-md-2'>
                                    <a href='#' style="text-decoration:none;color:black;"><?php echo $value['name']; ?><h4></h4></a>
                                </div>
                                <div class="col-md-2">Giá: <?php echo number_format($value['price'], 3) ?> VNĐ <br></div>
                                <div class='col-md-2'>
                                    <p style="text-align: right">Số lượng: <input type='number' name="quantily<?php echo $value['id']; ?>" value='<?php echo $value['quantily'] ?>' size='5' min='1' max='99'></p>
                                </div>
                                <div class='col-md-3'>
                                    <p> Thành tiền: <span style='color:red;'><?php echo number_format(($value['price'] * $value['quantily']), 3) ?> VNĐ</span></p>
                                </div>
                                <div class='col-md-1' style="margin-left: -40px;margin-top: -6px;">
                                    <span><a href="cart1.php?id=<?php echo $value['id'] ?>&action=delete" class="btn btn-danger">Xoá</a></span>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="procart" style="background-color: white; padding-right:55px; padding-bottom: 15px;text-align:right">
                        <b>Tổng tiền các món hàng: <?php echo number_format($total, 3) ?> VNĐ</b><br><br>
                        <button type="submit" name="update" style="background-color: #33cc33;color: white;padding: 10px;margin-right: 10px;border: none;">Cập Nhật Giỏ Hàng</button>
                        <a href='thanhtoan.php?action=submit' style="text-decoration:none;background-color: red;color:white;padding: 10px;border:none;"><b>THANH TOÁN</b></a>
                    </div>

                    <div class='' style="text-align: center; margin-top:30px">
                        <b><a href='trangchu.php' style="text-decoration:none;">Mua Sách Tiếp</a> - <a href='delcart.php?id=0' style='text-decoration:none;'>Xóa Bỏ Giỏ Hàng</a></b>
                    </div>
                <?php } else { ?>
                    <div class='procart' style="background-color: white;">
                        <p style="text-align: center">Bạn không có món hàng nào trong giỏ hàng<br /><a href='trangchu.php'>Mua Sách Ngay</a></p>
                    </div>
                <?php } ?>

            </div>
        </form>
    </div>


    <?php include('footer.php'); ?>

</body>

</html>