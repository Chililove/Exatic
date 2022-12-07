<?php
$adminId = (int)$_SESSION["userID"];


$CountryResult = $conn->query($AdminProfileModel->CountryProduct);
// $CountProductIDResult = $conn->query($AdminProfileModel->CountProductID);
// $CountDiscountIDResult = $conn->query($AdminProfileModel->CountdiscountID);
// $CountUserIDResult = $conn->query($AdminProfileModel->CountUserID);

$handleAdmin = $conn->prepare($AdminProfileModel->user);
$handleAdmin->bindParam(':userID', $adminId, PDO::PARAM_INT);
$handleAdmin->execute();
$AdminProfileResult = $handleAdmin->fetchAll();

$user = $AdminProfileResult[0];
