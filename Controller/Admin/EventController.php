<?php

if(isset($_POST['submit'])) {
    $eventName  = $sanitized['eventName'];
    $description   = $sanitized['description'];
    $discountProcent     = $sanitized['discountProcent'];
    $startDate    = $sanitized['startDate'];
    $endDate    = $sanitized['endDate'];

    if (
        !empty($_POST['eventName']) || !empty($_POST['description']) || !empty($_POST['discountProcent']) ||
        !empty($_POST['startDate']) || !empty($_POST['endDate'])
    ) {

        $pdoEvent = $conn->prepare($EventModel->createEvent );

        $createEvent = $pdoEvent->execute( array( ':eventName'=>$_POST['eventName'], ':description'=>$_POST['description'], ':discountProcent'=>$_POST['discountProcent'], ':startDate'=>$_POST['startDate'], ':endDate'=>$_POST['endDate'] ) );
        if (!empty($createEvent) ){

            ?>
            <script>
                window.location.href = "/admin-event";
            </script>
            <?php
        } else {
            $conn->rollback();
        }
    }
}


//edit Event
if (isset($_POST['submitEvent'])) {

    if (
        !empty($_POST['eventName']) || !empty($_POST['description']) || !empty($_POST['discountProcent']) ||
        !empty($_POST['startDate']) || !empty($_POST['endDate'])
    )

    $pdo_statement=$conn->prepare("UPDATE Discount SET eventName='" . $_POST[ 'eventName' ] . "', description='" . $_POST[ 'description' ]. "', discountProcent='" . $_POST[ 'discountProcent' ]. "', startDate='" . $_POST[ '$startDate' ]."', endDate='" . $_POST[ 'endDate' ]."' WHERE discountID=" . $_GET["discountID"]);
    $result = $pdo_statement->execute();
    if($result) {
        header('location:/admin-event.php');
    }


}

//read event
$EventListResult = $conn ->query($EventModel->eventList);

//delete event
if (isset($_REQUEST['discountID'])) {
    $setDiscount = $_REQUEST['discountID'];
    $handle = $conn->prepare($EventModel->deleteEvent);
    $handle->execute(array(":discountID" => $setDiscount));
    ?>
    <script>
        window.location.href = "/admin-event";
    </script>
    <?php
}
