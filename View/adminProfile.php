<?php
require("rootPath.php");

require $rootPath . "Model/AdminProfileModel.php";
require $rootPath . "Controller/Admin/AdminProfileController.php";
require("_partials/adminBar.php")


?>
<div class="container py-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="assets/profilepictures/<?php echo $user['imagePath'] ?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                        <h4><?php echo $user["firstName"]; ?> <?php echo $user["lastName"]; ?></h4>
                        <p class="text-secondary mb-1">Admin ID. <?php echo $user["userID"]; ?></p>
                        <p class="text-muted font-size-sm"><?php echo $user["streetName"]; ?><?php echo $user["streetNumber"]; ?>, <?php echo $user["cityName"]; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <table class="table table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Country</th>
                                <th scope="col">No. Product</th>
                                <th scope="col">Total Quantity</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;

                        while ($row = $CountryResult->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row['country']; ?></td>
                                    <td><?php echo $row['COUNT(country)']; ?></td>
                                    <td><?php echo $row['totalQuantity']; ?></td>
                                </tr>
                            <?php $i++;
                        } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        $companyRead = "SELECT * FROM CompanyInfo WHERE companyInfoID = 1";
        $companyResult = $conn->query($companyRead);
        while ($row = $companyResult->fetch(PDO::FETCH_ASSOC)) { ?>
            <form method="post" action="">
                <div class="row mb-4">
                    <div class="form-outline mb-4">
                        <div class="py-2 admin-align-text">
                            <span">Company Info</span>
                        </div>
                        <textarea class="form-control" name="companyDescription" id="" cols="30" rows="10"><?php echo $row['companyDescription']; ?></textarea>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example1">Weekdays</label>
                            <input type="text" name="weekdays" value="<?php echo $row['weekdays']; ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example1">Weekends</label>
                            <input type="text" name="weekends" value="<?php echo $row['weekends']; ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example1">OpHours</label>
                            <input type="text" name="openingHours" value="<?php echo $row['openingHours']; ?>" class="form-control" />

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example1">WeHours</label>
                            <input type="text" name="weekendHours" value="<?php echo $row['weekendHours']; ?>" class="form-control" />
                        </div>
                        <input type="hidden" name="companyInfoID" value="<?php echo $row['companyInfoID']; ?>">
                        <input type="hidden" name="addressID" value="<?php echo $row['addressID']; ?>">
                    </div>
                </div>
                <button type="submit" name="submitCompany" id="btn-edit" class="btn admin-button">Edit</a></button>

            </form>
        <?php
        } ?>
    </div>
    <?php
    $address = "SELECT * FROM `Address` WHERE addressID=1";
    $addressResult = $conn->query($address);
    while ($row = $addressResult->fetch(PDO::FETCH_ASSOC)) { ?>
        <form method="post" action="">
            <div class="row mb-4">
                <div class="form-outline mb-4">
                    <div class="py-2 admin-align-text">
                        <span">Update Address</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example1">StreetName</label>
                        <input type="text" name="streetName" value="<?php echo $row['streetName']; ?>" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example1">StreetNumber</label>
                        <input type="text" name="streetNumber" value="<?php echo $row['streetNumber']; ?>" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <input type="hidden" name="postalCodeID" value="<?php echo $row['postalCodeID']; ?>">

                    <input type="hidden" name="addressID" value="<?php echo $row['addressID']; ?>">
                </div>
            </div>
            <button type="submit" name="updateAddress" id="btn-edit" class="btn admin-button">Edit</a></button>

        </form>
    <?php
    } ?>
    <?php
    $ownerEmail = "SELECT * FROM User WHERE userID = 1";
    $ownerEmailResult = $conn->query($ownerEmail);
    while ($row = $ownerEmailResult->fetch(PDO::FETCH_ASSOC)) { ?>
        <form method="post" action="">
            <div class="row mb-4">
                <div class="form-outline mb-4">
                    <div class="py-2 admin-align-text">
                        <span">Update Email</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example1">Email</label>
                        <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <input type="hidden" name="firstName" value="<?php echo $row['firstName']; ?>">
                    <input type="hidden" name="lastName" value="<?php echo $row['lastName']; ?>">
                    <input type="hidden" name="password" value="<?php echo $row['password']; ?>">
                    <input type="hidden" name="userType" value="<?php echo $row['userType']; ?>">
                    <input type="hidden" name="imagePath" value="<?php echo $row['imagePath']; ?>">
                    <input type="hidden" name="addressID" value="<?php echo $row['addressID']; ?>">
                    <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">

                </div>
            </div>
            <button type="submit" name="updateEmail" id="btn-edit" class="btn admin-button">Edit</a></button>

        </form>
    <?php
    } ?>

</div>
<a class="btn admin-button" href="/logout">Log out</a>


<style lang="css">
    @import "styles.css";

    .admin-align-text {
        text-align: center;
    }



    .admin-button {
        background: #212121;
        color: white;
        border-radius: 0;
    }
</style>