<?php
require("rootPath.php");

require $rootPath . "Model/ProfileModel.php";
require $rootPath . "Model/OrderModel.php";


require $rootPath . "Controller/CheckoutController.php";


?>


<div class="row mt-3">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"><?php echo $cartItemCount; ?></span>
        </h4>
        <ul class="list-group mb-3">
            <?php
            $total = 0;
            if (!empty($_SESSION["shopping_cart"])) {
                foreach ($_SESSION["shopping_cart"] as $keys => $cartItem) {
                    $total += $cartItem["stockQuantity"] * $cartItem["price"];
            ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?php echo $cartItem['title'] ?></h6>
                            <small class="text-muted">Quantity: <?php echo $cartItem['stockQuantity'] ?> X Price: <?php echo $cartItem['price'] ?> kr.</small>
                        </div>
                        <span class="text-muted"><?php echo $cartItem["stockQuantity"] * $cartItem["price"] ?>kr.</span>
                    </li>
            <?php
                }
            }
            ?>

            <li class="list-group-item d-flex justify-content-between">
                <span>Total (DKK)</span>
                <strong><?php echo number_format($total, 2); ?> kr.</strong>
            </li>
        </ul>
    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <?php
        if (isset($errorMsg) && count($errorMsg) > 0) {
            foreach ($errorMsg as $error) {
                echo '<div class="alert alert-danger">' . $error . '</div>';
            }
        }
        ?>
        <form class="needs-validation" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $user["firstName"] ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $user["lastName"] ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo $user["email"] ?>">
            </div>

            <div class="mb-3">
                <label for="streetName">Streetname</label>
                <input type="text" class="form-control" name="streetName" placeholder="Main St" value="<?php echo $user["streetName"] ?>">
            </div>
            <div class="mb-3">
                <label for="streetNumber">Streetnumber</label>
                <input type="text" class="form-control" name="streetNumber" placeholder="1234" value="<?php echo $user["streetNumber"] ?>">
            </div>




            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="postalCodeID"></label>
                    <select class="custom-select d-block w-100" name="postalCodeID">
                        <option value="<?php echo $user["postalCodeID"] ?>"><?php echo $user["postNumber"] . " " . $user["cityName"] ?></option>
                        <?php foreach ($cities as $city) {
                            echo '<option value="' . $city["postalCodeID"] . '">' . $city["postNumber"] . ' ' . $city["cityName"] . '</option>';
                        } ?>

                    </select>
                </div>

            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="cashOnDelivery" name="cashOnDelivery" type="radio" class="custom-control-input" checked="">
                    <label class="custom-control-label" for="cashOnDelivery">Cash on Delivery</label>
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="submit">Continue to checkout</button>
        </form>
    </div>
</div>