<?php

$editEvent = $_SERVER['QUERY_STRING'];
$product_details = "SELECT * FROM Discount  WHERE discountID = $editEvent";
class EventEditModel
{

    public $editEvent = "UPDATE Discount SET `eventName` = :eventName, `description` = :description, `discountProcent` = :discountProcent, `startDate` = :startDate, `endDate` = :endDate WHERE Discount.`discountID` = :discountID";
}
$EventEditModel = new EventEditModel();



// evt ALTER TABLE with constraints and referrences