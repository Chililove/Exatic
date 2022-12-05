<?php
$delete = $_SERVER['QUERY_STRING'];
$deleteProduct = "DELETE FROM Product WHERE productID = $delete";

class AdminProductModel
{
    public $product_list = "SELECT p.productID, p.title, p.price, p.stockQuantity, p.description, p.isNew, p.isDailySpecial, p.country, p.brand, p.productImage, p.timestamp, pt.productTypeID, pt.typeName, d.discountID, d.eventName, d.discountProcent
                        FROM Product p, ProductType pt, Discount d WHERE p.productTypeID = pt.productTypeID AND p.discountID = d.discountID ORDER BY p.productID DESC";
}
$AdminProductModel = new AdminProductModel();
