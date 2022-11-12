<?php require("connection/conn.php");
if (!isset($_SESSION)) {
    session_start();
}
include("View/_partials/header.php");

require("router.php");

include("View/_partials/footer.php");
