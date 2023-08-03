<?php 
if(isset($_POST['dathang'])){
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $item[] = $key;
        }
    }
    $error = false;
	$string = implode(",", $item ?? []);
	$total = 0;
    $iduser = $_SESSION['username'];
    $nguoinhan = $_POST['nguoinhan'];
    $email = $_POST['email'];
    $dienthoai = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $ghichu = $_POST['note'];
    $date = date('d/m/Y');
    $sql = "INSERT INTO hoadon(iduser, nguoinhan, email, dienthoai, tongtien, ngay, diachi, ghichu) VALUES('$iduser','$nguoinhan','$email','$dienthoai','','$date','$diachi','$ghichu')";
    $ketqua = mysqli_query($conn, $sql);
    //Lấy thông tin khách hàng từ form
    
    //lấy thông tin giỏ hàng từ session và id đơn hàng vừa tạo

    //insert vào bảng giỏ hàng

    //show confirm đơn hàng

    //unset giỏ hàng session


}else{
    echo "thatbai";
}
?>