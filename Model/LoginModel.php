<?php
class LoginModel
{
    public $selectQuery = "SELECT * FROM `User` WHERE `email` = :email LIMIT 1";
}
$LoginModel = new LoginModel();
