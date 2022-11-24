<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$errorEmail = false;
$signupSucess = false;
$error = false;

$cities = $conn->query($SignupModel->allPostalSelect);


// when i use this same function in logincontroller, where do i put it?
function sanitize($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Here we sanitize all the incoming data
$sanitized = array_map('sanitize', $_POST);


if ($_SERVER['REQUEST_METHOD'] == "POST") {



    $firstName = htmlspecialchars($sanitized['firstName']);
    $lastName = htmlspecialchars($sanitized['lastName']);
    $email = htmlspecialchars($sanitized['email']);
    $password = htmlspecialchars($sanitized['password']);

    $streetName = htmlspecialchars($sanitized['streetName']);
    $streetNumber = htmlspecialchars($sanitized['streetNumber']);

    $postalCodeID = htmlspecialchars($sanitized['postalCodeID']);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password) && !empty($streetName) && !empty($streetNumber) && !empty($postalCodeID)) {



        // Prepare Statement
        //Transaction - autocommit -> commit / rollback
        $conn->autocommit(false);

        $iterations = ['cost' => 6];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);


        $handle = $conn->prepare($SignupModel->addressInsert);
        $handle->bind_param('ssi', $streetName, $streetNumber, $postalCodeID);
        $addressResult = $handle->execute();
        $addressID = $conn->insert_id;


        $handle = $conn->prepare($SignupModel->userInsert);
        $handle->bind_param('ssssi', $firstName, $lastName, $email, $hashed_password, $addressID);
        $userResult = $handle->execute();
        $conn->commit();
        $signupSucess = true;

        /* if ($email === ['email']) {
       
        $signupSucess = true;
    } else {
        $errorEmail = true;
        $conn->rollback();
    } */
        // Missing error message working , userResult has email which is unique therefore it fails, but it shouldn't fail
        //it should sent error message to user about email..

        /*  if ($userResult) {
        $conn->commit();

        $signupSucess = true;
    } else {
        $errorEmail = true;

       
    } */
    } else {
        $error = true;
        $conn->rollback();
    }
}
