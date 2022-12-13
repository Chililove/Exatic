<?php
class UserViewModel
{
public $userView = "SELECT * FROM `Order` WHERE userID = :userID";
}

$UserViewModel = new UserViewModel();
