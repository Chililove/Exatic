<?php
class HomeModel
{
    public $productsDaily = "SELECT `productID`, `title`, `price`, `stockQuantity`, `description`, `productImage`, `isDailySpecial` FROM `Product` ORDER BY  RAND(CURDATE()) LIMIT 1";
    public $productsNews =  "SELECT * FROM `Product` ORDER BY productID DESC LIMIT 3";
}
$HomeModel = new HomeModel();