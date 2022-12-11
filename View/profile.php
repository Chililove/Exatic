<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("rootPath.php");
require $rootPath . "Model/ProfileModel.php";
require $rootPath . "Controller/ProfileController.php";
require "resize/Resizer.php";


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

                <div class="author-card pb-3">
                    <div class="author-card-profile">
                        <div class="author-card-avatar"><img src="Exatic/assets/profilepictures/<?php echo $user["imagePath"] ?>" alt="">
                            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" class="imgSelect">
                        </div>
                        <div class="author-card-details">
                            <div class="form-outline">
                                <input type="firstname" value="<?php echo $user["firstName"] ?>" name="firstName" class="form-control" placeholder="Firstname" required />
                            </div>
                            <div class="form-outline">
                                <input type="lastname" value="<?php echo $user["lastName"] ?>" name="lastName" class="form-control" placeholder="Lastname" required />
                            </div>
                            <h6 class="mb-4 pb-2 pb-md-0">Address Information</h6>
                            <div class="form-outline">
                                <input type="street" value="<?php echo $user["streetName"] ?>" name="streetName" class="form-control" placeholder="Name of the street" required />
                            </div>
                            <div class="form-outline">
                                <input type="streetnumber" value="<?php echo $user["streetNumber"] ?>" name="streetNumber" class="form-control" placeholder="Street number" required />
                            </div>
                            <div class="form-outline">
                                <select class="form-control" name="postalCodeID" readonly>
                                    <option value="<?php echo $user["postalCodeID"] ?>"><?php echo $user["postNumber"] . " " . $user["cityName"] ?></option>
                                    <?php foreach ($cities as $city) {
                                        echo '<option value="' . $city["postalCodeID"] . '">' . $city["postNumber"] . ' ' . $city["cityName"] . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="justify-content-start">
                                <input type="submit" class="btn btn-dark" value="save">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderResult as $order) { ?>
                                <tr>
                                    <td scope="row"><?php echo $order['orderID'] ?></td>
                                    <td><?php echo $order['dateOrdered'] ?> </td>
                                    <td><?php echo $order['dateDelivered'] ?></td>
                                    <td><?php echo $order['status'] ?> </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a class="btn btn-primary" href="/logout">Log out</a>
    </div>
    <!--   <section class="h-100 section-style">

        <div class="container py-5 h-50">
            <div class="row-2 d-flex align-items-top justify-content-between">
                <div class="col-6">
                    <img src="/Exatic/assets/profilepictures/<?php echo $user["imagePath"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 18%;">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" class="imgSelect">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card-body p-3 p-md-4">
                        <h6 class="mb-3 pb-2 pb-md-0">User information</h6>
                        <fieldset id="fieldset">
                            <form action="/profile" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="firstname" value="<?php echo $user["firstName"] ?>" name="firstName" class="form-control" placeholder="Firstname" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="lastname" value="<?php echo $user["lastName"] ?>" name="lastName" class="form-control" placeholder="Lastname" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="email" value="<?php echo $user["email"] ?>" name="email" class="form-control" placeholder="Email" required />
                                        </div>
                                    </div>

                                </div>


                                <h6 class="mb-4 pb-2 pb-md-0">Address Information</h6>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="street" value="<?php echo $user["streetName"] ?>" name="streetName" class="form-control" placeholder="Name of the street" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="streetnumber" value="<?php echo $user["streetNumber"] ?>" name="streetNumber" class="form-control" placeholder="Street number" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <select class="form-control" name="postalCodeID" readonly>
                                                <option value="<?php echo $user["postalCodeID"] ?>"><?php echo $user["postNumber"] . " " . $user["cityName"] ?></option>
                                                <?php foreach ($cities as $city) {
                                                    echo '<option value="' . $city["postalCodeID"] . '">' . $city["postNumber"] . ' ' . $city["cityName"] . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <input type="submit" value="save">
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">

                <div class="col-md-10 col-lg-7 col-xl-5">
                    <div class="">
                        <div class="card-body">
                            <div class="cardlist">
                                <div class="card-header">
                                    Your previous orders:
                                </div>


                                <div class=" row-cols-4 d-flex justify-content-center">
                                    <div class="col-lg-4 py-3">
                                        <table class="table table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order nr</th>
                                                    <th scope="col">Date ordered</th>
                                                    <th scope="col">Date delivered</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php foreach ($orderResult as $order) { ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $order['orderID'] ?></td>
                                                        <td><?php echo $order['dateOrdered'] ?> </td>
                                                        <td><?php echo $order['dateDelivered'] ?></td>
                                                        <td><?php echo $order['status'] ?> </td>
                                                    </tr>

                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <a class="btn btn-primary" href="/logout">Log out</a>

    </section> -->



</body>

</html>

<style>
    @import "styles.css";

    .section-style {
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .imgSelect {
        margin-top: 3%;
        margin-left: 3%;
    }

    .cardlist {
        width: 45%;
        align-self: center;


    }

    .btn {
        border-radius: 0;
        background-color: black;
        color: white;
        box-shadow: 0px, 5px, 10px #212121;
        margin: 2%;
        margin-left: 88%;
    }
</style>