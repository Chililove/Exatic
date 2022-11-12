<?php
class AdminOverviewModel
{
    public $EventDiscount = "SELECT * FROM Discount Limit 1";
    public $CountProduct = "SELECT COUNT(*) as stockQuantity FROM Product";
    public $CountryProduct = "SELECT country, COUNT(country)
                                FROM product
                                GROUP BY country
                                HAVING COUNT(country) > 0";

}
$AdminOverviewModel = new AdminOverviewModel();