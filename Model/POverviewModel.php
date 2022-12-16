<?php
// __construct use for dependency injection to model
$productID = $_GET['productID'];
$product_details = "SELECT * FROM Product p, ProductType pt WHERE  p.productTypeID = pt.productTypeID AND productID = $productID";

class POverviewModel
{
    /* public $overview;

    public function  __construct()
    {
        $this->$overview = $_SERVER['QUERY_STRING'];
    } */

    public $recommend = "SELECT * FROM Product ORDER BY RAND() LIMIT 4";
}
$POverviewModel = new POverviewModel();
