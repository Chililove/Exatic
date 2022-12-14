<?php

if (isset($_POST["send_email"])) {

    $myemail = "exaticproject@gmail.com";
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $message = $_POST['message'] . "/n/n MVH /n" . $firstName . $lastName;
    $regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";
    $msgValid = "/^[A-z]{2,}$/";
    if (!isset($_POST['email'])) {
        header("Location:http://localhost:8886/contact.php?msgid=1");
    } elseif (empty(($_POST['myemail']) || $_POST['subject'] ||  $_POST['firstName'] || $_POST['lastName'] || $_POST['message'])) {
        header("Location:http://localhost:8886/contact.php?msgid=2");
    } elseif (!preg_match($regexp, $_POST['email'])) {
        header("Location:http://localhost:8886/contact.php?msgid=3");
    } elseif (!preg_match($msgValid, $_POST['message'])) {
        header("Location:http://localhost:8886/contact.php?msgid=4");
    } else {
        //mail( string $myemail, string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )
        mail($myemail, "From: $email\n", $subject, $firstName, $message);
        // mail("From: $email\n", $subject, $firstName, $lastName, $message);
        header("Location: SendMail.php"); // Only for localhost!!!!Doesn't work on one.com
        //for one.com
        // $url = "http://exatic.store/contact/../SendMail.php";
        // echo ("<script>
        //   location.href = '$url'
        //</script>");
    }
}
