<?php
class ProfileModel
{

    public $allPostalSelect = "SELECT postalCodeID, postNumber, cityName FROM PostalCode";

    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName`  FROM `User` u JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = ?";

    public $updateUser = "UPDATE User u, `Address` a, PostalCode p (`userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName`) JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = ?";

    public $userInsert = "INSERT INTO `User` (firstName, lastName, email, password, addressID) VALUES (?, ?, ?, ?, 1, ?) WHERE userID = ?";
    public $addressInsert = "INSERT INTO `Address` (streetName, streetNumber, postalCodeID) VALUES (?, ?, ?)";
}
$ProfileModel = new ProfileModel();
