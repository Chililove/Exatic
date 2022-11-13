<?php
class LoginModel
{
    public $selectQuery = "SELECT * FROM `user` WHERE `email` = ? LIMIT 1";
}
$LoginModel = new LoginModel();
