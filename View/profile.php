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

</head>

<body>
    <section>
        <div class="row-1">
            <div class="container py-4 h-100">
                <img src="Exatic/assets/profilepictures/<?php echo $user["imagePath"] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 18%;">

                <div class="row align-items-center h-100">
                    <div class="col-md-10 col-lg-7 col-xl-5">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" class="imgSelect">

                            <div class="card-body p-3 p-md-4">
                                <h6 class="mb-3 pb-2 pb-md-0">User information</h6>
                                <fieldset id="fieldset">
                                    <form action="Exatic/profile" method="post">

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
        </div>
        </div>
        <style>
            @import "../styles/css.scss";


            section {
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
        <a class="btn btn-primary" href="/logout">Log out</a>
    </section>

</body>

</html>