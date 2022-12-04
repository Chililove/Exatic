<?php

if (isset($_POST['submit'])) {
    $eventName = htmlspecialchars($sanitized['eventName']);
    $description = htmlspecialchars($sanitized['description']);
    $discountProcent = htmlspecialchars($sanitized['discountProcent']);
    $startDate = htmlspecialchars($sanitized['startDate']);
    $endDate = htmlspecialchars($sanitized['endDate']);

    if (
        !empty($_POST['eventName']) || !empty($_POST['description']) || !empty($_POST['discountProcent']) ||
        !empty($_POST['startDate']) || !empty($_POST['endDate'])
    ) {

        $conn->autocommit(false);
        $handle = $conn->prepare($EventModel->Event);
        $handle->bind_param('sssss', $eventName, $description, $discountProcent, $startDate, $endDate);
        $result3 = $handle->execute();
        $conn->commit();

?>
        <script>
            window.location.href = "/admin-event";
        </script>
<?php
    } else {
        $conn->rollback();
    }
}
