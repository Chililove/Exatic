<?php

if (isset($_POST['submitEvent'])) {

    $eventName = htmlspecialchars($sanitized['eventName']);
    $description = htmlspecialchars($sanitized['description']);
    $discountProcent = htmlspecialchars($sanitized['discountProcent']);
    $startDate = htmlspecialchars($sanitized['startDate']);
    $endDate = htmlspecialchars($sanitized['endDate']);

    if (
        !empty($_POST['eventName']) || !empty($_POST['description']) || !empty($_POST['discountProcent']) ||
        !empty($_POST['startDate']) || !empty($_POST['endDate'])
    )




        $conn->autocommit(false);
    $handle = $conn->prepare($EventModel->eventEdit);
    $handle->bind_param('sssss', $eventName, $description, $discountProcent, $startDate, $endDate);
    $result3 = $handle->execute();
    $conn->commit();

    $discountID = $_SERVER['QUERY_STRING'];
    $eventEdit = "UPDATE Discount SET eventName='$eventName', description='$description', discountProcent='$discountProcent', startDate='$startDate', endDate='$endDate' WHERE discountID=$discountID";
    echo $eventEdit;
    // $result3 = $conn->query($eventEdit);
?>
    <script type="text/javascript">
        window.location = "/admin-event";
    </script>
<?php

} else {
    $conn->rollback();
}
