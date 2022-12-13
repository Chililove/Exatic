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

$companyReadResult = $conn->prepare($AdminProfileModel->CompanyRead);

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
        } catch (Exception $err) {
            $err = true;
            $conn->rollback();
        }
    }
}
