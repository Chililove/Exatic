<?php require("connection/conn.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</head>

<nav class="navbar sticky-top navbar-expand-lg" style="background-color: #C3DBB6;">
    <div class="container-fluid justify-content-between">
        <a class="navbar-brand" href="/frontpage">
            <img src="Exatic/assets/exatic-logo-2.png" style="margin-left:85%; width:auto; height:45px;" width="35" height="35" class="d-inline-block" alt="">
        </a>
        <!--responsive aka  burger for mobile ver.--->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 35%;">

            <ul class="navbar-nav mr-auto">
                <!-- probably remove home? -->
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="/frontpage">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about-us">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <!-- Cart-preview -->
                <li class="nav-item dropdown" style="position:absolute; right:6%;">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src=" Exatic/assets/bag-plus.svg" style=" width:auto; height:29px;" class="d-inline-block" alt="">
                    </a>
                    <div class="dropdown-menu  dropdown-menu-end cardpreview">
                        <div class="shopping-cart-preview">
                            <!-- Title -->
                            <div class="title">
                                <span>Shopping Cart</span>
                                <a href="/cart-preview" class="card-link" style="padding-left: 30%; color:red">Remove All</a>
                            </div>
                        </div>
                        <!---Products-->
                        <div class="">
                            <table class="previewTable">
                                <br></br>
                                <tr>
                                    <td class="imageurlfield">
                                        <img src="Exatic/assets/exatic-logo-green.png" />
                                    </td>
                                    <td class="productshortnamefield">
                                        Apples
                                        <br></br>
                                        <p class="productpricefield"> 400 kr.</p>
                                    </td>
                                </tr>
                            </table>
                            <br>


                            <!-- Total Price -->
                            <table class="totalpricetable">
                                <tr class="totalpricefield">
                                    <td>Total price:</td>
                                    <td> 5099 kr.</td>
                                </tr>
                            </table>

                            <br>
                        </div>
                        <div style="position:absolute;">
                            <a href="/shopping-cart" class="link">Go to shopping cart</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item" style="position:absolute; right:2%;">
                    <a class="nav-link" href="/signin">
                        <img src="Exatic/assets/person-circle.svg" style=" width:auto; height:30px;" class="d-inline-block" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- shoopping cart-->

<style>
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

    .cardpreview {
        width: 20rem;
        max-width: 20rem;
        height: 40rem;
        overflow: auto;
        background-color: #fff;
        padding: 1% 1% 0% 2%;
        border: 1% solid #ddd;
        border-radius: 10px;
        box-shadow: 0px 25px 40px #888;
    }

    .previewTable {
        flex-direction: column;
        border-style: ridge;
        border-color: lightgray;
        border-left: hidden;
        border-right: hidden;
        max-width: 98%;
        margin: 2%;
        box-sizing: border-box;
    }

    .imageurlfield {
        max-width: 25%;
    }

    .imageurlfield img {
        max-width: 140px;
        height: auto;
    }

    .productidfield {
        font-family: Courier, monospace;
    }

    .productshortnamefield {
        font-family: verdana;
        font-size: 13px;
        padding-left: 1%;
        max-width: 20%;
    }

    .containername {
        border-color: black;
    }

    .productpricefield {
        font-family: verdana;
        font-weight: bold;
    }

    .deletebutton {
        color: red;
    }

    .deletefield {
        max-width: 10.5%;
        text-align: right;
    }

    .totalpricefield {
        font-size: 13px;
        font-family: verdana;
        font-weight: bold;
    }

    .totalpricetable {
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
</style>



</html>



<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
    case '/':
        require __DIR__ . '/frontpage.php';
        break;

    case '/about-us':
        require __DIR__ . '/view/aboutus.php';
        break;

    case '/contact':
        require __DIR__ . '/view/contact.php';
        break;
    case '/product-overview':
        require __DIR__ . '/view/productoverview.php';
        break;
    case '/frontpage':
        require __DIR__ . '/view/frontpage.php';
        break;
    case '/signin':
        require __DIR__ . '/view/login.php';
        break;
    case '/signup':
        require __DIR__ . '/view/signup.php';
        break;
    case '/profile':
        require __DIR__ . '/view/profile.php';
        break;
    case '/checkout':
        require __DIR__ . '/view/checkout.php';
        break;

    case '/product':
        require __DIR__ . '/view/product.php';
        break;
    case '/shopping-cart':
        require __DIR__ . '/view/shoppingcart.php';
        break;
    case '/cart-preview':
        require __DIR__ . '/view/cart-preview.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/view/404.php';
        break;
}
