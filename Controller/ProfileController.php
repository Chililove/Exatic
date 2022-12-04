<?php
$userid = (int)$_SESSION["userID"];
$cities = $conn->query($ProfileModel->allPostalSelect);

$updateSucess = false;
$error = false;

$handle = $conn->prepare($ProfileModel->user);
$handle->bindParam(':userID', $userid, PDO::PARAM_INT);
$handle->execute();
$result = $handle->fetchAll();

$user = $result[0];


// trying to display all orders for logged in user
$handleOrder = $conn->prepare($ProfileModel->allOrdersUser);
$handleOrder->bindParam(':userID', $userid, PDO::PARAM_INT);
$handleOrder->execute();
$orderResult = $handleOrder->fetchAll();

// Update user information on submit


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
        $handle->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $handle->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $handle->bindParam(':email', $email, PDO::PARAM_STR);
        $handle->bindParam(':addressID', $addressID, PDO::PARAM_INT);
        $handle->bindParam(':streetName', $streetName, PDO::PARAM_STR);
        $handle->bindParam(':streetNumber', $streetNumber, PDO::PARAM_STR);
        $handle->bindParam(':postalCodeID', $postalCodeID, PDO::PARAM_INT);
        $handle->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
        $result = $handle->execute();
        $conn->commit();
        $updateSucess = true;
    } else {
        $error = true;
        $conn->rollback();
    }
}
