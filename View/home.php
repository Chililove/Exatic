<?php
require("rootPath.php");

require $rootPath . "Model/HomeModel.php";
require $rootPath . "Controller/HomeController.php";

?>

<!Doctype html>
<html lang="en">

<head>
    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <!-- I want background to be half page to this color style="background:#C3DBB6;" -->
            <!--  <div style="background:#C3DBB6;"> -->
            <div class="col-6">
                <div class="justify-content-between">
                    <h3 class="title-welcome">Welcome to Exatic</h3>
                </div>
                <div id="text-box">
                    It's very nice to have you here, we hope the experience will please you.<br />Here at Exatic we aim to broaden asian products as well as making them more accessible in Denmark.<br /><br />
                    Here you can find any ingredient you need to cook asian cuisine and treat family and friends with familiar and newly added products.<br />
                    All groceries can be delivered at home.<br />
                    <br />
                    Hopefully you find what you need or maybe get inspired by new products from your familiar brands.
                </div>
            </div>
            <div class="col-6">
                <div class="row">

                    <!--VOUCHER-->
                    <div class="card voucher-stop">
                        <div class="voucher-divider">
                            <!--Fix display:flex + width:62%-->
                            <div class="voucher-left text-center">
                                <span class="voucher-name">A special daily offer</span>
                                <h5 class="voucher-code">#discount</h5>

                            </div>
                            <div class="voucher-right-top text-center border-left">
                                <h5 class="discount-percent">20%</h5>
                                <span>Off</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Daily Special -->
                <div class="row justify-content-end">
                    <?php
                    if (mysqli_num_rows($dailyResult) > 0) {
                        while ($row = mysqli_fetch_assoc($dailyResult)) {
                    ?>

                            <div class="card" style="width: 20rem;">

                                <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>">

                                    <a href="/product-overview?<?php echo $row['productID']; ?>"><img class="mx-auto card-img-top" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="250" height="250" />
                                        <?php if ($row['isDailySpecial']) {
                                            echo '<span class="badge bg-warning">Daily Special</span>';
                                        } ?>
                                    </a>
                                    <div class="card-body text-center mx-auto">
                                        <div class='cvp'>
                                            <h5 class="card-text font-weight-bold"><?php echo $row["title"]; ?></h5>
                                            <h8 class="card-text font-weight:100"><?php echo substr($row["description"], 0, 45); ?></h8>

                                            <div class="overlay-right d-flex flex-row justify-content-between">
                                                <p class="card-text text-start" style="font-size:20px; text-align:center; font-weight:200"> <?php echo $row["stockQuantity"] ?> items left</p>
                                                <p class=" text-end" style="font-size:20px; text-align: center; font-weight:200"><?php echo $row["price"]; ?> kr</p>
                                            </div>

                                            <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />

                                            <input type="submit" name="add_to_cart" style="margin-bottom:5%;" class="btn add-cart px-auto" value="Add to Cart" />

                                        </div>
                                    </div>
                                </form>
                            </div>
                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </div>
            </div>
            <!-- </div> -->

            <!-- News Section-->

            <div class="justify-content-between">
                <h2 class="newProductsHeader">New products in store</h2>
            </div>
            <div class="col">
                <div class="row justify-content-center">
                    <?php

                    if (mysqli_num_rows($newsResult) > 0) {


                        while ($row = mysqli_fetch_assoc($newsResult)) {

                    ?>

                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card" style="width: 300px;">

                                    <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>">

                                        <a href="/product-overview?<?php echo $row['productID']; ?>"><img class="mx-auto card-img-top" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="250" height="250" />
                                            <?php if ($row['isNew']) {
                                                echo '<span class="badge bg-success">New</span>';
                                            } ?>
                                        </a>
                                        <div class="card-body text-center mx-auto">
                                            <div class='cvp'>
                                                <h5 class="card-text font-weight-bold"><?php echo $row["title"]; ?></h5>
                                                <h8 class="card-text font-weight:100"><?php echo substr($row["description"], 0, 65); ?>...</h8>

                                                <div class="overlay-right d-flex flex-row justify-content-between">
                                                    <p class="card-text text-start" style="font-size:20px; text-align:center; font-weight:200"> <?php echo $row["stockQuantity"] ?> items left</p>
                                                    <p class=" text-end" style="font-size:20px; text-align: center; font-weight:200"><?php echo $row["price"]; ?> kr</p>
                                                </div>

                                                <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                                <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />

                                                <input type="submit" name="add_to_cart" style="margin-bottom:5%;" class="btn add-cart px-auto" value="Add to Cart" />

                                            </div>
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
    .card {
        box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
        border-radius: 5px;
        padding-bottom: 5px;
    }

    .add-cart {
        background-color: #212121;
        color: white;
        margin-top: 10px;
        font-size: 12px;
        font-weight: 900;
        width: 90%;
        height: 32px;
        padding-top: 7px;
        box-shadow: 0px 5px 10px #212121;
    }

    .newProductsHeader {
        width: 30%;
        font-size: 30px;
        background-image: linear-gradient(to left, darkgreen, lightgreen, lightskyblue, lightgreen, lightpink, lightgreen);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-left: -2%;
        padding: 3%;


    }

    .title-welcome {
        width: 300px;
        font-size: 30px;
        background-image: linear-gradient(to left, darkgreen, lightgreen, lightskyblue, lightgreen, lightpink, lightgreen);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-left: 3%;
        margin-top: 5%;
        margin-bottom: 5%;

    }

    #text-box {
        font-family: "Apple SD Gothic Neo";
        color: #434343;
        padding-bottom: 15%;
        margin-left: 3%;
        max-width: 100%;
        line-height: 30px;
        font-size: 18px;
    }

    .voucher-stop {
        background-color: #fff;
        width: 80%;
        margin-left: 20%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .voucher-name {
        color: grey;
        font-size: 120%;
        font-weight: normal;
    }

    .voucher-code {
        color: red;
        font-weight: lighter;
    }

    .voucher-right-top {
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 18px 0 rgba(0, 0, 0, 0.19);
        width: 80%;
        background-color: black;
        color: #ffff;
    }

    .voucher-left {
        width: 100%;

    }

    .voucher-divider {
        display: flex;
    }

    .vouchers {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .discount-percent {
        font-size: 100%;
        font-weight: bold;
        position: relative;
        top: 10%;
        margin-bottom: 0%;
    }
</style>