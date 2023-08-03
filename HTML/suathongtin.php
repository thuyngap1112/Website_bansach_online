<?php
 $conn = mysqli_connect("localhost","root","","bansach");
	$sql="UPDATE user SET username ='".$_POST['username']."',
	phone = ".$_POST['phone'].",
	email = ".$_POST['email'].",
	anhdaidien = ".$_POST['anhdaidien'].",
	WHERE id = ".$_POST['id']."";
	$ketqua=mysqli_query($conn,$sql);
	header("location:trangchu.php");
?>