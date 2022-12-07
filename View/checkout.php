<?php
require("rootPath.php");

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
                            <small class="text-muted">Quantity: <?php echo $cartItem['stockQuantity'] ?> X Price: $<?php echo $cartItem['price'] ?></small>
                        </div>
                        <span class="text-muted">$<?php echo $cartItem["stockQuantity"] * $cartItem["price"] ?></span>
                    </li>
            <?php
                }
            }
            ?>

            <li class="list-group-item d-flex justify-content-between">
                <span>Total (DKK)</span>
                <strong>$<?php echo number_format($total, 2); ?></strong>
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
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo (isset($fnameValue) && !empty($fnameValue)) ? $fnameValue : '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo (isset($lnameValue) && !empty($lnameValue)) ? $lnameValue : '' ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo (isset($emailValue) && !empty($emailValue)) ? $emailValue : '' ?>">
            </div>

            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="<?php echo (isset($addressValue) && !empty($addressValue)) ? $addressValue : '' ?>">
            </div>

            <div class="mb-3">
                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite" value="<?php echo (isset($address2Value) && !empty($address2Value)) ? $address2Value : '' ?>">
            </div>

            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="country">Country</label>
                    <select class="custom-select d-block w-100" name="country" id="country">
                        <option value="">Choose...</option>
                        <option value="Denmark">Denmark</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" name="zipcode" placeholder="" value="<?php echo (isset($zipCodeValue) && !empty($zipCodeValue)) ? $zipCodeValue : '' ?>">
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