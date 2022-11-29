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

</head>

<body>
    <section>
        <div class="row">
            <div class="container py-4 h-100">
                <img src="Exatic/assets/default.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 18%;">
                <div class="row align-items-center h-100">
                    <div class="col-10 col-lg-7 col-xl-5">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-3 p-md-4">
                                <h6 class="mb-4 pb-2 pb-md-0">User information</h6>
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
                                    <?php if (!empty($message)) {
                                        echo "<p>" . $message . "</p>";
                                    } ?>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="cardlist">
                        <div class="card-header">
                            Your previous orders:
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                Cras justo odio
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                            <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                            <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                            <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
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

            .cardlist {
                width: 45%;
                align-self: center;


            }
        </style>
        <div class="logout" style="margin-left: 92%;">
            <a class="btn btn-primary m-3" href="/logout">Logout</a>

        </div>
    </section>

</body>

</html>