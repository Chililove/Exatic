<?php
$CountryResult = $conn->query($AdminOverviewModel->CountryProduct);
$CountProductIDResult = $conn->query($AdminOverviewModel->CountProductID);
$CountDiscountIDResult = $conn->query($AdminOverviewModel->CountdiscountID);
$CountUserIDResult = $conn->query($AdminOverviewModel->CountUserID);
$AdminProfileResult = $conn->query($AdminOverviewModel->AdminProfile);
