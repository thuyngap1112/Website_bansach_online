<?php
session_start();
$username = $_SESSION['username'];
$conn = mysqli_connect('localhost', 'root', '', 'bansach');
if(isset($username)){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
    
    $quantily = (isset($_GET['quantily'])) ? $_GET['quantily'] : 1;
    // session_destroy();
    // var_dump($_GET);
    // die();
    $query = mysqli_query($conn,"SELECT * FROM books WHERE id = $id");
    
    if($query){
        $product = mysqli_fetch_assoc($query);
    }
    
    $item = [
        'id' =>$product['id'],
        'name' =>$product['tensach'],
        'image' => $product['image'],
        'price' => $product['gia'],
        'quantily' =>$quantily
    ];
    
    if ($action == 'add'){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantily'] +=$quantily;
        }
        else{
            $_SESSION['cart'][$id]= $item;
        }
    }
    
    if ($action == 'delete'){
        unset($_SESSION['cart'][$id]);
    }
     
    
    
    header('location: view_cart.php');
    echo "<pre>";
    print_r($_SESSION['cart']);
    
}else{
    header('location: dangnhap.php');
}

