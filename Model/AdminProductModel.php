<?php

class AdminProductModel
{public $product_list = "SELECT p.productID, p.title, p.price, p.stockQuantity, p.description, p.isDailySpecial, p.country, p.brand, p.productImage, pt.productTypeID, pt.typeName, d.discountID, d.eventName, d.discountProcent
                         FROM Product p, ProductType pt, Discount d WHERE p.productTypeID = pt.productTypeID AND p.discountID = d.discountID
                         ORDER BY p.productID DESC";
    public $productType = "SELECT * FROM ProductType";
    public $discount = "SELECT * FROM Discount";
    public $addProduct = "INSERT INTO Product (title, price, stockQuantity, description, isDailySpecial, country, brand, productImage, productTypeID, discountID)
                          VALUE (:title, :price, :stockQuantity, :description, :isDailySpecial, :country, :brand, :productImage, :productTypeID, :discountID )";


    public $editProduct = " UPDATE Product SET title = :title, price = :price, stockQuantity = :stockQuantity, description = :description, 
                            isDailySpecial = :isDailySpecial, country = :country, brand = :brand, productImage = :productImage, productTypeID = :productTypeID, 
                            discountID = :discountID
                            WHERE productID = :productID";


    public $deleteProduct = "DELETE FROM Product WHERE productID = :productID";
}

$AdminProductModel = new AdminProductModel();
