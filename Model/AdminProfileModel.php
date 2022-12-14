<?php
class AdminProfileModel
{
    public $CountryProduct = "SELECT * FROM countryproductcount GROUP BY country HAVING COUNT(country) > 0;";
    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName` FROM `User` u JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = :userID";
    public $companyEdit = "UPDATE CompanyInfo SET `companyDescription` = :companyDescription, `weekdays` = :weekdays, `weekends` = :weekends, `openingHours` = :openingHours, `weekendHours` = :weekendHours, `addressID` = :addressID WHERE CompanyInfo.`companyInfoID` = :companyInfoID";
    public $addressEdit = "UPDATE Address SET `streetName` = :streetName, `streetNumber` = :streetNumber, `postalCodeID` = :postalCodeID WHERE Address.`addressID` = :addressID";
    public $userRead = "SELECT * FROM User WHERE userID = 1";
    public $userEdit = "UPDATE User SET `firstName` = :firstName, `lastName` = :lastName, `email` = :email, `password` = :password,`userType` = :userType,`imagePath` = :imagePath, `addressID` = :addressID WHERE User.`userID` = :userID";
    public $companyRead = "SELECT * FROM CompanyInfo WHERE companyInfoID = 1";
    public $address = "SELECT * FROM `Address` WHERE addressID=1";
    public $ownerEmail = "SELECT * FROM User WHERE userID = 1";
}

$AdminProfileModel = new AdminProfileModel();
