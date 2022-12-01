<?php
require("rootPath.php");

require $rootPath . "Model/AdminOverviewModel.php";
require $rootPath . "Controller/Admin/AdminOverviewController.php";
require ("_partials/adminBar.php")


?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                <div class="card p-4">
                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        <button class="btn btn-secondary">
                            <?php

                            $profileDetails = "SELECT * FROM User u, Address a, postalCode p WHERE u.addressID = a.addressID AND a.postalCodeID = p.postalCodeID AND u.userType=0 LIMIT 1;";
                            $detailResult = mysqli_query($conn, $profileDetails);
                            while ($row = mysqli_fetch_assoc($detailResult)) { ?>
                            <img src="Exatic/assets/default.jpg" alt="avatar" class="rounded-circle img-fluid" height="100" width="100" />
                        </button>
                        <span class="name mt-3"><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></span>
                        <span class="idd"><?php echo $row['email'] ?></span>
                        <span class="idd2"><?php echo $row['streetName'] ?> <?php echo $row['streetNumber']  ?>, <?php echo $row['postNumber']  ?> <?php echo $row['cityName']  ?></span>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                            <span class="idd1">ID no. <?php echo $row['userID'] ?></span> <span><i class="fa fa-copy"></i></span>
                        </div>
                        <div class=" d-flex mt-2"> <button class="btn1 btn-dark">Edit Profile</button> </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="col-lg-8">
            <section class="ps-lg-1-6 ps-xl-5">

                <div class="mb-5 wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="mb-0 text-primary"></h2>
                    </div>
                    <div class="row mt-n4">
                        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <a href="/admin-product"><h3 class="h5 mb-3">Products</h3></a>
                                    <?php while ($row = mysqli_fetch_array($CountProductIDResult)) { ?>
                                        <h3><?php echo $row['COUNT(productID)']; ?></h3>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <a href="/admin-user-list"><h3 class="h5 mb-3">Users</h3></a>
                                    <?php while ($row = mysqli_fetch_array($CountUserIDResult)) { ?>
                                        <h3><?php echo $row['COUNT(userID)']; ?></h3>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <a href="/admin-event"><h3 class="h5 mb-3">Events</h3></a>
                                    <?php while ($row = mysqli_fetch_array($CountDiscountIDResult)) { ?>
                                        <h3><?php echo $row['COUNT(discountID)']; ?></h3>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>