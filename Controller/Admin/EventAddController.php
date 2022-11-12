<?php

if (isset($_POST['submit'])) {
    if (
        empty($_POST['eventName']) || empty($_POST['description']) || empty($_POST['discountProcent']) ||
        empty($_POST['duration'])
    ) {
        echo 'Please fill in the blanks';
    } else {

        $eventName = trim(mysqli_real_escape_string($conn, $_POST['eventName']));
        $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
        $discountProcent = trim(mysqli_real_escape_string($conn, $_POST['discountProcent']));
        $duration = trim(mysqli_real_escape_string($conn, $_POST['duration']));

            $Event = "INSERT INTO Discount (eventName, description, discountProcent, duration) values ('$eventName', '$description','$discountProcent','$duration')";
            $result3 = mysqli_query($conn, $Event);
        }

} else {
}
