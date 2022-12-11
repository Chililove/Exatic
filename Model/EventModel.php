<?php
class EventModel
{
    public $eventList = "SELECT * From Discount";
    public $createEvent = "INSERT INTO Discount ( eventName, description, discountProcent, startDate, endDate) VALUES ( :eventName, :description, :discountProcent, :startDate, :endDate )";
    public $deleteEvent = "DELETE FROM Discount WHERE discountID = :discountID";
}
$EventModel = new EventModel();
