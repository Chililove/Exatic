<?php
class AdminProfileModel
{
    public $CountryProduct = "SELECT country, COUNT(country),
                                SUM(stockQuantity) AS totalQuantity
                                FROM Product
                                GROUP BY country
                                HAVING COUNT(country) > 0;";
    public $CountProductID = "SELECT productID, COUNT(productID)
                                FROM Product
                                HAVING COUNT(discountID) > 0";
    public $CountdiscountID = "SELECT discountID, COUNT(discountID)
                                FROM Discount
                                HAVING COUNT(discountID) > 0";
    public $CountUserID = "SELECT userType, COUNT(userID)
                                FROM User
                                WHERE userType = 1
                                HAVING COUNT(userID) > 0";
    public $AdminProfile = "SELECT * FROM User u, Address a, PostalCode p WHERE u.addressID = a.addressID AND a.postalCodeID = p.postalCodeID AND u.userType=0 LIMIT 1";
};
$AdminProfileModel = new AdminProfileModel();
