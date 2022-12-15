<?php

class FooterModel
{
    public $addressFooter = "SELECT streetName, streetNumber FROM Address WHERE addressID=1";
    public $ownerFooter = "SELECT email FROM User WHERE userID = 1";
    public  $companyInfoFooter = "SELECT * FROM CompanyInfo";

}
$FooterModel = new FooterModel();
