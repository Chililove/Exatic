<?php
require_once("DB/connection/conn.php");
if (!isset($_SESSION)) {
    session_start();
}
// sanitaze
function sanitize($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
// Here we sanitize all the incoming data
$sanitized = array_map('sanitize', $_POST);


include("View/_partials/header.php");

require("router.php");

include("View/_partials/footer.php");
