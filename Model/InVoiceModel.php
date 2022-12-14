<?php
$orderId = $_GET['orderID'];
$ordersDetail = "SELECT * FROM `OrderDetail` WHERE orderID = $orderId";
$ordersDate = "SELECT * FROM `Order` WHERE orderID = $orderId";
$ordersTotal = "SELECT SUM(price) AS totalQuantity
                FROM Orderdetail
                WHERE orderID = $orderId";
$ordersUser = "SELECT * FROM `Order` o, `User` u, `Address` a, `Postalcode` p WHERE o.userID = u.userID AND u.addressID = a.addressID AND a.postalCodeID = p.postalCodeID AND o.orderID = $orderId";
class InVoiceModel
{

public $orderCompany = "SELECT * FROM `CompanyInfo` c, `Address` a, `Postalcode` p WHERE c.addressID = a.addressID AND a.postalCodeID = p.postalCodeID";
}

$InVoiceModel = new InVoiceModel();
