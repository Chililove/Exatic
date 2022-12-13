<?php
class AdminProfileModel
{
    public $CountryProduct = "SELECT country, COUNT(country),
                                SUM(stockQuantity) AS totalQuantity
                                FROM Product
                                GROUP BY country
                                HAVING COUNT(country) > 0;";
    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName` FROM `User` u JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = :userID";
    public  $companyEdit = "UPDATE CompanyInfo SET `companyDescription` = :companyDescription, `weekdays` = :weekdays, `weekends` = :weekends, `openingHours` = :openingHours, `weekendHours` = :weekendHours, `addressID` = :addressID WHERE CompanyInfo.`companyInfoID` = :companyInfoID";
    public  $CompanyRead = "SELECT * FROM CompanyInfo";
    public $addressRead = "SELECT * FROM Address a, PostalCode p WHERE  a.postalCodeID = p.postalCodeID AND addressID = 1";
    public $addressEdit = "UPDATE Address SET `streetName` = :streetName, `streetNumber` = :streetNumber, `postalCodeID` = :postalCodeID WHERE Address.`addressID` = :addressID";
    public $userRead = "SELECT * FROM User WHERE userID = 1";
    public $userEdit = "UPDATE User SET `firstName` = :firstName, `lastName` = :lastName, `email` = :email, `password` = :password,`userType` = :userType,`imagePath` = :imagePath, `addressID` = :addressID WHERE User.`userID` = :userID";
    public $companyRead = "SELECT * FROM CompanyInfo WHERE companyInfoID = 1";
}

$AdminProfileModel = new AdminProfileModel();
