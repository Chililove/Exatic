<?php
class ProfileModel
{
    public $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`  FROM `User` WHERE userID = 1";
}
$ProfileModel = new ProfileModel();
