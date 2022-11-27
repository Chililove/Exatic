<?php
require("rootPath.php");

require $rootPath . "Model/AdminOverviewModel.php";
require $rootPath . "Controller/Admin/AdminOverviewController.php";



?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card border-0 shadow py-4 justify-content-center mb-5">
                    <img src="Exatic/assets/default.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <div class="card-body p-1-9 p-xl-5">
                    <div class="mb-4">
                        <?php

                        $profileDetails = "SELECT * FROM user LIMIT 1";
                        $detailResult = mysqli_query($conn, $profileDetails);
                        while ($row = mysqli_fetch_assoc($detailResult)) { ?>
                        <h3 class="h4 mb-0"><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></h3>
                        <span></span>
                    </div>
                    <h6>Role</h6>
                    <span>Admin</span> <br> <br>
                    <h6>ds</h6>
                    <span>ds</span>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-lg-8">
            <section class="ps-lg-1-6 ps-xl-5">

                <div class="mb-5 wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="mb-0 text-primary"></h2>
                    </div>
                    <div class="row mt-n4">
                        <div class="col-sm-6 col-xl-4 mt-4">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <a href="/admin-product"><h3 class="h5 mb-3">Products</h3></a>
                                    <?php while ($row = mysqli_fetch_array($CountProductIDResult)) { ?>
                                        <h3><?php echo $row['COUNT(productID)']; ?></h3>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4 mt-4">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <a href="/admin-user-list"><h3 class="h5 mb-3">Users</h3></a>
                                    <?php while ($row = mysqli_fetch_array($CountUserIDResult)) { ?>
                                        <h3><?php echo $row['COUNT(userID)']; ?></h3>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4 mt-4">
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