<?php
require("rootPath.php");

require $rootPath . "Model/AdminOverviewModel.php";
require $rootPath . "Controller/Admin/AdminOverviewController.php";
require ("_partials/adminBar.php")


?>
<div class="container">
    <div class="main-body py-5">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <?php
                            while ($row = mysqli_fetch_array($AdminProfileResult)) {?>
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?php echo $row["firstName"]; ?> <?php echo $row["lastName"]; ?></h4>
                                <p class="text-secondary mb-1">Admin ID. <?php echo $row["userID"]; ?></p>
                                <p class="text-muted font-size-sm"><?php echo $row["streetName"]; ?><?php echo $row["streetNumber"]; ?>, <?php echo $row["cityName"]; ?></p>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <?php
                            while ($row = mysqli_fetch_array($AdminProfileResult)) {?>
                                <a href="/admin-product"></a>

                            <?php } ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="/admin-product"><h3 class="h5 mb-3">Products</h3></a>
                            <?php while ($row = mysqli_fetch_array($CountProductIDResult)) { ?>
                                <h3><?php echo $row['COUNT(productID)']; ?></h3>
                            <?php } ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="/admin-user-list"><h3 class="h5 mb-3">Users</h3></a>
                            <?php while ($row = mysqli_fetch_array($CountUserIDResult)) { ?>
                                <h3><?php echo $row['COUNT(userID)']; ?></h3>
                            <?php } ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="/admin-event"><h3 class="h5 mb-3">Events</h3></a>
                            <?php while ($row = mysqli_fetch_array($CountDiscountIDResult)) { ?>
                                <h3><?php echo $row['COUNT(discountID)']; ?></h3>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <h1 style="text-align: center">Import Countries</h1>
                <ul class="list-group">
                    <?php while ($row = mysqli_fetch_array($CountryResult)) { ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo $row['country']; ?>
                        <span><?php echo $row['COUNT(country)']; ?></span>
                        <span><?php echo $row['totalQuantity']; ?></span>

                    </li>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>

