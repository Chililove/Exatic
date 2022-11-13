<?php
class SignupModel
{
    public $postalSelect = "SELECT postalCodeID FROM postalCode WHERE postNumber = ?";
    public $userInsert = "INSERT INTO `user` (firstName, lastName, email, password, userType, addressID) VALUES (?, ?, ?, ?, 1, ?)";
    public $addressInsert = "INSERT INTO `address` (streetName, streetNumber, postalCodeID) VALUES (?, ?, ?)";
    public $allPostalSelect = "SELECT postalCodeID, postNumber, cityName FROM postalCode";
}
$SignupModel = new SignupModel();
