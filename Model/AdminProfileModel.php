<?php
class AdminProfileModel
{
    public $CountryProduct = "SELECT country, COUNT(country),
                                SUM(stockQuantity) AS totalQuantity
                                FROM Product
                                GROUP BY country
                                HAVING COUNT(country) > 0;";
    // public $CountProductID = "SELECT productID, COUNT(productID)
    //                             FROM Product
    //                             HAVING COUNT(discountID) > 0";
    // public $CountdiscountID = "SELECT discountID, COUNT(discountID)
    //                             FROM Discount
    //                             HAVING COUNT(discountID) > 0";
    // public $CountUserID = "SELECT userType, COUNT(userID)
    //                             FROM User
    //                             WHERE userType = 1
    //                             HAVING COUNT(userID) > 0";
    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName` FROM `User` u JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = :userID";
   public  $CompanyEdit = "UPDATE `CompanyInfo` SET `companyDescription` = :companyDescription WHERE `companyInfoID` = :companyInfoID";
}

$AdminProfileModel = new AdminProfileModel();
