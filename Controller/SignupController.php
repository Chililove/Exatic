<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$cities = $conn->query($SignupModel->allPostalSelect);


if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $firstName = trim(mysqli_real_escape_string($conn, $_POST['firstName']));
    $lastName = trim(mysqli_real_escape_string($conn, $_POST['lastName']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    $streetName = trim(mysqli_real_escape_string($conn, $_POST['streetName']));
    $streetNumber = trim(mysqli_real_escape_string($conn, $_POST['streetNumber']));

    $postalCodeID = trim(mysqli_real_escape_string($conn, $_POST['postalCodeID']));

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


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


    if ($addressResult && $userResult) {
        $conn->commit();
        $message = "Registered";
    } else {
        $conn->rollback();
        $message = "User could not be registered";
        $message .= "<br />" . mysqli_error($conn);
    }
}
