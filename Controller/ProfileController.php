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

            $ProfileModel->update($conn, $userid, $firstName, $lastName, $email, $imagePath, $streetName, $streetNumber, $postalCodeID);

            $conn->commit();
            $updateSucess = true;
        } catch (Exception $err) {
            var_dump($err);
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
