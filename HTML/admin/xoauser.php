<?php 
	$conn = mysqli_connect("localhost","root","","bansach");
	$sql = "DELETE FROM user WHERE id=".$_GET['id'];
	$ketqua = mysqli_query($conn, $sql);
	header('location:dsuser.php');
?>