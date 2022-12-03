<?php
$userid = $_SESSION["userID"];
$cities = $conn->query($ProfileModel->allPostalSelect);

$updateSucess = false;

$handle = $conn->prepare($ProfileModel->user);
$handle->bind_param('s', $userid);
$handle->execute();
$result = $handle->get_result();

$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $handle = $conn->prepare($ProfileModel->addressInsert);
    $handle->bind_param('ssi', $streetName, $streetNumber, $postalCodeID);
    $addressResult = $handle->execute();
    $addressID = $conn->insert_id;


    $handle = $conn->prepare($ProfileModel->userInsert);
    $handle->bind_param('sssi', $firstName, $lastName, $email, $addressID);
    $userResult = $handle->execute();
    $conn->commit();
    $updateSucess = true;




}
