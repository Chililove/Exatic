<section class="h-100 h-custom" style="background-color: whitesmoke; display:block; overflow:auto">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                        <h6 class="mb-0 text-muted">3 items</h6>

                                    </div>
                                    <hr class="my-4">
                                    <!-- Product -->
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <?php
                                        if (!empty($_SESSION["shopping_cart"])) {

                                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                        ?>

                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>

                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-black mb-0"><?php echo $values["title"]; ?></h6>
                                                    <h6 class="text-muted">Cotton T-shirt</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1  text-center">
                                                    <h6 class="mb-0"><?php echo $values["stockQuantity"]; ?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 text-center">
                                                    <h6 class="mb-0"> <?php echo $values["price"]; ?> kr</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-center">
                                                    <a class="text-muted" href="/product?action=delete&productID=<?php echo $values["productID"]; ?>"><span class="text-danger">X</span></a>
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
                                        <h6 class="mb-0"><a href="/product" class="text-body">Continue shopping</a></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout -->
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
                                                    if (!empty($_SESSION["shopping_cart"])) {
                                                        $total = 0;
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
                                                                    <p class="mb-0" style="font-weight: 400;"> <?php echo $values["price"]; ?>kr</p>
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

                                    <!-- <h5 class="text-uppercase mb-3">Shipping</h5>

                                <div class="mb-4 pb-2">
                                    <select class="select">
                                        <option value="1">Standard-Delivery- €5.00</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                </div> 

                                    <h5 class="text-uppercase mb-3">Give code</h5>

                                    <div class="mb-5">
                                        <div class="form-outline">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea2">Enter your code</label>
                                        </div>
                                    </div> -->


                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5><?php echo number_format($total, 2); ?> kr.</h5>
                                    </div>
                                    <div class="">
                                        <a href="/checkout" type="button" class="btn btn-dark btn-lg" data-mdb-ripple-color="dark">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style lang="css">
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .bg-grey {
        background-color: #C3DBB6;
    }

    @media (min-width: 992px) {
        .card-registration-2 .bg-grey {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    }

    @media (max-width: 991px) {
        .card-registration-2 .bg-grey {
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    }
</style>