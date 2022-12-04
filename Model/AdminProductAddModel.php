<?php
class AdminProductAddModel
{
    public $productType = "SELECT * FROM ProductType";
    public $discount = "SELECT * FROM Discount";
    public $addProduct = "INSERT INTO Product (title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (?, ?, ?, ?,1,  1, ?, ?, ?, ?, ?,? )";
}
$AdminProductAddModel = new AdminProductAddModel();
