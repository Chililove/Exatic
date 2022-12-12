<?php
class ProfileModel
{
    // all cities
    public $allPostalSelect = "SELECT postalCodeID, postNumber, cityName FROM PostalCode";

    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName` FROM `User` u JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = :userID";
    public $addressID = "SELECT `addressID` FROM `User` WHERE userID = :userID";
    // update user 
    public $updateUser = "UPDATE User SET `firstName` = :firstName, `lastName` = :lastName, `email` = :email, `imagePath` = :imagePath WHERE userID = :userID";
    public $updateAddress = "UPDATE `Address` SET `streetName` = :streetName, `streetNumber` = :streetNumber, `postalCodeID` = :postalCodeID WHERE addressID = :addressID";

    // get all orders for logged in user
    public $allOrdersUser = "SELECT `orderID`, `dateOrdered`, `dateDelivered`, `status`, `userID` FROM `Order` WHERE userID = :userID";
    public $orderDetails = "SELECT `orderID`, `p.productID`, `orderDetailID`, `quantity`, `price`, `procent` FROM OrderDetail od JOIN Order o ON od.orderID = o.orderID JOIN Product p ON od.productID = p.productID WHERE orderId = :orderID";


}
$ProfileModel = new ProfileModel();
