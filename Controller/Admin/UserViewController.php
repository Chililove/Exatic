<?php
$orderResult = $conn->query($orders);

if (isset($_POST['updateStatus'])) {
    $orderID = $sanitized['orderID'];
    $dateOrdered = $sanitized['dateOrdered'];
    $dateDelivered = $sanitized['dateDelivered'];
    $status = $sanitized['status'];
    $userID = $sanitized['userID'];


    if (!empty($_POST['status'])) {
        try {
            $conn->beginTransaction();
            $editStatus = $conn->prepare($UserViewModel->statusEdit);
            $editStatus->bindParam(':orderID', $orderID, PDO::PARAM_INT);
            $editStatus->bindParam(':dateOrdered', $dateOrdered, PDO::PARAM_STR);
            $editStatus->bindParam(':dateDelivered', $dateDelivered, PDO::PARAM_STR);
            $editStatus->bindParam(':status', $status, PDO::PARAM_STR);
            $editStatus->bindParam(':userID', $userID, PDO::PARAM_INT);
            $statusResult = $editStatus->execute();
            $conn->commit();
            //for local
            header("Refresh:0");
            //for one.com  
            /* $urlUserView ="/admin-user-view";
             echo ("<script>
               location.pathname='$urlUserView'
                  </script>"); */
        } catch (Exception $err) {
            $err = true;
            $conn->rollback();
        }
    }
}
