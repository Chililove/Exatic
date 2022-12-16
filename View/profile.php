<?php

require("rootPath.php");
require $rootPath . "Model/ProfileModel.php";
require $rootPath . "Controller/ProfileController.php";

?>


<html>

<head>
    <title>
        Profile page
    </title>

    <?php if ($updateSucess) { ?>
        <div class="alert alert-success text-center" role="alert">
            <strong>Sucess:</strong> User succesfully registered! - Go to login :)
        </div>
    <?php } ?>

    <?php if ($error) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <strong>Error:</strong> Something went wrong! - Please fill out all fields without whitespace :D
        </div>
    <?php } ?>

    <?php if ($errorTransaction) { ?>
    <div class="alert alert-danger text-center" role="alert">
        <strong>Error:</strong> Transaction failed! - Please try again..
    </div>
<?php } ?>

</head>

<body>
    <div class="container mb-4 main-container">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <form method="POST">
                            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="Exatic/assets/profilepictures/<?php echo $user["imagePath"] ?>" alt="" width="200" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm center-block">
                                <form method="post" action="">
                                    <div class="input-group mb-3">
                                        <select name="imagePath" class="form-select" aria-label="Default select example">
                                            <option name="imagePath"  selected><?php echo $user["imagePath"] ?></option>
                                            <option name="imagePath"  value="default.jpg">Default</option>
                                            <option name="imagePath"  value="male.jpeg">Male</option>
                                            <option name="imagePath"  value="female.jpeg">Female</option>
                                            <option name="imagePath"  value="catmeme.jpeg">Cat</option>
                                            <input type="hidden" name="userID" value="<?php echo $user["userID"]; ?>">
                                        </select>
                                        <div class="input-group-prepend">
                                            <button type="submit" name="submitImage" class="btn btn-dark" id="btn-add">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            <div class="author-card-details">
                                <div class="form-outline">
                                    <input type="firstname" value="<?php echo $user["firstName"] ?>" name="firstName" class="form-control" placeholder="Firstname" required />
                                </div>
                                <div class="form-outline">
                                    <input type="lastname" value="<?php echo $user["lastName"] ?>" name="lastName" class="form-control" placeholder="Lastname" required />
                                </div>
                                <div class="form-outline">
                                    <input type="email" value="<?php echo $user["email"] ?>" name="email" class="form-control" placeholder="Email" required />
                                </div>
                                <h6 class="py-3">Address Information</h6>
                                <div class="form-outline">
                                    <input type="streetName" value="<?php echo $user["streetName"] ?>" name="streetName" class="form-control" placeholder="Name of the street" required />
                                </div>
                                <div class="form-outline">

                                    <input type="streetnumber" value="<?php echo $user["streetNumber"] ?>" name="streetNumber" class="form-control" placeholder="Street number" required />
                                </div>
                                <div class="form-outline">
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="postalCodeID" readonly>
                                            <option value="<?php echo $user["postalCodeID"] ?>"><?php echo $user["postNumber"] . " " . $user["cityName"] ?></option>
                                            <?php foreach ($cities as $city) {
                                                echo '<option value="' . $city["postalCodeID"] . '">' . $city["postNumber"] . ' ' . $city["cityName"] . '</option>';
                                            } ?>
                                        </select>
                                        <div class="input-group-prepend">
                                            <input type="submit" class="btn btn-dark" value="save">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                </form>
            </div>
            <!-- Orders Table-->
            <div class="col-lg-8 pb-5">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date Purchased</th>
                                <th>Delivered</th>
                                <th>Status</th>
                                <th>Invoice</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderResult as $order) { ?>
                                <tr>
                                    <td scope="row"><?php echo $order['orderID'] ?></td>
                                    <td><?php echo $order['dateOrdered'] ?> </td>
                                    <td><?php echo $order['dateDelivered'] ?></td>
                                    <td><?php echo $order['status'] ?> </td>
                                    <td><a href="/invoice?orderID=<?php echo $order['orderID']; ?>" class="edit" data-id="<?php echo $order["orderID"]; ?>">Click</a></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



</body>

<a class="btn btn-dark" href="/logout">Log out</a>

</html>

<style>
    @import "styles.css";

    .center-block {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>