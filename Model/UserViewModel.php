<?php
$userId = $_GET['userID'];
$orders = "SELECT * FROM `Order` WHERE userID = $userId";


class UserViewModel
{
    public $statusEdit = "UPDATE `Order` o, User u SET o.dateOrdered = :dateOrdered, o.dateDelivered = :dateDelivered, o.status = :status, o.userID = :userID WHERE o.userID = u.userID AND o.orderID = :orderID";
}

$UserViewModel = new UserViewModel();
