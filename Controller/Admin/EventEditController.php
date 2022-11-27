<?php

if (isset($_POST['submit'])) {
    if (
        empty($_POST['eventName']) || empty($_POST['description']) || empty($_POST['discountProcent']) ||
        empty($_POST['startDate'])|| empty($_POST['endDate'])
    ) {
        echo 'Please fill in the blanks';
    } else {

        $eventName = trim(mysqli_real_escape_string($conn, $_POST['eventName']));
        $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
        $discountProcent = trim(mysqli_real_escape_string($conn, $_POST['discountProcent']));
        $startDate = trim(mysqli_real_escape_string($conn, $_POST['startDate']));
        $endDate = trim(mysqli_real_escape_string($conn, $_POST['endDate']));

        $eventEdit = "UPDATE Discount SET `eventName` ='" . $eventName . "', `description` ='" . $description . "', `discountProcent` ='" . $discountProcent . "', 
                    `startDate` ='" . $startDate . "', `endDate` ='" . $endDate ."' WHERE `discountID` = '" . $discountID . "'";
        echo $eventEdit;
        $result3 = mysqli_query($conn, $eventEdit);
        }

} else {
}
