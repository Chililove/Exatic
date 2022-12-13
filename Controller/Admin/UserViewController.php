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
            $status = $conn->prepare($UserViewModel->statusEdit);
            $status->bindParam(':orderID', $orderID, PDO::PARAM_INT);
            $status->bindParam(':dateOrdered', $dateOrdered, PDO::PARAM_STR);
            $status->bindParam(':dateDelivered', $dateDelivered, PDO::PARAM_STR);
            $status->bindParam(':userID', $userID, PDO::PARAM_INT);
            $status->bindParam(':status', $status, PDO::PARAM_STR);
            $statusResult = $status->execute();
            $conn->commit();
            $status->debugDumpParams();
            header("Location:admin-user-view");
        } catch (Exception $err) {
            $err = true;
            $conn->rollback();
        }
    }
}
