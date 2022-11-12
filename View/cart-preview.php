<!--<div>
    <div class="title">
        <span>Shopping Cart</span>
        <a href="/cart-preview" class="card-link" style="padding-left: 30%; color:red">Remove All</a>
    </div>
</div> -->
<!---Products-->
<!--<div>
<table class="preview-product">
    <br></br>
    <tr>
        <td class="preview-image">
            <img src="/assets/exatic-logo-2.png" />
        </td>
        <td class="product-name">
            Apples
            <br></br>
            <p class="product-price"> 400 kr.</p>
        </td>
    </tr>
</table>
<br> -->


<!-- Total Price -->
<!--<table class="total-price">
    <tr class="total-price-font">
        <td>Total price:</td>
        <td> 5099 kr.</td>
    </tr>
</table>

<br> -->
<!--</div> 
<div style="position:absolute;">
    <a href="/shopping-cart" class="link">Go to shopping cart</a>
</div>
<style lang="css">
    .shopping-cart {
        width: 750px;
        height: 423px;
        margin: 80px auto;
        background: #FFFFFF;
        box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
        border-radius: 6px;

        display: flex;
        flex-direction: column;
    }

    .title {
        height: 60px;
        border-bottom: 1px solid #E1E8EE;
        padding: 20px 10px;
        color: #5E6977;
        font-size: 17px;
        font-weight: 400;

    }



    .preview-product {
        flex-direction: column;
        border-style: ridge;
        border-color: lightgray;
        border-left: hidden;
        border-right: hidden;
        max-width: 98%;
        margin: 2%;
        box-sizing: border-box;
    }

    .preview-image {
        max-width: 25%;

    }

    .preview-image img {
        max-width: 140px;
        height: auto;
    }

    .product-name {
        font-family: verdana;
        font-size: 13px;
        padding-left: 1%;
        max-width: 20%;
    }

    .product-price {
        font-family: verdana;
        font-weight: bold;
    }

    .delete-button {
        color: red;
    }

    .delete-field {
        max-width: 10.5%;
        text-align: right;
    }

    .total-price-font {
        font-size: 13px;
        font-family: verdana;
        font-weight: bold;
    }

    .total-price {
        position: center;
        flex-direction: column;
        border-style: ridge;
        border-color: lightgray;
        border-left: hidden;
        border-right: hidden;
        max-width: 99%;
        margin: 1%;
        box-sizing: border-box;
    }
</style> -->


<!-- shopping cart 2 -->
<section class="h-100 h-custom" style="background-color: white">
    <div class=" container h-100 py-2">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="h5">Shopping Cart</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                <th scope="col">Remove</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_SESSION["shopping_cart"])) {
                                $total = 0;
                                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                            ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <a href="/product-overview?<?php echo $row['productID']; ?>"><img class="mx-auto card-img-top" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="auto" height="auto" /></a>
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2"><?php echo $values["title"]; ?></p>
                                                </div>
                                            </div>
                                        </th>

                                        <td class="align-middle">
                                            <?php echo $values["stockQuantity"]; ?>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;"> <?php echo $values["price"]; ?>kr</p>
                                        </td>
                                        <td class="align-middle"> <?php echo number_format($values["stockQuantity"] * $values["price"], 2); ?>kr</td>
                                        <td class="align-middle">
                                            <div class="d-flex flex-row">
                                                <a href="/product?action=delete&productID=<?php echo $values["productID"]; ?>"><span class="text-danger">X</span></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $total = $total + ($values["stockQuantity"] * $values["price"]);
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td class="align-middle" colspan="3" align="right">Total:</td>
                                    <td class="align-right" align="right"><?php echo number_format($total, 2); ?> kr.</td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Checkout -->
                <!--     <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                                <form>
                                    <div class="d-flex flex-row pb-3">
                                        <div class="d-flex align-items-center pe-2">
                                            <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1v" value="" aria-label="..." checked />
                                        </div>
                                        <div class="rounded border w-100 p-3">
                                            <p class="d-flex align-items-center mb-0">
                                                <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>Credit
                                                Card
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row pb-3">
                                        <div class="d-flex align-items-center pe-2">
                                            <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel2v" value="" aria-label="..." />
                                        </div>
                                        <div class="rounded border w-100 p-3">
                                            <p class="d-flex align-items-center mb-0">
                                                <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit Card
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="d-flex align-items-center pe-2">
                                            <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel3v" value="" aria-label="..." />
                                        </div>
                                        <div class="rounded border w-100 p-3">
                                            <p class="d-flex align-items-center mb-0">
                                                <i class="fab fa-cc-paypal fa-2x fa-lg text-dark pe-2"></i>PayPal
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-xl-6">
                                        <div class="form-outline mb-4 mb-xl-5">
                                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="John Smith" />
                                            <label class="form-label" for="typeName">Name on card</label>
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY" size="7" id="exp" minlength="7" maxlength="7" />
                                            <label class="form-label" for="typeExp">Expiration</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <div class="form-outline mb-4 mb-xl-5">
                                            <input type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                                            <label class="form-label" for="typeText">Card Number</label>
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <input type="password" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                            <label class="form-label" for="typeText">Cvv</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-3">
                                <div class="d-flex justify-content-between" style="font-weight: 500;">
                                    <p class="mb-2">Subtotal</p>
                                    <p class="mb-2">$23.49</p>
                                </div>

                                <div class="d-flex justify-content-between" style="font-weight: 500;">
                                    <p class="mb-0">Shipping</p>
                                    <p class="mb-0">$2.99</p>
                                </div>

                                <hr class="my-4">

                                <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                    <p class="mb-2">Total (tax included)</p>
                                    <p class="mb-2">$26.48</p>
                                </div>

                                <button type="button" class="btn btn-primary btn-block btn-lg">
                                    <div class="d-flex justify-content-between">
                                        <span>Checkout</span>

                                    </div>
                                </button>

                            </div>
                        </div>

                    </div> 
                </div> -->

                <div class="col-lg-4 bg-grey">
                    <div class="p-5">
                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="text-uppercase">items 3</h5>
                            <h5>€ 132.00</h5>
                        </div>

                        <h5 class="text-uppercase mb-3">Shipping</h5>

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
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-5">
                            <h5 class="text-uppercase">Total price</h5>
                            <h5>€ 137.00</h5>
                        </div>

                        <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Register</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }
</style>