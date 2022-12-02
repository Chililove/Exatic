<?php
class ProfileModel
{

    public $allPostalSelect = "SELECT postalCodeID, postNumber, cityName FROM PostalCode";

    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName`  FROM `User` u JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = ?";
}
$ProfileModel = new ProfileModel();
