<?php
class SignUpModel
{
    public $postalQuery = "INSERT INTO postalCode (postNumber, cityName, country) VALUE (?, ?, ?)";
    public $userQuery = "INSERT INTO `user` (firstName, lastName, email, password, userType, addressID) VALUES (?, ?, ?, ?, 1, ?)";
    public $addressQuery = "INSERT INTO `address` (streetName, streetNumber, postalID) VALUE (?, ?, ?)";

}
$SignUpModel = new SignUpModel();
