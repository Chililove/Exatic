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
}

$AdminProfileModel = new AdminProfileModel();
