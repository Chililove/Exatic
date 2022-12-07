<?php

$adminProductResult = $conn->query($AdminProductModel->product_list);
//$deleteProductResult = $conn->query($AdminProductModel->deleteProduct);
$productTypeResult = $conn ->query( $AdminProductModel->productType);
$productDiscount = $conn ->query( $AdminProductModel->discount);

