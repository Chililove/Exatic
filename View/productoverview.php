<?php
require("rootPath.php");

require $rootPath . "Model/POverviewModel.php";
require $rootPath . "Controller/POverviewController.php";
require $rootPath . "Controller/CartController.php";

?>



<!doctype html>
<html lang="en">

<head>
    <title>Product Details</title>
    <?php if ($isSuccess) { ?>
        <div class="alert alert-success text-center" role="alert">
            <strong>Success!</strong> Product added to your shopping cart.
        </div>
    <?php } ?>
    <?php if ($isUpdated) { ?>
        <div class="alert alert-warning text-center" role="alert">
            <strong>Product quantity updated</strong>
        </div>
    <?php } ?>
</head>

<body>
    <iframe name="productdetails" style="display:none;"></iframe>

    <div class="container-fluid h-100">
        <div class="row d-flex justify-content-center h-100">
            <div class="container-fluid d-flex">
                <?php
                $overview = $_SERVER['QUERY_STRING'];
                $product_details = "SELECT * FROM Product p, ProductType pt WHERE p.productTypeID = pt.productTypeID AND p.productID = $overview";
                $overviewResult = $conn->query($product_details);
                while ($row = $overviewResult->fetch(PDO::FETCH_ASSOC)) { ?>

                    <div class="col-6">

                        <a href="/product-overview?<?php echo $row['productID']; ?>"><img class="rounded img-fluid mx-auto d-block" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="450" height="250" alt="Card image top" /></a>
                    </div>

                    <div class="col-6" style="padding-top:3%;">

                        <div class="overlay-right d-flex justify-content-end">

                            <div class="col">

                                <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>" target="productdetails">

                                    <!-- <div class="section"> -->
                                    <h3 class="text-font"><?php echo $row['title']; ?></h3>
                                    <h5 style="color:#337ab7"><span><?php echo $row['typeName']; ?></span> / <span> <?php echo $row['brand']; ?></span>
                                    </h5>
                                    <!-- </div> -->

                                    <h6 class="title-font"><small>Price:</small></h6>
                                    <h3><?php echo $row['price']; ?>kr.</h3>


                                    <div class="section">
                                        <h6 class="title-attr" style="padding-top:10px;"><small>Country:</small>

                                            <span class="attr2"><?php echo $row['country']; ?></span>
                                        </h6>
                                    </div>
                                    <div class="section" style="padding-bottom:5px;">
                                        <h6 class="title-attr"><small>In Stock:</small>

                                            <span class="attr2"><?php echo $row['stockQuantity']; ?></span>

                                        </h6>
                                    </div>
                                    <div class="section" style="padding-bottom:20px; width:50%;">

                                        <div>
                                            <span class="title-attr"><small>Quantity</small></sp>
                                                <input style="width: 40%; height:70%; text-align: center" type="number" name="stockQuantity" value="1" min="1" class="form-control" />
                                        </div>
                                    </div>


                                    <div class="section" style="padding-bottom:20px; width:50%">

                                        <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                        <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />
                                        <input type="hidden" name="productImage" value="<?php echo $row["productImage"]; ?>" />

                                        <input type="hidden" name="description" value="<?php echo $row["description"]; ?>" />


                                        <input type="submit" name="add_to_cart" style="margin-bottom:2%;" class="btn add-cart px-auto" value="ADD TO CART" />

                                        <!--  <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> ADD TO CART</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-12 text-font" style="width:100%;border-top:1px solid silver">

                            <small>
                                <?php echo $row['description']; ?>
                            </small>

                        </div>

                    </div>

                <?php } ?>
            </div>





            <div class="container-fluid h-100" style="text-align: center; padding-top:2%;">
                <div class="col" style="background: #C3DBB6">
                    <div class="overlay-right d-flex flex-row justify-content-between">
                        <div class="col-2">
                            <span class="text-font" style="font-size:23px;">Recommended</span>
                        </div>
                        <div class="col-0">
                            <a class="btn btn-dark" style="border-radius: 0px;" href="/product">
                                <span class="text-font">View all</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    while ($row = $recommendResult->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-3">
                            <div class="col-12">
                                <a href="/product-overview?<?php echo $row['productID']; ?>"><img class="img-fluid rounded  mx-auto d-block" width="200" height="200" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="Card image top" /></a>
                                <h5 class="bsp_card-title"><?php echo $row['title'] ?></h5>
                                <div class="text-center">
                                    <p class="bsp_card-text"> <?php echo $row['price'] ?> kr.</p>
                                    <!--<p class="text-font"><?php echo $row['brand'] ?></p> -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<style lang="css">
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
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
        border-radius: 0px;
    }

    .text-font {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>