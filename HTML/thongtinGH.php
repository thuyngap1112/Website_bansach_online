<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bansach');
$id_khachhang = 16;
$sql = "SELECT * FROM hoadon, user WHERE hoadon.iduser = user.id 
AND hoadon.iduser = '$id_khachhang' ORDER BY hoadon.idhoadon DESC";
        $ketqua = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($ketqua)) {
            echo $row['dienthoai'];
        }

?>