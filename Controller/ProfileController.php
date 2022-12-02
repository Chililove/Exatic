<?php
$userid = $_SESSION["userID"];
$cities = $conn->query($ProfileModel->allPostalSelect);


$handle = $conn->prepare($ProfileModel->user);
$handle->bind_param('s', $userid);
$handle->execute();
$result = $handle->get_result();

$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "drgrg";
}
