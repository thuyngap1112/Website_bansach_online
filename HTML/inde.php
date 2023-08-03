<?php 
session_start();
$user = $_SESSION["username"];
$id_user = $_SESSION['id'];
var_dump($id_user);
?>