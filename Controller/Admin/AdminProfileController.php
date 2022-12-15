<?php

$adminId = (int)$_SESSION["userID"];


$countryResult = $conn->query($AdminProfileModel->countryProduct);

$handleAdmin = $conn->prepare($AdminProfileModel->user);
$handleAdmin->bindParam(':userID', $adminId, PDO::PARAM_INT);
$handleAdmin->execute();
$AdminProfileResult = $handleAdmin->fetchAll();

$user = $AdminProfileResult[0];

$ownerReadResult = $conn->prepare($AdminProfileModel->userRead);
$addressResult = $conn->query($AdminProfileModel->address);
$companyResult = $conn->query($AdminProfileModel->companyRead);
$ownerEmailResult = $conn->query($AdminProfileModel->ownerEmail);



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

//update image

if (isset($_POST['submitImage'])) {
    $imagePath = $sanitized['imagePath'];
    $userID = $sanitized['userID'];

    try {
        $conn->beginTransaction();
        $userUpdate = $conn->prepare($AdminProfileModel->updatePicture);
        $userUpdate->bindParam(':userID', $userID, PDO::PARAM_INT);
        $userUpdate->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
        $userUpdateResult = $userUpdate->execute();
        $conn->commit();
        $userUpdate->debugDumpParams();
        header("Location:admin-profile");
        //for one.com
        /* $urlEvent ="http://exatic.store/admin-profile";
          echo ("<script>
           location.href='$urlEvent'
           </script>"); */
    } catch (Exception $err) {
        echo $err;
        $errorTransaction = true;
        $conn->rollback();

    }
}

class Resizer{
    protected $image;
    protected $image_type;

    public function load($filename){
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if($this->image_type== IMAGETYPE_JPEG){
            $this->image = imagecreatefromjpeg($filename);
        }elseif ($this->image_type == IMAGETYPE_GIF){
            $this->image = imagecreatefromgif($filename);
        }elseif ($this->image_type== IMAGETYPE_PNG){
            $this->image = imagecreatefrompng($filename);
        }
    }
    public function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 100)
    {
        if($image_type==IMAGETYPE_JPEG){
            imagejpeg($this->image, $filename, $compression);
        }elseif ($image_type==IMAGETYPE_GIF){
            imagegif($this->image, $filename);
        }elseif ($image_type==IMAGETYPE_PNG){
            imagepng($this->image, $filename);
        }
    }
    protected function getWidth(){
        return imagesx($this->image);
    }
    protected function getHeight(){
        return imagesy($this->image);
    }
    public function resizeToHeight($height){
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth()*$ratio;
        $this->resize($width, $height);
    }
    public function resizeToWidth($width){
        $ratio = $width / $this->getWidth();
        $height = $this->getHeight()*$ratio;
        $this->resize($width, $height);
    }

    public function scale($scale){
        $width = $this->getWidth()*$scale/100;
        $height = $this->getHeight()*$scale/100;
        $this->resize($width, $height);
    }

    public function resize($width, $height){
        $new_image = imagecreatetruecolor($width,$height);
        imagecopyresampled($new_image, $this->image, 0,0,0,0,
            $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
}