<?php
$userid = $_SESSION["userID"];
$cities = $conn->query($ProfileModel->allPostalSelect);

$updateSucess = false;
$error = false;

$handle = $conn->prepare($ProfileModel->user);
$handle->bind_param('s', $userid);
$handle->execute();
$result = $handle->get_result();

$user = $result->fetch_assoc();















function sanitize($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

$sanitized = array_map('sanitize', $_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstName = htmlspecialchars($sanitized['firstName']);
    $lastName = htmlspecialchars($sanitized['lastName']);
    $email = htmlspecialchars($sanitized['email']);

    $streetName = htmlspecialchars($sanitized['streetName']);
    $streetNumber = htmlspecialchars($sanitized['streetNumber']);

    $postalCodeID = htmlspecialchars($sanitized['postalCodeID']);

    $imagePath = ['imagePath'];

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($streetName) && !empty($streetNumber) && !empty($postalCodeID)) {

        $conn->autocommit(false);

        

        $handle = $conn->prepare($ProfileModel->updateUser);
        $handle->bind_param('sssissi', $firstName, $lastName, $email, $addressID, $streetName, $streetNumber, $postalCodeID);
        $uID = $conn->$user;
        $result = $handle->execute();
        $conn->commit($uID);
        $updateSucess = true;

        
    } else {
        $error = true;
        $conn->rollback();
    }
}
