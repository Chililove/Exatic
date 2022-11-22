<?php
require("rootPath.php");

require $rootPath . "Model/SignupModel.php";
require $rootPath . "Controller/SignupController.php";

?>
<!doctype html>
<html lang="en">

<head>
    <?php if ($errorEmail) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <strong>Error:</strong> User already exists! Try signup with another email..
        </div>
    <?php } ?>

    <?php if ($signupSucess) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <strong>Sucess:</strong> User succesfully registered! - Go to login :)
        </div>
    <?php } ?>

</head>

<body>
    <section>
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
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

                                <div class="col align-self-end">
                                    <input class="btn bg-success btn-lg" type="submit" name="submit" value="SIGNUP" />
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

        <style>
            @import "../styles/css.scss";

            section {
                font-family: "Roboto", sans-serif;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
        </style>
    </section>
</body>

</html>