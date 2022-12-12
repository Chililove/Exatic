<?php
$adminId = (int)$_SESSION["userID"];


$CountryResult = $conn->query($AdminProfileModel->CountryProduct);

$handleAdmin = $conn->prepare($AdminProfileModel->user);
$handleAdmin->bindParam(':userID', $adminId, PDO::PARAM_INT);
$handleAdmin->execute();
$AdminProfileResult = $handleAdmin->fetchAll();

$user = $AdminProfileResult[0];

$companyReadResult = $conn->prepare($AdminProfileModel->CompanyRead);

//edit compamy info
if (isset($_POST['submitCompany'])) {
    $companyDescription = $sanitized['companyDescription'];
    $weekdays = $sanitized['weekdays'];
    $weekends = $sanitized['weekends'];
    $openingHours = $sanitized['openingHours'];
    $weekendHours = $sanitized['weekendHours'];
    $addressID = 1;


    if (!empty($companyDescription)|| !empty($_POST['weekdays']) || !empty($_POST['weekends']) || !empty($_POST['openingHours']) || !empty($_POST['weekendHours']))  {
        $company = $conn->prepare($AdminProfileModel->CompanyEdit);
        $company->bindParam(':companyDescription', $companyDescription, PDO::PARAM_STR);
        $company->bindParam(':weekdays', $weekdays, PDO::PARAM_STR);
        $company->bindParam(':weekends', $weekends, PDO::PARAM_STR);
        $company->bindParam(':openingHours', $openingHours, PDO::PARAM_STR);
        $company->bindParam(':weekendHours', $weekendHours, PDO::PARAM_STR);
        $company->bindParam(':addressID', $addressID, PDO::PARAM_STR);

        $company->execute();
        $conn->commit();
        $companyResult = $company->fetchAll();
    } else {
        echo ("smtmtmtm");
    }
}
