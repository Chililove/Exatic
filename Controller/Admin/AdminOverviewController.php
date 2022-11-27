<?php
$EventResult = mysqli_query($conn, $AdminOverviewModel->EventDiscount);
$CountryResult = mysqli_query($conn, $AdminOverviewModel->CountryProduct);
$CountProductIDResult = mysqli_query($conn, $AdminOverviewModel->CountProductID );
$CountDiscountIDResult = mysqli_query($conn, $AdminOverviewModel->CountdiscountID );
$CountUserIDResult = mysqli_query($conn, $AdminOverviewModel->CountUserID );
