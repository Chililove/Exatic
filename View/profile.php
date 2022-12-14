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
                    <div class="author-card pb-3">
                        <div class="author-card-profile">
                            <div class="author-card-avatar"><img src="Exatic/assets/profilepictures/<?php echo $user["imagePath"] ?? 'default.jpg' ?>" alt="">
                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" class="imgSelect">
                            </div>
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
                                <h6 class="mb-4 pb-2 pb-md-0">Address Information</h6>
                                <div class="form-outline">
                                    <input type="streetName" value="<?php echo $user["streetName"] ?>" name="streetName" class="form-control" placeholder="Name of the street" required />
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

<a class="btn admin-button" href="/logout">Log out</a>

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

    .admin-button {
        background: #212121;
        color: white;
        border-radius: 0;
    }
</style>