<?php require_once("../connection/conn.php"); ?>



<?php

if (isset($POST['submit'])) {
    $firstname = trim(mysqli_real_escape_string($conn, $_POST['firstName']));
    $lastname = trim(mysqli_real_escape_string($conn, $_POST['lastName']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    //$street = trim(mysqli_real_escape_string($conn, $_POST['street']));
    //$stnum = trim(mysqli_real_escape_string($conn, $_POST['stnum']));
    //$postcode = trim(mysqli_real_escape_string($conn, $_POST['$postcode']));
    //$city = trim(mysqli_real_escape_string($conn, $_POST['city']));
    //$country = trim(mysqli_real_escape_string($conn, $_POST['country']));


    $iterations = ['cost' => 15];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

    $query = "INSERT INTO `user` (firstName, lastName, email, password, userType) VALUES ('{$firstname}','{$lastname}','{$email}', '{$hashed_password}', 1)";
    //$query2 = "INSERT INTO ´address´(street, steetnumber, postelcode, city, country) VALUE ('{$street}','{$stnum}','{$postcode}','{$city}', '{$country}')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message = "Registered";
    }else {
        $message = "User could not be registered";
        $message .= "<br />" . mysqli_error($conn);
    }
}

if (!empty($message)) {echo "<p>" . $message . "</p>";}
