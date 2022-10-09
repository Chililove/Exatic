<?php require_once("../database/conn.php"); ?>



<?php

if (isset($POST['submit'])) {
    $fname = trim(mysqli_real_escape_string($conn, $_POST['fname']));
    $lname = trim(mysqli_real_escape_string($conn, $_POST['lname']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['user']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['pass']));
    $street = trim(mysqli_real_escape_string($conn, $_POST['street']));
    $stnum = trim(mysqli_real_escape_string($conn, $_POST['stnum']));
    $postcode = trim(mysqli_real_escape_string($conn, $_POST['$postcode']));
    $city = trim(mysqli_real_escape_string($conn, $_POST['city']));
    $country = trim(mysqli_real_escape_string($conn, $_POST['country']));


    $iterations = ['cost' => 15];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

    $query = "INSERT INTO login (fname, lname, email, pass, street, stnum, postcode, city, country, user_type) VALUES ('{$fname}','{$lname}','{$email}', '{$hashed_password},' '{$street}','{$stnum}','{$postcode}','{$city}', '{$country}', 'user')";
    $result = mysqli_query($conn, $query);
        if ($result) {
            $message = "Registered";
        }else {
            $message = "User could not be registered";
            $message .= "<br />" . mysqli_error($conn);
        }
}

if (!empty($message)) {echo "<p>" . $message . "</p>";}

