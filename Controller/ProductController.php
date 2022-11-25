<?php

$productResult = mysqli_query($conn, $ProductModel->products);
$productTypeResult = mysqli_query($conn, $ProductModel->productType);
if (isset($_GET["action"])) {

    if ($_GET["action"] == "getProductsByType" && isset($_GET["productTypeID"])) {
        $productTypeID = $_GET["productTypeID"];
        $productResult = mysqli_query($conn, "SELECT * FROM Product WHERE productTypeID = $productTypeID");
    }
}
