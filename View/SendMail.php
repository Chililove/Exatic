<?php
$myemail = "exaticproject@gmail.com";
$email = $_POST['email'];
$subject = $_POST['subject'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$message = $_POST['message'] . "/n/n MVH /n" . $firstName . $lastName;
$regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";
$nameValid = "/^[A-Z][.]-$/";
$msgValid = "/^[A-z]{2,}$/";
if (!isset($_POST['email'])) {
    header("Location: http://localhost:8886/Exatic/contact.php?msgid=1");
} elseif (empty($_POST['email'] || empty($_POST['myemail']) || $_POST['subject']  || $_POST['firstName'] || $_POST['lastName'] || $_POST['message'])) {
    header("Location: http://localhost/Exercise3/contact.php?msgid=2");
} elseif (!preg_match($regexp, $_POST['email'])) {
    header("Location: http://localhost:8886/Exatic/contact.php?msgid=3");
} elseif (!preg_match($nameValid, $_POST['firstName'], $_POST['lastName'])) {
    header("Location: http://localhost:8886/Exatic/contact.php?msgid=4");
} elseif (!preg_match($msgValid, $_POST['message'])) {
    header("Location: http://localhost:8886/Exatic/contact.php?msgid=5");
} else {
    
    mail($myemail, "Form: $email\n", $subject, $firstName, $lastName, $message);
    header("Location: http://localhost:8886/Exatic/response.php");
}
