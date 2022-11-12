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

            $Event = "INSERT INTO Discount (eventName, description, discountProcent, startDate, endDate) values ('$eventName', '$description','$discountProcent','$startDate', '$endDate')";
            $result3 = mysqli_query($conn, $Event);
        }

} else {
}
