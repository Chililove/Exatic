<?php
require("rootPath.php");

require $rootPath . "Model/AdminOverviewModel.php";
require $rootPath . "Controller/Admin/AdminOverviewController.php";



?>


<!doctype html>
<html lang="en">

<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <h4>Admin Panel</h4>
                    </nav>
                </div>
            </div>

            <div class="row row-cols-4 d-flex justify-content-center mb-5">
                <div class="col-lg-4">
                    <div class="card mb-5">
                        <div class="card-body text-center">
                            <img src="Exatic/assets/default.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">ADMIN</h5>
                            <div class="row row-cols-4 d-flex justify-content-center mb-3">
                                <div class="col"><a href="/admin-product"><button type="button" class="btn btn-secondary btn-sm">Product Overview</button></a></div>
                                <div class="col"><a href="/admin-product-add"><button type="button" class="btn btn-secondary btn-sm">Add Product</button></a></div>
                                <div class="col"><a href="#"><button type="button" class="btn btn-secondary btn-sm">User Overview</button></a></div>
                            </div>
                            <div class="d-flex justify-content-center mb-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 overflow-auto">
                    <div class="card mb-4 mb-md-6">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Countries</th>
                                    <th scope="col">No. Products</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($countryResult)) { ?>
                                    <tr>
                                        <td><?php echo $row['country']; ?></td>
                                        <td><?php echo $row['COUNT(country)']; ?></td>
                                    </tr>

                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 mb-md-2 text-center">
                        <?php while ($row = mysqli_fetch_array($EventResult)) { ?>
                            <h5><?php echo $row['eventName']; ?></h5>
                            <p>Start Date</p>
                            <h3><?php echo $row['startDate']; ?></h3>
                            <p>End Date</p>
                            <h3><?php echo $row['endDate']; ?></h3>
                            <div class="col"><a href="/admin-event-add"><button type="button" class="btn btn-secondary btn-sm">Event</button></a></div>
                    </div>
                <?php } ?>

                </div>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>