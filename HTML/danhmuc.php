<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../CSS/danhmuc.css">
</head>

<body>
	<div class="menu">
		<div id="tieude_dm">

			<i class="fa fa-bars" aria-hidden="true" style="font-size: 22px;"></i>
			<h6>THỂ LOẠI SÁCH</h6>
		</div>
		<ul class="danhmuc1">
			<?php
			$conn = mysqli_connect("localhost", "root", "", "bansach");
			$sql = "SELECT * FROM theloai";
			$ketqua = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_assoc($ketqua)) { ?>
				<li><?php echo "<a href=sachtheloai.php?idtheloai=" . $row['id'] . " class = 'chinh'>" . $row['tentheloai'] . "</a>"; ?></li>
			<?php } ?>
			</li>
		</ul>
	</div>
</body>

</html>