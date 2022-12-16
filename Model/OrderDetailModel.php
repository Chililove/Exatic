<?php

$orderId = $_GET['orderID'];
$ordersDetail = "SELECT * FROM `OrderDetail` WHERE orderID = $orderId";
