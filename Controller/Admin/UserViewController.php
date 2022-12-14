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
            header("Refresh:0");
            //header("Location:admin-user-view?");
            //for local
            // $url= "http://localhost:8886/admin-user-view";
            //for one.com  
            //$urlLogout ="http://exatic.store/logout/../adminUserView.php";
            // echo ("<script>
            //    location.href='$url'
            //      </script>");
        } catch (Exception $err) {
            $err = true;
            $conn->rollback();
        }
    }
}
