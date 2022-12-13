<?php
$userId = $_GET['userID'];
$orders = "SELECT * FROM `Order` WHERE userID = $userId";
class UserViewModel
{
}

$UserViewModel = new UserViewModel();
