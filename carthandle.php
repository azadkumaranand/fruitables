<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product_id = $_POST['product_id'];

    unset($_SESSION['products_added_to_cart']['product-'.$product_id]);

    echo "Product has been removed";
}
