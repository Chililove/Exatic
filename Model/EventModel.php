<?php
class EventModel
{
    public $eventList = "SELECT * From Discount";
    public $createEvent = "INSERT INTO Discount ( eventName, description, discountProcent, startDate, endDate) VALUES ( :eventName, :description, :discountProcent, :startDate, :endDate )";
}
$EventModel = new EventModel();



// evt ALTER TABLE with constraints and referrences