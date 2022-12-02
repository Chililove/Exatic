<?php

class AdminProductModel
{
    public $product_list = "SELECT p.productID, p.title, p.price, p.stockQuantity, p.description, p.isNew, p.isDailySpecial, p.country, p.brand, p.productImage, p.timestamp, pt.productTypeID, pt.typeName, d.discountID, d.eventName, d.discountProcent
                        FROM Product p, Producttype pt, Discount d WHERE p.productTypeID = pt.producttypeID AND p.discountID = d.discountID";
}
$AdminProductModel = new AdminProductModel();
