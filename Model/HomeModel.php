<?php
class HomeModel
{
    public $productsDaily = "SELECT `productID`, `title`, `price`, `stockQuantity`, `description`, `productImage`, `isDailySpecial` FROM `Product` WHERE isDailySpecial = 1 LIMIT 1";
    public $productsNews =  "SELECT `productID`, `title`, `price`, `stockQuantity`, `description`, `productImage`, `isNew` FROM `Product` WHERE isNew = 1 LIMIT 3";
}
$HomeModel = new HomeModel();
