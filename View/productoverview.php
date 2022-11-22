<?php
require("rootPath.php");

require $rootPath . "Model/POverviewModel.php";
require $rootPath . "Controller/POverviewController.php";


?>



<!doctype html>
<html lang="en">




    <?php

    $overview = $_SERVER['QUERY_STRING'];
    $product_details = "SELECT * FROM Product p, ProductType pt WHERE p.productTypeID = pt.producttypeID AND p.productID = $overview";
    $overviewResult = mysqli_query($conn, $product_details);
    while ($row = mysqli_fetch_assoc($overviewResult)) { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-4 item-photo">
                    <a href="/product-overview?<?php echo $row['productID']; ?>"><img class="card-img-top" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="Card image top" /></a>
                </div>
                <div class="col-xs-5" style="border:0px solid gray">

                    <h3><?php echo $row['title']; ?></h3>
                    <h5 style="color:#337ab7"><a href="#"><?php echo $row['typeName']; ?></a> / <a href="#"> <?php echo $row['brand']; ?></a> · <small style="color:#337ab7">(50 likes)</small></h5>


                    <h6 class="title-price"><small>Price</small></h6>
                    <h3 style="margin-top:0px;"><?php echo $row['price']; ?> KRR</h3>


                    <div class="section">
                        <h6 class="title-attr" style="margin-top:15px;"><small>country</small></h6>
                        <div>
                            <div class="attr2"><?php echo $row['country']; ?></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr"><small>In Stock</small></h6>
                        <div>
                            <div class="attr2"><?php echo $row['stockQuantity']; ?></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>QUANTITY</small></h6>
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input value="1" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                    </div>


                    <div class="section" style="padding-bottom:20px;">
                        <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> ADD TO CART</button>
                        <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> Bookmark Product</a></h6>
                    </div>
                </div>

                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active">Information</li>
                        <li>Shipping</li>
                        <li>Ingredients</li>
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <small>
                                <?php echo $row['description']; ?>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <div class="container-fluid" style="text-align: center">
        <div class="row">
            <div class="col-md-8">
                <div class="row bsp_row-underline">
                    <div class="col-md-6">
                        <span class="pull-left bsp_deal-text">Recommended <Products></Products></span>
                    </div>
                    <div class="col-md-6">
                        <a href="/product">
                            <span class="pull-right bsp_view-all">View all <i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_assoc($recommendResult)) { ?>
                        <div class="col-md-3 bsp_padding-0">
                            <div class="bsp_bbb_item">
                                <a href="/product-overview?<?php echo $row['productID']; ?>"><img class="card-img-top" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="Card image top" /></a>
                                <h5 class="bsp_card-title"><?php echo $row['title'] ?></h5>
                                <div class="text-center">
                                    <p class="bsp_card-text"> <?php echo $row['price'] ?> KRR</p>
                                    <p><?php echo $row['brand'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</html>
