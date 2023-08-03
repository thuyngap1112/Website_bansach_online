<?php 
session_start();
$conn = mysqli_connect("localhost","root","","bansach");
if(isset($_POST['submit']) && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['repassword'] != '' && $_POST['phone'] && $_POST['email'] != ''){
	// Thực hiện xử lí khi người dùng ấn nút submit và điền đầy đủ thông tin 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$phone = $_POST['phone'];
	$email =$_POST['email'];
	if ($password != $repassword) {
		header("location: dangnhap.php");
	}
	$sql = "SELECT * FROM user WHERE username = '$username'";
	$ketqual = mysqli_query($conn,$sql);
	if (mysqli_num_rows($ketqual) > 0) {
		header("location: dangnhap.php");
	}
	$sql = "INSERT INTO user (username,password,level,phone,email,anhdaidien) VALUES ('$username','$password','Khach hang','$phone','$email','')";
	$ketqua = mysqli_query($conn,$sql);
	// $_SESSION['username'] = $row['username'];
	// $_SESSION['id'] = $row['id'];	
	header("location: trangchu.php");
}else{
	header("location: dangnhap.php");
}
?>