<?php
$userid = (int)$_SESSION["userID"];
$cities = $conn->query($ProfileModel->allPostalSelect);

$updateSucess = false;
$error = false;
$errorTransaction = false;

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

        try {
            $conn->beginTransaction();

            $handleAddressID = $conn->prepare($ProfileModel->addressID);
            $handleAddressID->bindParam(':userID', $userid, PDO::PARAM_INT);
            $handleAddressID->execute();
            $resultA = $handleAddressID->fetchAll();
            $addressID = ($resultA[0])['addressID'];

            $handle = $conn->prepare($ProfileModel->updateUser);
            $handle->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $handle->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $handle->bindParam(':email', $email, PDO::PARAM_STR);
            $handle->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
            $handle->bindParam(':userID', $userid, PDO::PARAM_INT);
            $userResult = $handle->execute();


            $handleAddress = $conn->prepare($ProfileModel->updateAddress);

            $handleAddress->bindParam(':streetName', $streetName, PDO::PARAM_STR);
            $handleAddress->bindParam(':streetNumber', $streetNumber, PDO::PARAM_STR);
            $handleAddress->bindParam(':postalCodeID', $postalCodeID, PDO::PARAM_INT);
            $handleAddress->bindParam(':addressID', $addressID, PDO::PARAM_INT);

            $addressResult = $handleAddress->execute();
            $conn->commit();
            $updateSucess = true;
        } catch (Exception $err) {
            $errorTransaction = true;
            $conn->rollback();
        }
    } else {
        $error = true;
    }
}
$handle = $conn->prepare($ProfileModel->user);
$handle->bindParam(':userID', $userid, PDO::PARAM_INT);
$handle->execute();
$result = $handle->fetchAll();

$user = $result[0];
