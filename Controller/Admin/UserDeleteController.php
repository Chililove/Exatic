<?php
$deleteUser = $_SERVER['QUERY_STRING'];
$query = "DELETE FROM User WHERE userID = $deleteUser";
$result = mysqli_query($conn, $query);

if ($result) {
    // header("Refresh:0");
} else {
    'query error: ' . mysqli_error($conn);
}
