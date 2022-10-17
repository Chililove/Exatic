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
    <div class="container-fluid">
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
                <li style=" margin-left:120%">
                    <a class="nav-link" href="/shoppingcart">
                        <img src="Exatic/assets/bag-plus.svg" style=" width:auto; height:29px;" class="d-inline-block" alt="">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/signin">
                        <img src="Exatic/assets/person-circle.svg" style=" width:auto; height:30px;" class="d-inline-block" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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

    default:
        http_response_code(404);
        require __DIR__ . '/view/404.php';
        break;
}
