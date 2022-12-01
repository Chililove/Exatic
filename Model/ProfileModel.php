<?php
class ProfileModel
{
    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`  FROM `User` WHERE userID = 1";
    public $product_details = "SELECT * FROM User u, Address a, postalCode p WHERE u.addressID = a.addressID AND a.postalCodeID = p.postalCodeID AND u.userType=0 LIMIT 1;";

}
$ProfileModel = new ProfileModel();
