<?php
class AdminProfileModel
{
    public $CountryProduct = "SELECT country, COUNT(country),
                                SUM(stockQuantity) AS totalQuantity
                                FROM Product
                                GROUP BY country
                                HAVING COUNT(country) > 0;";
    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`, `userType`, `streetName`, `streetNumber`, a.`postalCodeID`, `postNumber`, `cityName` FROM `User` u JOIN `Address` a ON a.addressID = u.addressID JOIN `PostalCode` p on p.postalCodeID = a.postalCodeID WHERE userID = :userID";
    public  $CompanyEdit = "UPDATE `companyinfo` SET `companyDescription` = :companyDescription, `weekdays` = :weekdays, `weekends` = :weekends, `openingHours` = :openingHours, `weekendHours` = :weekendHours, `addressID` = 1 WHERE CompanyInfo.`companyInfoID` = 1;";
    public  $CompanyRead = "SELECT * FROM CompanyInfo";

}

$AdminProfileModel = new AdminProfileModel();
