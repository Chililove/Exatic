<?php

if (isset($_POST['submit'])) {

    $eventName  = $sanitized['eventName'];
    $description   = $sanitized['description'];
    $discountProcent     = $sanitized['discountProcent'];
    $startDate    = $sanitized['startDate'];
    $endDate    = $sanitized['endDate'];

    if (
        !empty($_POST['eventName']) || !empty($_POST['description']) || !empty($_POST['discountProcent']) ||
        !empty($_POST['startDate']) || !empty($_POST['endDate'])
    ) {

        try {
            $conn->beginTransaction();
            $addEvent = $conn->prepare($EventModel->createEvent);
            $addEvent->bindParam(':eventName', $eventName, PDO::PARAM_STR);
            $addEvent->bindParam(':description', $description, PDO::PARAM_STR);
            $addEvent->bindParam(':discountProcent', $discountProcent, PDO::PARAM_STR);
            $addEvent->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            $addEvent->bindParam(':endDate', $endDate, PDO::PARAM_STR);

            $addEventResult = $addEvent->execute();
            $conn->commit();
            header("Location:admin-event");
            //for one.com  
            /* $urlEvent ="http://exatic.store/admin-event";
              echo ("<script>
               location.href='$urlEvent'
               </script>"); */
        } catch (Exception $err) {
            echo $err;
            $errorTransaction = true;
            $conn->rollback();
        }
    }
}


//edit Event
if (isset($_POST['submitEvent'])) {
    $eventName  = $sanitized['eventName'];
    $description   = $sanitized['description'];
    $discountProcent     = $sanitized['discountProcent'];
    $startDate    = $sanitized['startDate'];
    $endDate    = $sanitized['endDate'];
    $discountID = $sanitized['discountID'];

    if (
        !empty($_POST['eventName']) || !empty($_POST['description']) || !empty($_POST['discountProcent']) ||
        !empty($_POST['startDate']) || !empty($_POST['endDate'])
    ) {

        try {
            $conn->beginTransaction();
            $editEvent = $conn->prepare($EventModel->editEvent);

            $editEvent->bindParam(':discountID', $discountID, PDO::PARAM_INT);
            $editEvent->bindParam(':eventName', $eventName, PDO::PARAM_STR);
            $editEvent->bindParam(':description', $description, PDO::PARAM_STR);
            $editEvent->bindParam(':discountProcent', $discountProcent, PDO::PARAM_STR);
            $editEvent->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            $editEvent->bindParam(':endDate', $endDate, PDO::PARAM_STR);

            $editEventResult = $editEvent->execute();
            $conn->commit();
            header("Location:admin-event");
            //for one.com  
            /* $urlEvent ="http://exatic.store/admin-event";
              echo ("<script>
               location.href='$urlEvent'
               </script>"); */
        } catch (Exception $err) {
            echo $err;
            $errorTransaction = true;
            $conn->rollback();
        }
    }
}

//read event
$EventListResult = $conn->query($EventModel->eventList);

//delete event
if (isset($_REQUEST['del'])) {
    $setDiscount = $_REQUEST['discountID'];
    $conn->query("SET FOREIGN_KEY_CHECKS=0");
    $handle = $conn->prepare($EventModel->deleteEvent);
    $handle->execute(array(":discountID" => $setDiscount));
    $conn->query("SET FOREIGN_KEY_CHECKS=1");

    // quick fix - needs to change 
    header("Location:admin-event");
    //for one.com  
    /* $urlEvent ="http://exatic.store/admin-event";
              echo ("<script>
               location.href='$urlEvent'
               </script>"); */
}
