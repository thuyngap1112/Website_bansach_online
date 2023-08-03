<?php 
session_start();
// b1:lay id cua san pham can them vao gio hang
if(isset($_GET['id']) && $_GET['id'] != null){
	$id = isset($_GET['id']);
}
// b2: khoi tao session
// ktra xem da ton tai session ['cart']
if(isset($_SESSION['cart'])){
	var_dump("Da ton tai gio hang");
}
else{
	var_dump("chua ton tai");
	$_SESSION['cart'][$id]['soluong']=1;
}
?>