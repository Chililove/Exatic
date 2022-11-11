<?php
// ???? Why does this work when outside of class
//$overview = $_SERVER['QUERY_STRING'];
//$product_details = "SELECT * FROM product p, producttype pt WHERE p.productTypeID = pt.producttypeID AND p.productID = $overview";

class POverviewModel
{

    public $recommend = "SELECT * FROM product ORDER BY RAND() LIMIT 4";
}
$POverviewModel = new POverviewModel();
