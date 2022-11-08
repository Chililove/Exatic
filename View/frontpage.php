<?php
require_once("connection/conn.php");
?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"> -->
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <div style="width: 200px; font-size: 20px; background-image: linear-gradient(to left, darkgreen, lightgreen, lightskyblue, lightgreen, lightpink, lightgreen);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-right:auto;
  margin-left: 5%;
  margin-top: 2%;
    ">
        <br>
        <h1>Welcome to Exatic!</h1>
    </div>

    <div class="discountedItem">
        <!--VOUCHER-->
        <div class="card voucherstop">

            <div class="embed-responsive embed-responsive-16by9">

                <div class="voucher-divider">
                    <div class="voucher-left text-center">
                        <span class="voucher-nametop" style="font-size: 110%;">A special daily offer</span>
                        <h5 class="voucher-codetop" style="font-size: 100%;">#discount</h5>

                    </div>
                    <div class="voucher-righttop text-center border-left">
                        <h5 class="discount-percent">20%</h5>
                        <span class="off">Off</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<br>

<body>
    <?php

    $products = mysqli_query($conn, "SELECT `productID`, `title`, `price`, `stockQuantity`, `description`, `productImage`, `isDailySpecial` FROM `Product` WHERE isDailySpecial = 1 LIMIT 1");
    if (mysqli_num_rows($products) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($products)) {
    ?>

            <div class="card" id="cardtop">
                <div class="embed-responsive embed-responsive-16by9">

                    <a href="/productoverview"><img class="card-img-top-top" src="data:image/jpeg;base64,<?php echo base64_encode($row['productImage']) ?>" alt="Card image top" /></a>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $row["title"] ?>
                            <?php if ($row['isDailySpecial']) {
                                echo '<span class="badge bg-warning">Daily Special</span>';
                            } ?>
                        </h3>
                        <h4 class="card-subtitle"><?php echo $row["description"] ?></h4>
                        <p class="card-text-price text-end">Price<?php echo $row["price"] ?>dkk</p>
                    </div>
                    <div class="card-footer text-end">
                        <p class="card-text"> <?php echo $row["stockQuantity"] ?> items left</p>
                        <a href="/shoppingcart"> <button type="button" class="btn btn-primary" onclick="">Add to cart</button></a>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "0 results";
    }

    ?>
    <span><br><br><br></span>

    <div class="boxed" id="text-box" style="margin-top: -24%;">
        It's very nice to have you here, we hope the experience will please you.<br />Here at Exatic we aim to broaden asian products as well as making them more accessible in Denmark.<br /><br />
        Here you can find any ingredient you need to cook asian cuisine and treat family and friends with familiar and newly added products.<br />
        All groceries can be deliveried at home.<br />
        <br />
        Hopefully you find what you need or maybe get inspired by new products from your familiar brands.
    </div>

    <!--
    <div carousel>
        <div class="container px-0" id="containermain">
            <div class="container" id="container" style="padding: 0;">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-md-offset-2">

                        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="Exatic/assets/noodles.jpeg" class="img-fluid w-100" alt="green">
                                </div>
                                <div class="carousel-item">
                                    <img src="Exatic/assets/matcha.jpeg" class="img-fluid w-100" alt="pink">
                                </div>
                                <div class="carousel-item">
                                    <img src="Exatic/assets/drink.jpeg" class="img-fluid w-100" alt="study">
                                </div>
                                <div class="carousel-item">
                                    <img src="Exatic/assets/can.jpeg" class="img-fluid rounded thumbnail-image" alt="">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> -->
    <!--
<div class="container">
    <div class="card-deck">
        <div class="card">
            <div class="embed-responsive embed-responsive-16by9">

                <img class="card-img-top embed-responsive-item" src="Exatic/assets/can.jpeg" alt="Card image top">
                <div class="card-body">
                    <h3 class="card-title">Rita Kiwi</h3>
                    <h4 class="card-subtitle">Vietnamese Kiwi Drink</h4>
                    <p class="card-text">2 Items left</p>
                    <p class="card-text-price">Price (20Dkr.)</p>
                    <button class="buybtn" onclick="smt">Add to cart</button>
                </div>
            </div>
        </div>
    </div>
