<?php
require("rootPath.php");

require $rootPath . "Model/AdminOverviewModel.php";
require $rootPath . "Controller/Admin/AdminOverviewController.php";
require $rootPath . "Controller/Admin/EventAddController.php";



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
                            <img src="Exatic/assets/default.jpg" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">ADMIN</h5>
                            <div class="row row-cols-4 d-flex justify-content-center mb-3">
                                <div class="col"><a href="/Exatic/product-admin"><button type="button" class="btn btn-secondary btn-sm">Product Overview</button></a></div>
                                <div class="col"><a href="/Exatic/product-admin-add"><button type="button" class="btn btn-secondary btn-sm">Add Product</button></a></div>
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
                            <?php   while ($row = mysqli_fetch_array($countryResult)) {?>
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
                    <div class="card mb-4 mb-md-2">
                        <h4>Create Product</h4>
                        <form action="#" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-10 mb-6">
                                    <div class="form-group">
                                        <label>Event Name</label>
                                        <input type="text"  name="eventName" class="form-control" required>

                                    </div>
                                </div>
                            </div>

                            <div class="row align-self-center">
                                <div class="col-md-2 mb-4 col align-self-center">
                                    <div class="form-outline">
                                        <label>Procent</label>
                                        <input type="discount" name="discountProcent" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-2 mb-4">
                                    <div class="form-outline">
                                        <label>Quantity</label>
                                        <input type="quantity" name="stockQuantity" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-2 mb-4">
                                    <div class="form-outline">
                                        <label>Duration</label>
                                        <input type="datetime-local" name="duration">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10 mb-4">
                                    <div class="form-group">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success" id="btn-add">Add</button>
                        </form>
                    </div>
                    </div>
                </div>

</section>
</body>
</html>
