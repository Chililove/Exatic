<?php
class AdminOverviewModel
{
    public $EventDiscount = "SELECT * FROM Discount WHERE eventName = 'Halloween' Limit 1";
    public $CountryProduct = "SELECT country, COUNT(country)
                                FROM Product
                                GROUP BY country
                                HAVING COUNT(country) > 0";
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
};
$AdminOverviewModel = new AdminOverviewModel();