</div> #carousel {
            position: absolute;
            top: 60%;
            right: 0;
            bottom: 0;
            width: 28%;
            opacity: .8;
            filter: alpha(opacity=80);
            font-size: 20px;
            color: #fff;
            text-align: center;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
            border-radius: 100px 1px 0px 1px;
            /*TL TR BR BL*/
            overflow: hidden;
        }
         .image-container {

            position: relative;

        }

        .thumbnail-image {
            border-radius: 10px !important;

        }


         .btn2 {
            border-radius: 30%;
            border-style: groove;
            border-color: lightgreen;
            padding: 3px;
            background-color: lightcyan;
        }

        .item-size {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: #fff;
            border: 1px solid grey;
            color: grey;
            font-size: 10px;
            text-align: center;
            align-items: center;
            display: flex;
            justify-content: center;
        }
  .off {
            font-size: 100%;
            position: relative;
            bottom: 5px;
        }


-->
    <!-- Products array cards limit 3 new -->


    <span>
        <div style="width: 85%; font-size: 20px; background-image: linear-gradient(to left, darkgreen, lightgreen, lightskyblue, lightgreen, lightpink, lightgreen);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-left: 2.9%;
  margin-top: 2%;
  padding:2%;
    ">
            <br><br><br>
            <h1>New products in store..</h1>
        </div>
    </span>
    <div class="container">
        <div class="row row-cols-3">
            <?php

            $products = mysqli_query($conn, "SELECT `productID`, `title`, `price`, `stockQuantity`, `description`, `productImage`, `isNew` FROM `Product` WHERE isNew = 1 LIMIT 3");
            if (mysqli_num_rows($products) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($products)) {
            ?>

                    <div class="col">
                        <div class="card">
                            <div class="embed-responsive embed-responsive-16by9">

                                <a href="/productoverview"><img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($row['productImage']) ?>" alt="Card image top" /></a>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $row["title"] ?>
                                        <?php if ($row['isNew']) {
                                            echo '<span class="badge bg-success">New</span>';
                                        } ?>
                                    </h3>
                                    <h4 class="card-subtitle"><?php echo $row["description"] ?></h4>
                                    <p class="card-text"> <?php echo $row["stockQuantity"] ?> items left</p>
                                    <p class="card-text-price text-end">Price<?php echo $row["price"] ?>dkk</p>
                                </div>
                                <div class="card-footer text-end">
                                    <a href="/shoppingcart"> <button type="button" class="btn btn-primary" onclick="">Add to cart</button></a>
                                </div>
                            </div>
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



    <style>
        .discountedItem {
            object-fit: contain;
        }

        #text-box {
            font-family: "Apple SD Gothic Neo";
            color: #434343;
            margin-right: 50%;
            margin-left: 5%;
            line-height: 25px;
            font-size: 19px;
        }

        .body {
            height: auto;
            width: 100%;
        }

        .container {
            width: 70%;
        }

        .card {
            width: 85%;
            border-radius: 10% 10% 10% 10%;
            box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2), 0 10px 24px 0 rgba(0, 0, 0, 0.19);

        }


        #cardtop {
            width: 18%;
            height: 15%;
            margin-left: 78%;
            margin-right: 5%;
            border-radius: 10% 10% 10% 10%;
            box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2), 0 10px 24px 0 rgba(0, 0, 0, 0.19);



        }


        .card-text-price {
            text-align: right;
            font-size: normal;

        }

        .card-title {
            font-size: large;
            margin-bottom: 3%;
        }

        .card-subtitle {
            margin-bottom: 2%;
            font-size: small;
            font-weight: normal;

        }

        .card-text {
            font-size: smaller;
            font-weight: light;
        }


        .embed-responsive .card-img-top {
            border-radius: 10% 10% 0 0;
            height: 50%;




        }

        .embed-responsive .card-img-top-top {
            border-radius: 10% 10% 0 0;
            height: 10%;
            width: 55%;



        }




        .btn-primary {
            background-color: lightgreen;
            color: #434343;
            box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 12px 0 rgba(0, 0, 0, 0.19);
            border: hidden;


        }

        .voucherstop {

            background-color: #fff;
            border-radius: 10% 10% 10% 10%;
            width: 78%;
            height: 6.8%;
            margin-top: -24%;
            margin-left: 32%;

            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .voucher-nametop {
            color: grey;
            font-size: 120%;
            font-weight: normal;
        }

        .voucher-codetop {
            color: red;
            font-size: 110%;
            font-weight: lighter;
        }

        .voucher-righttop {
            box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 18px 0 rgba(0, 0, 0, 0.19);

            width: 38%;
            background-color: lightgreen;
            color: #fff;
        }

        .voucher-left {
            width: 62%
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
        }

        .discountedItem {
            margin-left: 62%;
            width: 35%;
        }
    </style>
</body>

</html>