<?php
class ProfileModel
{
    // all cities
    public $allPostalSelect = "SELECT postalCodeID, postNumber, cityName FROM PostalCode";

    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName` FROM `User` u JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = :userID";
    public $addressID = "SELECT `addressID` FROM `User` WHERE userID = :userID";
    // update user 
    public $updateUser = "UPDATE User SET `firstName` = :firstName, `lastName` = :lastName, `email` = :email WHERE userID = :userID";
    public $updateAddress = "UPDATE `Address` SET `streetName` = :streetName, `streetNumber` = :streetNumber, `postalCodeID` = :postalCodeID WHERE addressID = :addressID";

    // get all orders for logged in user
    public $allOrdersUser = "SELECT `orderID`, `dateOrdered`, `dateDelivered`, `status`, `userID` FROM `Order` WHERE userID = :userID";
    public $orderDetails = "SELECT `orderID`, `p.productID`, `orderDetailID`, `quantity`, `price`, `procent` FROM OrderDetail od JOIN Order o ON od.orderID = o.orderID JOIN Product p ON od.productID = p.productID WHERE orderId = :orderID";


    public function update($conn, $userid, $firstName, $lastName, $email, $imagePath, $streetName, $streetNumber, $postalCodeID)
    {
        $handleAddressID = $conn->prepare($this->addressID);
        $handleAddressID->bindParam(':userID', $userid, PDO::PARAM_INT);
        $handleAddressID->execute();
        $resultA = $handleAddressID->fetchAll();
        $addressID = ($resultA[0])['addressID'];

        $handle = $conn->prepare($this->updateUser);
        $handle->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $handle->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $handle->bindParam(':email', $email, PDO::PARAM_STR);
        // $handle->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
        $handle->bindParam(':userID', $userid, PDO::PARAM_INT);
        //$userResult = $handle->execute();
        $handle->execute();

        $handleAddress = $conn->prepare($this->updateAddress);

        $handleAddress->bindParam(':streetName', $streetName, PDO::PARAM_STR);
        $handleAddress->bindParam(':streetNumber', $streetNumber, PDO::PARAM_STR);
        $handleAddress->bindParam(':postalCodeID', $postalCodeID, PDO::PARAM_INT);
        $handleAddress->bindParam(':addressID', $addressID, PDO::PARAM_INT);

        $addressResult = $handleAddress->execute();
    }
}
$ProfileModel = new ProfileModel();
