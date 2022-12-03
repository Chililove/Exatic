<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        <div class="row-1">
            <div class="container py-4 h-100">
                <img src="Exatic/assets/profilepictures/<?php echo $user["imagePath"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 18%;">
                <div class="row align-items-center h-100">
                    <button type="submit"></button>
                    <div class="col-md-10 col-lg-7 col-xl-5">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-3 p-md-4">
                                <h6 class="mb-4 pb-2 pb-md-0">User information</h6>
                                <fieldset id="fieldset">
                                    <form action="Exatic/profile" method="post">

                                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
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

                                            <!-- <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="password" name="password" class="form-control" placeholder="Password" />
                                                </div>
                                            </div> -->

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
                                                    <input type="streetnumber" value="<?php echo $user["firstName"] ?>" name="streetNumber" class="form-control" placeholder="Street number" required />
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
                                        <?php if (!empty($message)) {
                                            echo "<p>" . $message . "</p>";
                                        } ?>
                                        <input type="submit" value="save">

                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-7 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="cardlist">
                                    <div class="card-header">
                                        Your previous orders:
                                    </div>

                                    <div class="list-group overflow-auto">
                                        <a href="#" class="list-group-item list-group-item-action">
                                            Cras justo odio
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                        <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                                        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>

                                        <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                                    </div>
                                </div>
                            </div>
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