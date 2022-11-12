<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("rootPath.php");

require $rootPath . "Model/SignUpModel.php";
require $rootPath . "Controller/SignUpController.php";
require $rootPath . "View/Signup.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if ($conn == false) {
        echo ":'(";
    }

    $firstName = trim(mysqli_real_escape_string($conn, $_POST['firstName']));
    $lastName = trim(mysqli_real_escape_string($conn, $_POST['lastName']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    $streetName = trim(mysqli_real_escape_string($conn, $_POST['streetName']));
    $streetNumber = trim(mysqli_real_escape_string($conn, $_POST['streetNumber']));

    $cityName = trim(mysqli_real_escape_string($conn, $_POST['cityName']));
    $postNumber = trim(mysqli_real_escape_string($conn, $_POST['postNumber']));
    $country = trim(mysqli_real_escape_string($conn, $_POST['country']));

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


    // Prepare Statement

    //Transaction - autocommit -> commit / rollback
    $conn->autocommit(false);

    $iterations = ['cost' => 6];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

    // I added the postalcode table columns to the address table. There is no need for the postalcode table. So I made the signup without the postalcode table..
    //meaning I connected address and user..
    // else we need to find a way to bind postalcode in insert, since we are not inserting a now postal code row when we make a new address.. it needs to refer to the specific postal code.

    // i deleted apartment number from DB since we dont even have an input field in the signup form.


    //  $postalQuery = "INSERT INTO postalCode (postNumber, cityName, country) VALUE (?, ?, ?)";
    $handle = $conn->prepare($postalQuery);
    $handle->bind_param('sss', $postNumber, $cityName, $country);
    $postalQueryResult = $handle->execute();
    $postalID = $conn->insert_id;

    //  $addressQuery = "INSERT INTO `address` (streetName, streetNumber, postalID) VALUE (?, ?, ?)";
    $handle = $conn->prepare($addressQuery);
    $handle->bind_param('sss', $streetName, $streetNumber, $postalID);
    $addressResult = $handle->execute();
    $addressID = $conn->insert_id;


    // $userQuery = "INSERT INTO `user` (firstName, lastName, email, password, userType, addressID) VALUES (?, ?, ?, ?, 1, ?)";
    $handle = $conn->prepare($userQuery);
    $handle->bind_param('ssssss', $firstName, $lastName, $email, $hashed_password, $userType, $addressID);
    $userResult = $handle->execute();


    if ($postalQueryResult && $addressResult && $userResult) {
        $conn->commit();
        $message = "Registered";
    } else {
        $conn->rollback();
        $message = "User could not be registered";
        $message .= "<br />" . mysqli_error($conn);
    }
}
