<?php
class SignupModel
{
    public $postalQuery = "INSERT INTO postalCode (postNumber, cityName, country) VALUES (?, ?, ?)";
    public $userQuery = "INSERT INTO `user` (firstName, lastName, email, password, userType, addressID) VALUES (?, ?, ?, ?, 1, ?)";
    public $addressQuery = "INSERT INTO `address` (streetName, streetNumber, postalID) VALUES (?, ?, ?)";
}
$SignupModel = new SignupModel();
