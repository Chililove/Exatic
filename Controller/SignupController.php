<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$signup = isset($_GET['checkout']);
$errorEmail = false;
$signupSucess = false;
$error = false;

$cities = $conn->query($SignupModel->allPostalSelect);


if ($_SERVER['REQUEST_METHOD'] == "POST") {



    $firstName = htmlspecialchars($sanitized['firstName']);
    $lastName = htmlspecialchars($sanitized['lastName']);
    $email = htmlspecialchars($sanitized['email']);
    $password = htmlspecialchars($sanitized['password']);

    $streetName = htmlspecialchars($sanitized['streetName']);
    $streetNumber = htmlspecialchars($sanitized['streetNumber']);

    $postalCodeID = htmlspecialchars($sanitized['postalCodeID']);
    $userType = ['userType'];

    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password) && !empty($streetName) && !empty($streetNumber) && !empty($postalCodeID)) {



        // Prepare Statement
        //Transaction - autocommit -> commit / rollback


        $conn->beginTransaction();

        $iterations = ['cost' => 6];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);


        $handle = $conn->prepare($SignupModel->addressInsert);
        $handle->bindParam(':streetName', $streetName, PDO::PARAM_STR);
        $handle->bindParam(':streetNumber', $streetNumber, PDO::PARAM_STR);
        $handle->bindParam(':postalCodeID', $postalCodeID, PDO::PARAM_INT);
        $addressResult = $handle->execute();
        $addressID = $conn->lastInsertId();

        $handle = $conn->prepare($SignupModel->userInsert);
        $handle->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $handle->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $handle->bindParam(':email', $email, PDO::PARAM_STR);
        $handle->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $handle->bindParam(':addressID', $addressID, PDO::PARAM_INT);
        $userResult = $handle->execute();
        $conn->commit();
        $signupSucess = true;
    } else {
        $error = true;
        $conn->rollback();
    }
}
