<?php

class ContactModel
{
    public $owner = "SELECT email FROM User WHERE userID = 1";
    public $address = "SELECT streetName, streetNumber FROM `Address` WHERE addressID=1";
}
$ContactModel = new ContactModel();
