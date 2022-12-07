<?php
$delete = $_SERVER['QUERY_STRING'];
$deleteProduct = "DELETE FROM Product WHERE productID = $delete";



class AdminProductModel
{
    public $productType = "SELECT * FROM ProductType";
    public $discount = "SELECT * FROM Discount";
    public $addProduct = "INSERT INTO Product (title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (:title, :price, :stockQuantity, :description, 1, :isDailySpecial, :country, :brand, :productImage, :timestamp, :productTypeID, :discountID )";
    public $product_list = "SELECT p.productID, p.title, p.price, p.stockQuantity, p.description, p.isNew, p.isDailySpecial, p.country, p.brand, p.productImage, p.timestamp, pt.productTypeID, pt.typeName, d.discountID, d.eventName, d.discountProcent
                        FROM Product p, ProductType pt, Discount d WHERE p.productTypeID = pt.productTypeID AND p.discountID = d.discountID ORDER BY p.productID DESC";
    // public $update = "UPDATE Product SET `title` = :title, `price`=:price,`stockQuantity`=:stockQuantity,`description`=:description,`country`=:country, `brand`=:brand, `productTypeID`=:productTypeID, `discountID`=:discountID, `productImage`=:filename WHERE productID=$productID";
}

$AdminProductModel = new AdminProductModel();
