<?php
require("rootPath.php");

require $rootPath . "Model/ProductModel.php";
require $rootPath . "Controller/ProductController.php";
require $rootPath . "Controller/CartController.php";
?>
<html>
<section class="h-100 h-custom background-on-white scroll">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-lg-8">
                        <div class="p-5 h-100 cart-items-div">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                <h6 class="mb-0 text-muted"><?php echo shopping_cart_product_count(); ?> items</h6>
                            </div>
                            <!-- Product -->
                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                <hr class="my-4">
                                <?php
                                if (!empty($_SESSION["shopping_cart"])) {

                                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                ?>

                                        <div class="col-md-2 col-lg-2 col-xl-2">

                                            <a href="/product-overview.php?productID=<?php echo $values['productID']; ?>"><img class="img-fluid rounded-3 mx-auto card-img-top" src="/Exatic/assets/product/<?php echo $values['productImage'] ?>" alt="Product Image" /></a>
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-black mb-0"><?php echo $values["title"]; ?></h6>
                                            <h6 class="text-muted"><?php echo substr($values["description"], 0, 30); ?>...</h6>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1  text-center">
                                            <h6 class="mb-0"><?php echo $values["stockQuantity"]; ?></h6>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 text-center">
                                            <h6 class="mb-0"> <?php echo $values["price"]; ?> kr</h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-center">
                                            <a type="button" href="/shopping-cart?action=delete&productID=<?php echo $values["productID"]; ?>" class="btn-close text-muted" aria-label="Close"></a>
                                        </div>
                                        <hr class="my-4">
                                    <?php
                                    }

                                    ?>

                                <?php
                                }

                                ?>
                            </div>

                            <div class="pt-5">
                                <h6 class="mb-0"><a href="/product" class="text-body nav-link"><i class="fa-sharp fa-solid fa-arrow-left"></i> Continue shopping</a></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Summary -->
                    <div class="col-lg-4 bg-grey">
                        <div class="p-2">
                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>

                            <div class="d-flex justify-content-between mb-4">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Products</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Total</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            if (!empty($_SESSION["shopping_cart"])) {
                                                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                            ?>
                                                    <tr>
                                                        <th scope="col">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-column ms-0">
                                                                    <p class="mb-2"><?php echo $values["title"]; ?></p>
                                                                </div>
                                                            </div>
                                                        </th>

                                                        <td class="align-middle text-center">
                                                            <p class="mb-0"><?php echo $values["stockQuantity"]; ?></p>
                                                        </td>
                                                        <td class="align-middle">
                                                            <p class="mb-0 font-weight-price"> <?php echo $values["price"]; ?>kr</p>
                                                        </td>
                                                        <td class="align-middle"> <?php echo number_format($values["stockQuantity"] * $values["price"], 2); ?>kr</td>

                                                    </tr>
                                                <?php
                                                    $total = $total + ($values["stockQuantity"] * $values["price"]);
                                                }
                                                ?>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mb-5">
                                <h5 class="text-uppercase">Total price</h5>
                                <h5><?php echo number_format($total, 2); ?> kr.</h5>
                            </div>

                            <a href="/checkout" type="button" class="btn btn-dark btn-lg btn-checkout" data-mdb-ripple-color="dark">Checkout</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

</html>
<style lang="css">
    @import "styles.css";
</style>