<?php

class OrderModel
{

    public $orderInsert = "INSERT INTO `Order` (`dateOrdered`, `dateDelivered`, `status`, `userID`) VALUES (NOW(), ADDDATE(CURDATE(),5), :status, :userID)";
    public $orderDetailsInsert = "INSERT INTO `OrderDetail` (title,quantity, price, procent,orderID, productID, priceOne) VALUES (:title, :quantity, :price, :procent, :orderID, :productID, :priceOne)";
}
$OrderModel = new OrderModel();
