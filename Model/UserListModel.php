<?php
class UserListModel
{
    public $usersList = "SELECT u.userID, u.firstName, u.lastName, u.email, u.imagePath, a.streetName, a.streetNumber, a.streetNumber, pc.cityName
    FROM User u, Address a, PostalCode pc WHERE u.addressID = a.addressID AND u.userType = 1 AND a.postalCodeID = pc.postalCodeID";

}

$UserListModel = new UserListModel();
