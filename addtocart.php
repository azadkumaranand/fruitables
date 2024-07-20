<?php
session_start();
require './db/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product_id = $_POST['product_id'];
    // print_r($_POST);
    if(isset($_SESSION['products_added_to_cart']['product-'.$product_id])){
        $_SESSION['products_added_to_cart']['product-'.$product_id]['count'] += 1;
    }else{
        $_SESSION['products_added_to_cart']['product-'.$product_id]['product_id'] = $_POST['product_id'];
        $_SESSION['products_added_to_cart']['product-'.$product_id]['count'] = 1;
    }

    $arr = $_SESSION['products_added_to_cart'];
    // print_r($arr);

    $allData = [];

    foreach($arr as $key=>$value){
        $product_id = $value['product_id'];
        $sql = "SELECT * FROM products WHERE id = '$product_id'";

        $data = $conn->query($sql)->fetch_assoc();
        $data['product_count'] = $value['count'];

        $allData[] = $data;
    }

    echo json_encode($allData);
}

// echo "<pre>";
// print_r($_SESSION['products_added_to_cart']);
// $arr = [40, 23, 56, [12, 32, 45]];

$arr = $_SESSION['products_added_to_cart'];
// print_r($arr);

$allData = [];

foreach($arr as $key=>$value){
    $product_id = $value['product_id'];
    $sql = "SELECT * FROM products WHERE id = '$product_id'";

    $data = $conn->query($sql)->fetch_assoc();
    $data['product_count'] = $value['count'];

    $allData[] = $data;
}

// print_r($allData);
// echo $arr[3]

?>