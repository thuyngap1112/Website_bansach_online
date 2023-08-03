<?php 
	$conn = mysqli_connect("localhost","root","","bansach");
	$sql = "DELETE FROM books WHERE id=".$_GET['id'];
	$ketqua = mysqli_query($conn, $sql);
?>