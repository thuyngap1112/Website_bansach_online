<?php 
$conn = mysqli_connect('localhost','root','','bansach');
$id = $_GET['id_cthd'];
$tinhtrang = $_POST['tinhtrang'];
$sql = "UPDATE chitiethd SET tinhtrangdonhang = '$tinhtrang' WHERE id_cthd =$id"; 
$ketqua = mysqli_query($conn,$sql);
header("location:donhang.php");
//  ?>