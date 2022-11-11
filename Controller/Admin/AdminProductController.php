<?php
$adminProductDelete = mysqli_query($conn, $AdminProductModel->deleteProduct);
$adminProductResult = mysqli_query($conn, $AdminProductModel->product_list);