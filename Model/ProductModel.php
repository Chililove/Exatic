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

$getAllProductsQuery = "SELECT * FROM Product LIMIT $limit";
$getAllProductsCountQuery = "SELECT * FROM Product";

class ProductModel
{
    public $products = "SELECT * FROM Product ORDER BY productID ASC";
    public $productType = "SELECT * FROM ProductType";
    public $query = "SELECT * FROM Product";
    public $getAllProductsCountQuery = "SELECT * FROM Product";
}
$ProductModel = new ProductModel();
