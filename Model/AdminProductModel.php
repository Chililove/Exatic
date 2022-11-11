<?php

//NOT WORKING FIXX
//Same problem as Login 
$id_to_delete = $_SERVER['QUERY_STRING'];
$deleteProduct = "DELETE FROM Product WHERE productID = $id_to_delete";
class AdminProductModel
{
    public $product_list = "SELECT p.productID, p.title, p.price, p.stockQuantity, p.description, p.isNew, p.isDailySpecial, p.country, p.brand, p.productImage, p.timestamp, pt.productTypeID, pt.typeName, d.discountID, d.eventName, d.discountProcent
                        FROM Product p, Producttype pt, Discount d WHERE p.productTypeID = pt.producttypeID AND p.discountID = d.discountID";
}
$AdminProductModel = new AdminProductModel();
