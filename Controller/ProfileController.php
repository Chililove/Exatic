<?php
$userid = (int)$_SESSION["userID"];
$cities = $conn->query($ProfileModel->allPostalSelect);

$updateSucess = false;
$error = false;
$errorTransaction = false;

// trying to display all orders for logged in user
$handleOrder = $conn->prepare($ProfileModel->allOrdersUser);
$handleOrder->bindParam(':userID', $userid, PDO::PARAM_INT);
$handleOrder->execute();
$orderResult = $handleOrder->fetchAll();

//update image

if (isset($_POST['submitImage'])) {
    $imagePath = $sanitized['imagePath'];
    $userID = $sanitized['userID'];

        try {
            $conn->beginTransaction();
            $userUpdate = $conn->prepare($ProfileModel->updatePicture);
            $userUpdate->bindParam(':userID', $userID, PDO::PARAM_INT);
            $userUpdate->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
            $userUpdateResult = $userUpdate->execute();
            $conn->commit();
            $userUpdate->debugDumpParams();
            header("Location:profile");
            //for one.com
            /* $urlEvent ="http://exatic.store/profile";
              echo ("<script>
               location.href='$urlEvent'
               </script>"); */
        } catch (Exception $err) {
            echo $err;
            $errorTransaction = true;
            $conn->rollback();

    }
}


// Update user information on submit

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstName = $sanitized['firstName'];
    $lastName = $sanitized['lastName'];
    $email = $sanitized['email'];

    $streetName = $sanitized['streetName'];
    $streetNumber = $sanitized['streetNumber'];

    $postalCodeID = $sanitized['postalCodeID'];

    $imagePath = ['imagePath'];

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($streetName) && !empty($streetNumber) && !empty($postalCodeID)) {

        try {
            $conn->beginTransaction();

            $ProfileModel->update($conn, $userid, $firstName, $lastName, $email, $imagePath, $streetName, $streetNumber, $postalCodeID);

            $conn->commit();
            $updateSucess = true;
        } catch (Exception $err) {
            var_dump($err);
            $errorTransaction = true;
            $conn->rollback();
        }
    } else {
        $error = true;
    }
}
$handle = $conn->prepare($ProfileModel->user);
$handle->bindParam(':userID', $userid, PDO::PARAM_INT);
$handle->execute();
$result = $handle->fetchAll();

$user = $result[0];
