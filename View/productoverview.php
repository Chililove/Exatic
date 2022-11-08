<?php
require_once("connection/conn.php");

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product-Overview</title>
</head>
<body>
<?php

$product = $_SERVER['QUERY_STRING'];

$product_details = "SELECT * FROM product WHERE productID = $product";

$result = mysqli_query($conn, $product_details);
echo $_SERVER['QUERY_STRING'];
while ($row = mysqli_fetch_assoc($result)) { ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4 item-photo">
            <img style="max-width:100%;" src="../assets/anime.jpg" />
        </div>
        <div class="col-xs-5" style="border:0px solid gray">

            <h3><?php echo $row['title']; ?></h3>
            <h5 style="color:#337ab7"><a href="#">Food</a> / <a href="#"> <?php echo $row['brand']; ?></a> · <small style="color:#337ab7">(50 likes)</small></h5>


            <h6 class="title-price"><small>Price</small></h6>
            <h3 style="margin-top:0px;"><?php echo $row['price']; ?></h3>


            <div class="section">
                <h6 class="title-attr" style="margin-top:15px;" ><small>country</small></h6>
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
</body>
</html>

<style>
    ul > li{margin-right:25px;font-weight:lighter;cursor:pointer}
    li.active{border-bottom:3px solid silver;}
    .item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
    .menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
    .btn-success{width:100%;border-radius:0;}
    .section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
    .title-price{margin-top:30px;margin-bottom:0;color:black}
    .title-attr{margin-top:0;margin-bottom:0;color:black;}
    .btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
    .btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}
    div.section > div {width:100%;display:inline-flex;}
    div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}


    @media (max-width: 426px) {
        .container {margin-top:0px !important;}
        .container > .row{padding:0 !important;}
        .container > .row > .col-xs-12.col-sm-5{
            padding-right:0 ;
        }
        .container > .row > .col-xs-12.col-sm-9 > div > p{
            padding-left:0 !important;
            padding-right:0 !important;
        }
        .container > .row > .col-xs-12.col-sm-9 > div > ul{
            padding-left:10px !important;

        }
        .section{width:104%;}
        .menu-items{padding-left:0;}
    }

</style>