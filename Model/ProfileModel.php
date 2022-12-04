<?php
class ProfileModel
{
    // all cities
    public $allPostalSelect = "SELECT postalCodeID, postNumber, cityName FROM PostalCode";

    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName`  FROM `User` u JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = :userID";

    // update user 
    public $updateUser = "UPDATE User u, `Address` a, PostalCode p (`userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName`) JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = :userID";

    public $userInsert = "INSERT INTO `User` (firstName, lastName, email, password, userType, addressID) VALUES (:firstName, :lastName, :email, :password, 1, :addressID) WHERE userID = :userID";
    public $addressInsert = "INSERT INTO `Address` (streetName, streetNumber, postalCodeID) VALUES (:streetName, :streetNumber, :postalCodeID)";



    // get all orders for logged in user
    public $allOrdersUser = "SELECT `orderID`, `dateOrdered`, `dateDelivered`, `status`, `userID` FROM `Order` WHERE userID = :userID";
}
$ProfileModel = new ProfileModel();
