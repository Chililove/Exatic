<?php
require("constants.php");
/* $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
if (!$conn) {
    die("Disconnected!");
}
$db = mysqli_select_db($conn, DB_NAME);
if (!$db) {
    die("error:" . mysqli_error($conn)); 
} */

try {
    $conn = new PDO(DSN, DB_USER, DB_PASS);
} catch (PDOException $err) {
    echo 'Connection failed:' . $err->getMessage();
}
