<?php

class AdminProductModel
{
    public $product_list = "SELECT * FROM adminproductlist";
    public $productType = "SELECT * FROM ProductType";
    public $discount = "SELECT * FROM Discount";
    public $addProduct = "INSERT INTO Product (title, price, stockQuantity, description, isDailySpecial, country, brand, productImage, productTypeID, discountID)
                          VALUE (:title, :price, :stockQuantity, :description, :isDailySpecial, :country, :brand, :productImage, :productTypeID, :discountID )";

    public $editProduct = " UPDATE Product SET `title` = :title, `price` = :price, `stockQuantity` = :stockQuantity, `description` = :description, 
                            `isDailySpecial` = :isDailySpecial, `country` = :country, `brand` = :brand, `productTypeID` = :productTypeID, 
                            `discountID` = :discountID
                            WHERE Product.`productID` = :productID";

    public $deleteProduct = "DELETE FROM Product WHERE productID = :productID";
}

$AdminProductModel = new AdminProductModel();
