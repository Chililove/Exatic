<?php
require("rootPath.php");

require $rootPath . "Model/AdminProfileModel.php";
require $rootPath . "Controller/Admin/AdminProfileController.php";
require("_partials/adminBar.php")


?>
<div class="container">
    <div class="main-body py-5">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <?php
                    while ($row = $AdminProfileResult->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="card">

                        <div class="card-body">

                            <div class="d-flex flex-column align-items-center text-center">

                                <img src="/assets/default.jpg" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $row["firstName"]; ?> <?php echo $row["lastName"]; ?></h4>
                                    <p class="text-secondary mb-1">Admin ID. <?php echo $row["userID"]; ?></p>
                                    <p class="text-muted font-size-sm"><?php echo $row["streetName"]; ?><?php echo $row["streetNumber"]; ?>, <?php echo $row["cityName"]; ?></p>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php } ?>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="/admin-product">
                                <h3 class="h5 mb-3">Products</h3>
                            </a>
                            <?php
                            while ($row = $CountProductIDResult->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <h3><?php echo $row['COUNT(productID)']; ?></h3>
                            <?php } ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="/admin-user-list">
                                <h3 class="h5 mb-3">Users</h3>
                            </a>
                            <?php while
                            ($row = $CountUserIDResult->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <h3><?php echo $row['COUNT(userID)']; ?></h3>
                            <?php } ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="/admin-event">
                                <h3 class="h5 mb-3">Events</h3>
                            </a>
                            <?php while
                            ($row = $CountDiscountIDResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                <h3><?php echo $row['COUNT(discountID)']; ?></h3>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <h1 style="text-align: center">Import Countries</h1>
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

                    while
                    ($row = $CountryResult->fetch(PDO::FETCH_ASSOC))  { ?>
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
</div>