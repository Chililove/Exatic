<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</head>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/frontpage">
        <img src="Exatic/assets/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Exatic
    </a>


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
