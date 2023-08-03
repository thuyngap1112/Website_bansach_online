<?php 
	$conn = mysqli_connect("localhost","root","","bansach");
	$sql = "DELETE FROM theloai WHERE id=".$_GET['id'];
	$ketqua = mysqli_query($conn, $sql);
	header('location:dstheloai.php');
?>