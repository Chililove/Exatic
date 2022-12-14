<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$adminId = (int)$_SESSION["userID"];


$CountryResult = $conn->query($AdminProfileModel->CountryProduct);

$handleAdmin = $conn->prepare($AdminProfileModel->user);
$handleAdmin->bindParam(':userID', $adminId, PDO::PARAM_INT);
$handleAdmin->execute();
$AdminProfileResult = $handleAdmin->fetchAll();

$user = $AdminProfileResult[0];

$companyReadResult = $conn->prepare($AdminProfileModel->companyRead);
$addressReadResult = $conn->prepare($AdminProfileModel->addressRead);
$ownerReadResult = $conn->prepare($AdminProfileModel->userRead);

$companyResult = $conn->query($AdminProfileModel->companyRead);



//edit company info
if (isset($_POST['submitCompany'])) {

    $companyDescription = $sanitized['companyDescription'];
    $weekdays = $sanitized['weekdays'];
    $weekends = $sanitized['weekends'];
    $openingHours = $sanitized['openingHours'];
    $weekendHours = $sanitized['weekendHours'];
    $addressID = $sanitized['addressID'];
    $companyInfoID = $sanitized['companyInfoID'];


    if (!empty($_POST['companyDescription']) || !empty($_POST['weekdays']) || !empty($_POST['weekends']) || !empty($_POST['openingHours']) || !empty($_POST['weekendHours'])) {
        try {
            $conn->beginTransaction();
            $company = $conn->prepare($AdminProfileModel->companyEdit);
            $company->bindParam(':companyInfoID', $companyInfoID, PDO::PARAM_INT);
            $company->bindParam(':companyDescription', $companyDescription, PDO::PARAM_STR);
            $company->bindParam(':weekdays', $weekdays, PDO::PARAM_STR);
            $company->bindParam(':weekends', $weekends, PDO::PARAM_STR);
            $company->bindParam(':openingHours', $openingHours, PDO::PARAM_STR);
            $company->bindParam(':weekendHours', $weekendHours, PDO::PARAM_STR);
            $company->bindParam(':addressID', $addressID, PDO::PARAM_INT);
            $companyResult = $company->execute();
            $conn->commit();
            header("Location:admin-profile");
            //for one.com  
            /* $urlAdminProfile ="http://exatic.store/admin-profile";
                echo ("<script>
                 location.href='$urlAdminProfile'
                 </script>");  */
        } catch (Exception $err) {
            $err = true;
            $conn->rollback();
        }
    }
}

if (isset($_POST['updateAddress'])) {
    $streetName = $sanitized['streetName'];
    $streetNumber = $sanitized['streetNumber'];
    $postalCodeID = $sanitized['postalCodeID'];
    $addressID = $sanitized['addressID'];


    if (!empty($_POST['streetName']) || !empty($_POST['streetNumber'])) {
        try {
            $conn->beginTransaction();
            $address = $conn->prepare($AdminProfileModel->addressEdit);
            $address->bindParam(':addressID', $addressID, PDO::PARAM_INT);
            $address->bindParam(':streetName', $streetName, PDO::PARAM_STR);
            $address->bindParam(':streetNumber', $streetNumber, PDO::PARAM_INT);
            $address->bindParam(':postalCodeID', $postalCodeID, PDO::PARAM_INT);
            $addressResult = $address->execute();
            $conn->commit();
            header("Location:admin-profile");
            //for one.com  
            /* $urlAdminProfile ="http://exatic.store/admin-profile";
                echo ("<script>
                 location.href='$urlAdminProfile'
                 </script>");  */
        } catch (Exception $err) {
            $err = true;
            $conn->rollback();
        }
    }
}

if (isset($_POST['updateEmail'])) {
    $firstName = $sanitized['firstName'];
    $lastName = $sanitized['lastName'];
    $email = $sanitized['email'];
    $password = $sanitized['password'];
    $userType = $sanitized['userType'];
    $imagePath = $sanitized['imagePath'];
    $addressID = $sanitized['addressID'];
    $userID = $sanitized['userID'];


    if (!empty($_POST['firstName']) || !empty($_POST['lastName']) || !empty($_POST['email']) || !empty($_POST['userType']) || !empty($_POST['imagePath'])) {
        try {
            $conn->beginTransaction();
            $owner = $conn->prepare($AdminProfileModel->userEdit);
            $owner->bindParam(':userID', $userID, PDO::PARAM_INT);
            $owner->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $owner->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $owner->bindParam(':email', $email, PDO::PARAM_STR);
            $owner->bindParam(':password', $password, PDO::PARAM_STR);
            $owner->bindParam(':userType', $userType, PDO::PARAM_INT);
            $owner->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
            $owner->bindParam(':addressID', $addressID, PDO::PARAM_INT);
            $ownerResult = $owner->execute();
            $conn->commit();
            header("Location:admin-profile");
            //for one.com  
            /* $urlAdminProfile ="http://exatic.store/admin-profile";
                echo ("<script>
                 location.href='$urlAdminProfile'
                 </script>");  */
        } catch (Exception $err) {
            $err = true;
            $conn->rollback();
        }
    }
}
