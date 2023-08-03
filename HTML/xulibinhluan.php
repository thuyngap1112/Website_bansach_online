	<?php 
$conn = mysqli_connect("localhost","root","","bansach");
$username = $_POST['username'];
$binhluan = $_POST['binhluan'];
$id = $_POST['id'];
$ngaygio = date("Y-m-d H:i:s");
$sql = "INSERT INTO binhluan (idbooks,username,binhluan,ngaygio) VALUES ($id,'$username','$binhluan','$ngaygio')";
$ketqua = mysqli_query($conn,$sql);

?>
	
