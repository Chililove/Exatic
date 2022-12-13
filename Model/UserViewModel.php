<?php
$userId = $_GET['userID'];
$orders = "SELECT * FROM `Order` WHERE userID = $userId";


class UserViewModel
{
    public $statusEdit = "UPDATE `Order` SET `dateOrdered` = :dateOrdered, `dateDelivered` = :dateDelivered, `status` = :status, `userID` = :userID WHERE `Order`.`orderID` = :orderID";
}

$UserViewModel = new UserViewModel();
