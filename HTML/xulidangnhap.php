<?php 
session_start();
	$tendn = $_POST['tendn'];
	$mk = $_POST['mk'];
	$conn = mysqli_connect("localhost","root","","bansach");
	$sql = "SELECT *FROM user WHERE	username='$tendn' AND password ='$mk'";
	$ketqua = mysqli_query($conn,$sql);
	$soluong = mysqli_num_rows($ketqua);
	if($soluong>0){
		$row = mysqli_fetch_assoc($ketqua);
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['level'] = $row['level'];
		if($_SESSION['level'] == '1'){
			header("location:Admin/index1.php");
		}
		else{
			header("location:trangchu.php");
		}
	}
	else
		header('location:dangnhap.php');
	?>  