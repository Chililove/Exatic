<?php
require("rootPath.php");

require $rootPath . "Model/HomeModel.php";
require $rootPath . "Controller/HomeController.php";

?>

<!Doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <div class="alert alert-black alert-dismissible fade show text-center event-alert" role="alert">
        <strong>Black Friday!</strong> You should check our products with 20% off.
        <button type="button" class="btn btn-close btn-close-white close-btn-position" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</head>

<body>
    <iframe name="home" class="iframe"></iframe>
    <div class="container-fluid h-100">
        <div class="row d-flex justify-content-center h-100">
            <div class="container-fluid d-flex green-div exatic-background-color">

                <div class="col-6">
                    <div class="text-box">
                        <h3 class="title-welcome">Exatic <br>Asian food <br>Fast delivery <br> Unique products</h3>

                        Find a large variety of asian products <br> and treat family and friends with exotic asian dishes.<br />
                        Grocery shopping made easy. Happy shopping!
                    </div>
                </div>
                <div class="col-6">

                    <div class="overlay-right d-flex col justify-content-end">


                        <div class="col-flex">

                            <img src="/Exatic/assets/pngwingpng.png" alt="img-fluid rounded mx-auto d-block" class="home-logo" />

                            <button class="btn btn-dark btn-daily" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                Click for Daily Special

                            </button>
                        </div>

                        <div>
                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                <div class="card card-body w-40">

                                    <?php
                                    while ($row = $dailyResult->fetch(PDO::FETCH_ASSOC)) {
                                    ?>

                                        <div class="card">

                                            <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>" target="home">
                                                <div class="row d-flex flex-row justify-content-center">
                                                    <a href="/product-overview.php?productID=<?php echo $row['productID']; ?>">
                                                        <?php if ($row['isDailySpecial']) {
                                                            echo '<span class="badge bg-warning">Daily Special</span>';
                                                        } ?>
                                                        <img class="rounded mx-auto d-block" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="250" height="250"></img>

                                                    </a>
                                                    <div class="overlay-right d-flex flex-row justify-content-end">
                                                        <div class="card-text">
                                                            <input type="number" name="stockQuantity" value="1" min="1" class="form-control quantity-input" />
                                                        </div>
                                                        <p class="card-body text-end daily-price"><?php echo $row["price"]; ?> kr</p>
                                                    </div>
                                                </div>

                                                <div class="card-body text-center mx-auto">
                                                    <h5 class="card-text font-weight-bold"><?php echo $row["title"]; ?></h5>
                                                    <h8 class="card-text font-weight:100"><?php echo substr($row["description"], 0, 45); ?></h8>

                                                    <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                                    <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />

                                                    <input type="hidden" name="productImage" value="<?php echo $row["productImage"]; ?>" />

                                                    <input type="hidden" name="description" value="<?php echo $row["description"]; ?>" />

                                                    <input type="submit" name="add_to_cart" class="btn cart px-auto" value="Add to Cart" />

                                                </div>
                                            </form>

                                        <?php
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
                                <div class="carousel-item active" data-bs-interval="3000">
                                    <a href="/product"><img src="/assets/product.jpg" class="d-block mx-auto w-100" alt="products"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Exotic Asian Products </h5>
                                        <p>Checkout our variety of asian products</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="4000">
                                    <a href="/about-us"><img src="/assets/aboutus.png" class="d-block mx-auto w-100" alt="products"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Welcome to Exatic </h5>
                                        <p>Learn more about us here</p>
                                        <a href="/about-us" class="btn btn-light" role="button"> Learn more</a>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="/assets/delivery.jpeg" class="d-block mx-auto w-100" alt="Delivery">
                                    <div class="carousel-caption d-none d-md-block text-color-carousel">
                                        <h5>Delivery</h5>
                                        <p>Right at your doorstep!</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="/assets/event.jpg" class="d-block mx-auto w-100" alt="events">
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

                    while ($row = $newsResult->fetch(PDO::FETCH_ASSOC)) {

                    ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-5 d-flex justify-content-center news-section">
                            <div class="card">

                                <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>" target="home">

                                    <a href="/product-overview.php?productID=<?php echo $row['productID']; ?>">
                                        <?php
                                        echo '<span class="badge bg-success">New</span>';
                                        ?>
                                        <img class="rounded mx-auto d-block" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="250" height="250" />

                                    </a>
                                    <div class="overlay-right d-flex flex-row justify-content-between">
                                        <div class="card-text">
                                            <input type="number" name="stockQuantity" value="1" min="1" class="form-control quantity-input" />
                                        </div>
                                        <p class="text-end daily-price"><?php echo $row["price"]; ?> kr</p>
                                    </div>
                                    <div class="card-body text-center mx-auto">

                                        <h5 class="card-text font-weight-bold"><?php echo $row["title"]; ?></h5>
                                        <h8 class="card-text font-weight:100"><?php echo substr($row["description"], 0, 65); ?>...</h8>



                                        <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                        <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />
                                        <input type="hidden" name="productImage" value="<?php echo $row["productImage"]; ?>" />

                                        <input type="hidden" name="description" value="<?php echo $row["description"]; ?>" />


                                        <input type="submit" name="add_to_cart" class="btn cart px-auto" value="Add to Cart" />


                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

</body>


</html>

<style lang="css">
    @import "styles.css";
</style>