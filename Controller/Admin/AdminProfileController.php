<?php
$adminId = (int)$_SESSION["userID"];


$CountryResult = $conn->query($AdminProfileModel->CountryProduct);
// $CountProductIDResult = $conn->query($AdminProfileModel->CountProductID);
// $CountDiscountIDResult = $conn->query($AdminProfileModel->CountdiscountID);
// $CountUserIDResult = $conn->query($AdminProfileModel->CountUserID);

$handleAdmin = $conn->prepare($AdminProfileModel->user);
$handleAdmin->bindParam(':userID', $adminId, PDO::PARAM_INT);
$handleAdmin->execute();
$AdminProfileResult = $handleAdmin->fetchAll();

$user = $AdminProfileResult[0];

//edit compamy info
if(isset($_POST['submit'])) {
    $companyDescription = $sanitized['companyDescription'];

    if (!empty($companyDescription)) {

        $company = $conn->prepare($AdminProfileModel->CompanyEdit);
        $company->bindParam(':companyDescription', $companyDescription, PDO::PARAM_STR);
        $company->execute();

        $companyResult = $company->fetchAll();
        echo ($companyResult);
    }
}