<?php
class SignUpModel
{
    public $postalSelect = "SELECT postalCodeID FROM PostalCode WHERE postNumber = ?";
    public $userInsert = "INSERT INTO `User` (firstName, lastName, email, password, userType, addressID) VALUES (?, ?, ?, ?, 1, ?)";
    public $addressInsert = "INSERT INTO `Address` (streetName, streetNumber, postalCodeID) VALUES (?, ?, ?)";
    public $allPostalSelect = "SELECT postalCodeID, postNumber, cityName FROM PostalCode";
    public $duplicateEmail = "SELECT email FROM user WHERE email = 'email'";
}
$SignupModel = new SignUpModel();
