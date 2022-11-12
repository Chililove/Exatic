<?php
$EventResult = mysqli_query($conn, $AdminOverviewModel->EventDiscount);
$ProductCountResult = mysqli_query($conn, $AdminOverviewModel->CountProduct);
$countryResult = mysqli_query($conn, $AdminOverviewModel->CountryProduct);