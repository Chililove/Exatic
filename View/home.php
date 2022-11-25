<?php
require("rootPath.php");

require $rootPath . "Model/HomeModel.php";
require $rootPath . "Controller/HomeController.php";

?>

<!Doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <div class="alert alert-black alert-dismissible fade show text-center" role="alert">
        <strong>Black Friday!</strong> You should check our products with 20% off.
        <button type="button" class="btn btn-close btn-close-white close-btn-position" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</head>

<body>

    <div class="container-fluid h-100">
        <div class="row d-flex justify-content-center h-100">
            <div class="container-fluid d-flex green-div">

                <div class="col-6">
                    <div class="text-box">
                        <h3 class="title-welcome">Exatic <br>Asian food <br>Fast delivery <br> Unique products</h3>

                        Find a large variety of asian products <br> and treat family and friends with exotic asian dishes.<br />
                        Grocery shopping made easy. Happy shopping!
                    </div>
                </div>
                <div class="col-6">
                    <!--Voucher -->
                    <!-- <div class="coupon">
                        <div class="container">
                            <h3>Welcome to Exatic</h3>
                        </div>
                        <img src="/Exatic/assets/coverexatic.jpeg" alt="Avatar" style="width:100%;">
                        <div class="container" style="background-color:white">
                            <h2><b>20% OFF YOUR PURCHASE</b></h2>
                            <p>Lorem ipsum..</p>
                        </div>
                        <div class="container">
                            <p> <span class="promo">Enjoy products</span></p>
                            <p class="expire">#ExaticDiscount</p>
                        </div>
                    </div> -->

                    <div class="overlay-right d-flex col justify-content-end">


                        <div class="col-flex">

                            <img src="/Exatic/assets/pngwingpng.png" alt="img-fluid rounded mx-auto d-block" style="width:100%;" />

                            <button class="btn btn-dark btn-daily" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                Click for Daily Special

                            </button>
                        </div>

                        <div>
                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                <div class="card card-body w-40">

                                    <?php
                                    if (mysqli_num_rows($dailyResult) > 0) {
                                        while ($row = mysqli_fetch_assoc($dailyResult)) {
                                    ?>

                                            <div class="card">

                                                <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>">
                                                    <div class="row d-flex flex-row justify-content-center">
                                                        <a href="/product-overview?<?php echo $row['productID']; ?>">
                                                            <?php if ($row['isDailySpecial']) {
                                                                echo '<span class="badge bg-warning">Daily Special</span>';
                                                            } ?>
                                                            <img class="rounded mx-auto d-block" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="250" height="250"></img>

                                                        </a>
                                                        <div class="overlay-right d-flex flex-row justify-content-end">
                                                            <div class="card-text">
                                                                <input style="width: 40%; height:70%; text-align: center" type="number" name="stockQuantity" value="1" class="form-control" />
                                                            </div>
                                                            <p class="card-body text-end daily-price"><?php echo $row["price"]; ?> kr</p>
                                                        </div>
                                                    </div>

                                                    <div class="card-body text-center mx-auto">
                                                        <h5 class="card-text font-weight-bold"><?php echo $row["title"]; ?></h5>
                                                        <h8 class="card-text font-weight:100"><?php echo substr($row["description"], 0, 45); ?></h8>

                                                        <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                                        <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />

                                                        <input type="submit" name="add_to_cart" style="margin-bottom:5%;" class="btn add-cart px-auto" value="Add to Cart" />

                                                    </div>
                                                </form>

                                        <?php
                                        }
                                    } else {
                                        echo "No products at the moment :(";
                                    }
                                        ?>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>

            </div>



            <!-- News Section-->
            <div class="container-fluid">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <h3 class="title-news"> Fresh deals and new products </h3>
                        <!--Carousel-->
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="2000">
                                    <a href="/product"><img src="/assets/product.jpg" class="d-block mx-auto w-100" alt="New1"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Exotic Asian Products </h5>
                                        <p>Checkout our variety of asian products</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/delivery.jpeg" class="d-block mx-auto w-100" alt="New3">
                                    <div class="carousel-caption d-none d-md-block" style="color:black;">
                                        <h5>Delivery</h5>
                                        <p>Right at your doorstep!</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="/assets/event.jpg" class="d-block mx-auto w-100" alt="New2">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Events</h5>
                                        <p>Get 20% off on products during events</p>
                                    </div>
                                </div>

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>

                    <!--END Carousel-->

                    <?php

                    if (mysqli_num_rows($newsResult) > 0) {


                        while ($row = mysqli_fetch_assoc($newsResult)) {

                    ?>

                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-5 d-flex justify-content-center" style="padding-bottom:5%;">
                                <div class="card">

                                    <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>">

                                        <a href="/product-overview?<?php echo $row['productID']; ?>">
                                            <?php if ($row['isNew']) {
                                                echo '<span class="badge bg-success">New</span>';
                                            } ?>
                                            <img class="rounded mx-auto d-block" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="250" height="250" />

                                        </a>
                                        <div class="overlay-right d-flex flex-row justify-content-between">
                                            <div class="card-text">
                                                <input style="width: 40%; height:70%; text-align: center" type="number" name="stockQuantity" value="1" class="form-control" />
                                            </div>
                                            <p class="text-end daily-price"><?php echo $row["price"]; ?> kr</p>
                                        </div>
                                        <div class="card-body text-center mx-auto">

                                            <h5 class="card-text font-weight-bold"><?php echo $row["title"]; ?></h5>
                                            <h8 class="card-text font-weight:100"><?php echo substr($row["description"], 0, 65); ?>...</h8>



                                            <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />

                                            <input type="submit" name="add_to_cart" style="margin-bottom:5%;" class="btn add-cart px-auto" value="Add to Cart" />


                                        </div>
                                    </form>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>



                </div>

            </div>
        </div>
    </div>
    </div>

</body>


</html>

<style lang="css">
    .alert-dismissible .btn-close {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2;
        padding: 1rem 1rem;
    }

    .daily-price {
        font-size: 20px;
        padding-right: 5%;
        font-weight: 200;

    }

    .btn-daily {
        margin-bottom: 2%;
        margin-left: 70%;
        font-size: 18px;
    }

    .title-news {
        font-size: 40px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: 5%;
        margin-left: 30%;
    }

    .green-div {
        background: #C3DBB6;
        box-shadow: 0 20px 20px rgba(0, 0, 0, .2);
        width: 100%
    }

    .carousel .carousel-item {
        margin-top: 4%;
        height: 300px;
    }

    .carousel-item img {
        position: absolute;
        object-fit: cover;
        top: 0;
        left: 0;
        min-height: 300px;
    }

    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    .alert-black {
        background: #212121;
        color: white;
        padding: 0.8%;
        margin: 0%;
    }

    .card-body {
        width: fit-content;
        padding: 0px;
    }

    .card {
        box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
        border-radius: 5px;
        padding-bottom: 10%;
        width: 20rem;
        height: 31rem;
    }

    .add-cart {
        background-color: #212121;
        color: white;
        margin-top: 10px;
        font-size: 12px;
        font-weight: 900;
        width: 90%;
        height: 32%;
        padding-top: 2%;
        box-shadow: 0px 5px 10px #212121;
    }

    .title-welcome {
        font-size: 40px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding-bottom: 9%;

    }

    .text-box {
        width: 80%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #434343;
        padding-left: 11%;
        line-height: 30px;
        font-size: 18px;
        padding-top: 12%;
        padding-bottom: 14%;
    }

    /* .coupon {
        border: 5px dotted #bbb; */
    /* Dotted border */
    /*     width: 80%;
        border-radius: 15px;
        /* Rounded border */
    /*      margin: 0 auto;
        /* Center the coupon */
    /*      max-width: 600px;
    }

    .container {
        padding: 2px 16px;
        background-color: #f1f1f1;
    }

    .promo {
        background: #ccc;
        padding: 3px;
    }

    .expire {
        color: red;
    }
    */
</style>