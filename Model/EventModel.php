<?php
class EventModel
{
    public $eventList = "SELECT * From Discount";
    public $Event = "INSERT INTO Discount (eventName, description, discountProcent, startDate, endDate) values ( ?, ?, ?, ?, ?)";
}
$EventModel = new EventModel();
