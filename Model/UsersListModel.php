<?php
class UsersListModel
{
    public $usersList = "SELECT u.userID, u.firstName, u.lastName, u.email, a.streetName, a.streetNumber, a.streetNumber, pc.cityName
                        FROM user u, address a, postalcode pc WHERE u.addressID = a.addressID AND a.postalCodeID = pc.postalCodeID";
}
$UsersListModel = new UsersListModel();
