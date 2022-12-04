<?php
class SignUpModel
{
    public $postalSelect = "SELECT postalCodeID FROM PostalCode WHERE postNumber = ?";
    public $userInsert = "INSERT INTO `User` (firstName, lastName, email, password, userType, addressID) VALUES (:firstName, :lastName, :email, :password, 1, :addressID)";
    public $addressInsert = "INSERT INTO `Address` (streetName, streetNumber, postalCodeID) VALUES (:streetName, :streetNumber, :postalCodeID)";
    public $allPostalSelect = "SELECT postalCodeID, postNumber, cityName FROM PostalCode";
    public $duplicateEmail = "SELECT email FROM user WHERE email = 'email'";
}
$SignupModel = new SignUpModel();
