<?php
// ???? Why does this work when outside of class
//$overview = $_SERVER['QUERY_STRING'];
//$product_details = "SELECT * FROM product p, producttype pt WHERE p.productTypeID = pt.producttypeID AND p.productID = $overview";

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
