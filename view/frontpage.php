<?php
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
        <h1>Welcome to Exatic!</h1>
    </div>
</header>

<body>
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
    <div class="boxed" id="text-box">
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
</div>-->



    <div class="card">
            <img class="card-img-top" src="Exatic/assets/noodles.jpeg" alt="Card image top">
            <div class="card-body">
                <h3 class="card-title">{Pho Bo}</h3> 
                <h4 class="card-subtitle">Delicious noodles</h4>
                <p class="card-text">4 items left</p>
                <p class="card-text-price">Price (18dDkr.) </p>
            </div>
            <div class="card-footer">
                <div><button class="buybtn" onclick="smt">Add to cart</button></div>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="Exatic/assets/drink.jpeg" alt="Card image top">
            <div class="card-body">
                <h3 class="card-title">Kirin IMUSE</h3>
                <h4 class="card-subtitle">Probiotic drink</h4>
                <p class="card-text">10 items left</p>
                <p class="card-text-price">Price (24Dkr.)</p>
            </div>
            <div class="card-footer"><button class="buybtn" onclick="smt">Add to cart</button></div>
        </div>

    </div>
    <style>
        #carousel {
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



        #text-box {
            position: absolute;
            border-style: hidden;
            align-content: center;
            font-family: "Apple SD Gothic Neo";
            color: #434343;
            margin-right: 50%;
            margin-left: 5%;
            margin-top: 2%;
            line-height: 25px;
            font-size: 19px;
        }


        body {

            background-color: #eee;
        }

        .container {
            width: 70%;
        }

        .card-deck {
            display: flex;
            width: 60%;
            margin-left: 16%;
            align-content: space-between;

        }

        .card {
            background-color: #fff;
            border-radius: 8%;
            width: 30%;
            margin-top: 40%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .card-text-price {
            text-align: right;
            font-size: small;
            margin-top: -6%;

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
            font-weight: lighter;
        }


        .card-img-top {
            width: 100%;
            height: 11vw;
            margin-top: 3%;
            object-fit: contain;


        }



        .buybtn {
            opacity: 88%;
            margin-left: 56%;
        }

        /* .image-container {

            position: relative;

        }*/

        .thumbnail-image {
            border-radius: 10px !important;

        }


        .discount {

            background-color: red;
            padding-top: 1px;
            padding-bottom: 1px;
            padding-left: 4px;
            padding-right: 4px;
            font-size: 10px;
            border-radius: 6px;
            color: #fff;
        }


        .first {

            position: absolute;
            width: 100%;
            padding: 9px;
        }



        .btn {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            padding: 3px;
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




        .vouchers {
            background-color: #fff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            overflow: hidden;
            margin-top: -1%;

        }

        .voucher-divider {

            display: flex;

        }

        .voucher-left {
            width: 60%
        }


        .voucherstop {
            position: absolute;
            background-color: #fff;
            border: none;
            width: 38%;
            height: 6.8%;
            margin-top: -1%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            overflow: hidden;
        }

        .voucher-nametop {
            color: grey;
            font-size: 120%;
            font-weight: normal;
        }

        .voucher-codetop {
            color: red;
            font-size: 100%;
            font-weight: lighter;
        }

        .voucher-righttop {
            width: 42%;
            background-color: lightgreen;
            color: #fff;
        }


        .discount-percent {
            font-size: 100%;
            font-weight: bold;
            position: relative;
            top: 5px;
        }

        .off {
            font-size: 100%;
            position: relative;
            bottom: 5px;
        }

        .product_descript {
            font-size: x-small;
        }

        .discountedItem {
            margin-left: 62%;
            width: 35%;
        }
    </style>
</body>

</html>