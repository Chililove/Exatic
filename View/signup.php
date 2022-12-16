<?php
require("rootPath.php");

require $rootPath . "Model/SignUpModel.php";
require $rootPath . "Controller/SignupController.php";

?>
<!doctype html>
<html lang="en">

<head>
    <?php if ($signup) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <strong>Signup:</strong> Please signup to checkout your items :) ..
        </div>
    <?php } ?>

    <?php if ($errorEmail) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <strong>Error:</strong> User already exists! Try signup with another email..
        </div>
    <?php } ?>

    <?php if ($signupSucess) { ?>
        <div class="alert alert-success text-center" role="alert">
            <strong>Sucess:</strong> User succesfully registered! - Go to login :)
        </div>
    <?php } ?>

    <?php if ($error) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <strong>Error:</strong> Something went wrong! - Please fill out all fields without whitespace :D
        </div>
    <?php } ?>

</head>

<body>
    <section class="h-100 section-style">
        <div class="container py-5 h-50">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col">
                    <img src="/assets/prettyplate.jpeg" class="d-block w-100" alt="image">
                </div>

                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                    <form action="" method="post">

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="firstname" name="firstName" class="form-control" placeholder="Firstname" required />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="lastname" name="lastName" class="form-control" placeholder="Lastname" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required />
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                                </div>
                            </div>

                        </div>


                        <h6 class="mb-4 pb-2 pb-md-0">Address Information</h6>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="street" name="streetName" class="form-control" placeholder="Name of the street" required />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="streetnumber" name="streetNumber" class="form-control" placeholder="Street number" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <select class="form-control" name="postalCodeID" required>
                                        <option value="select">Select a city...</option>
                                        <?php foreach ($cities as $city) {
                                            echo '<option value="' . $city["postalCodeID"] . '">' . $city["postNumber"] . ' ' . $city["cityName"] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row align-self-end">

                            <input class="btn btn-dark btn-lg" type="submit" name="submit" value="SIGNUP" />
                        </div>
                        <?php if (!empty($message)) {
                            echo "<p>" . $message . "</p>";
                        } ?>
                    </form>

                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
</body>

</html>
<style lang="css">
    @import "styles.css";

    .section-style {
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>