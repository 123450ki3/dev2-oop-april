<?php 

include '../classes/Product.php';
$product = new Product;

$product->productupdate($_POST, $_FILES);

?>
