<?php 
$conn = mysqli_connect("localhost","root","","bansach");
	$sql = "DELETE FROM binhluan WHERE id_binhluan=".$_GET['id_binhluan'];
	$ketqua = mysqli_query($conn, $sql);
	header('location:binhluan.php');
?>