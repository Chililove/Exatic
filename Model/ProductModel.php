<?php
class ProductModel
{
    public $products = "SELECT * FROM Product ORDER BY productID ASC";
    public $productType = "SELECT * FROM ProductType";
}
$ProductModel = new ProductModel();
