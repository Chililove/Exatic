<?php

class OrderModel
{

    public $orderInsert = "INSERT INTO `Order` (`dateOrdered`, `status`, `userID`) VALUES (NOW(), :status, :userID)";
    public $orderDetailsInsert = "INSERT INTO `OrderDetail` (quantity, price, procent, orderID, productID) VALUES (:quantity, :price, :procent, :orderID, :productID)";
}
$OrderModel = new OrderModel();
