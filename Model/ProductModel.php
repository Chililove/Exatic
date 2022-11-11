<?php
class ProductModel
{
    public $products = "SELECT * FROM Product ORDER BY productID ASC";
}
$ProductModel = new ProductModel();
