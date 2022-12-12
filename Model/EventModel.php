<?php
class EventModel
{
    public $eventList = "SELECT * From Discount";
    public $createEvent = "INSERT INTO Discount ( eventName, description, discountProcent, startDate, endDate) VALUES ( :eventName, :description, :discountProcent, :startDate, :endDate )";
    public $editEvent = "UPDATE Discount SET `eventName` = :eventName, `description` = :description, `discountProcent` = :discountProcent, `startDate` = :startDate, `endDate` = :endDate WHERE Discount.`discountID` = :discountID";
    public $deleteEvent = "DELETE FROM Discount WHERE discountID = :discountID";
}
$EventModel = new EventModel();



// evt ALTER TABLE with constraints and referrences