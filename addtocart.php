<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product_id = $_POST['product_id'];
    // print_r($_POST);
    if(isset($_SESSION['products_added_to_cart']['product_id-'.$product_id])){
        $_SESSION['products_added_to_cart']['count-'.$product_id] += 1;
    }else{
        $_SESSION['products_added_to_cart']['product-'.$product_id]['product_id'] = $_POST['product_id'];
        $_SESSION['products_added_to_cart']['product-'.$product_id]['count'] = 1;
    }
}

echo "<pre>";
print_r($_SESSION['products_added_to_cart']);
// $arr = [40, 23, 56, [12, 32, 45]];

// echo $arr[3]

?>