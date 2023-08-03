<?php 
session_start();
		$conn = mysqli_connect("localhost","root","","bansach");
if (isset($_GET['tendanhmuc']))
{
	$sql = "INSERT INTO theloai(tentheloai) VALUES('".$_GET['tentheloai']."')";
	$ketqua = mysqli_query($conn,$sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php include('header.php'); 
	?>

	<h1>Thêm thể loại</h1>
	<form action="themtdanhmuc.php" method="GET">
		Tên Thể Loại: <input type="text" name="tentheloai">
		<input type="submit" value="Thêm">
	</form>
	<?php include('footer.php'); ?>
</body>
</html>
