<?php require_once("../connection/conn.php"); ?>



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

    $query = "INSERT INTO ´user´ (fname, lname, email, pass, user_type) VALUES ('{$fname}','{$lname}','{$email}', '{$hashed_password}', 'user')";
    $query2 = "INSERT INTO ´address´(street, steetnumber, postelcode, city, country) VALUE ('{$street}','{$stnum}','{$postcode}','{$city}', '{$country}')";
    $result = mysqli_query($conn, $query, $query2);
        if ($result) {
            $message = "Registered";
        }else {
            $message = "User could not be registered";
            $message .= "<br />" . mysqli_error($conn);
        }
}

if (!empty($message)) {echo "<p>" . $message . "</p>";}

