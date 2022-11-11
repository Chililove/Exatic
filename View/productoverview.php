<?php
require("rootPath.php");

require $rootPath . "Model/POverviewModel.php";
require $rootPath . "Controller/POverviewController.php";


?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product-Overview</title>
</head>

<body>
    <?php

    $overview = $_SERVER['QUERY_STRING'];

    // $product_details = "SELECT * FROM product WHERE productID = $product";
    $product_details = "SELECT * FROM product p, producttype pt WHERE p.productTypeID = pt.producttypeID AND p.productID = $overview";


    $overviewResult = mysqli_query($conn, $product_details);
    while ($row = mysqli_fetch_assoc($overviewResult)) { ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 item-photo">
                    <a href="/Exatic/product-overview?<?php echo $row['productID']; ?>"><img class="card-img-top" src="/Exatic/assets/<?php echo $row['productImage'] ?>" alt="Card image top" /></a>
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
                        <a href="/Exatic/product">
                            <span class="pull-right bsp_view-all">View all <i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_assoc($recommendResult)) { ?>
                        <div class="col-md-3 bsp_padding-0">
                            <div class="bsp_bbb_item">
                                <a href="/Exatic/product-overview?<?php echo $row['productID']; ?>"><img class="card-img-top" src="/Exatic/assets/<?php echo $row['productImage'] ?>" alt="Card image top" /></a>
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
</body>

</html>

<style lang="css">
    ul>li {
        margin-right: 25px;
        font-weight: lighter;
        cursor: pointer
    }

    li.active {
        border-bottom: 3px solid silver;
    }

    .item-photo {
        display: flex;
        justify-content: center;
        align-items: center;
        border-right: 1px solid #f6f6f6;
    }

    .menu-items {
        list-style-type: none;
        font-size: 11px;
        display: inline-flex;
        margin-bottom: 0;
        margin-top: 20px
    }

    .btn-success {
        width: 100%;
        border-radius: 0;
    }

    .section {
        width: 100%;
        margin-left: -15px;
        padding: 2px;
        padding-left: 15px;
        padding-right: 15px;
        background: #f8f9f9
    }

    .title-price {
        margin-top: 30px;
        margin-bottom: 0;
        color: black
    }

    .title-attr {
        margin-top: 0;
        margin-bottom: 0;
        color: black;
    }

    .btn-minus {
        cursor: pointer;
        font-size: 7px;
        display: flex;
        align-items: center;
        padding: 5px;
        padding-left: 10px;
        padding-right: 10px;
        border: 1px solid gray;
        border-radius: 2px;
        border-right: 0;
    }

    .btn-plus {
        cursor: pointer;
        font-size: 7px;
        display: flex;
        align-items: center;
        padding: 5px;
        padding-left: 10px;
        padding-right: 10px;
        border: 1px solid gray;
        border-radius: 2px;
        border-left: 0;
    }

    div.section>div {
        width: 100%;
        display: inline-flex;
    }

    div.section>div>input {
        margin: 0;
        padding-left: 5px;
        font-size: 10px;
        padding-right: 5px;
        max-width: 18%;
        text-align: center;
    }




    .bsp_row-underline {

        content: "";
        display: block;
        border-bottom: 2px solid #3cdb37;
        margin-bottom: 20px
    }

    .bsp_deal-text {

        margin-left: -10px;
        font-size: 25px;
        margin-bottom: 10px;
        color: #000;
        font-weight: 700;
    }

    .bsp_view-all {

        margin-right: -10px;
        font-size: 14px;
        margin-top: 10px;

    }

    .bsp_padding-0 {

        padding: 3px;
    }

    .bsp_bbb_item {

        padding: 15px;
        background-color: #fff;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        border: solid 1px #e8e8e8;

    }

    .bsp_card-text {

        color: blue;
    }
</style>