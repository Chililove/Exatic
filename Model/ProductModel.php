<?php
// set default values
if (isset($_GET["limit"])) {
    $limit = $_GET["limit"];
} else {
    $limit = 8;
}

if (isset($_GET["skip"])) {
    $skip = $_GET["skip"];
} else {
    $skip = 0;
}

if (isset($_GET["productTypeID"])) {
    $productTypeID = $_GET["productTypeID"];
} else {
    $productTypeID = null;
}
$firstPageProductsQuery = "SELECT * FROM Product LIMIT $limit";
$currentPageProductsQuery = "SELECT * FROM Product";
$pageCountQuery = "SELECT * FROM Product";

class ProductModel
{
    public $productType = "SELECT * FROM ProductType";
}
$ProductModel = new ProductModel();
