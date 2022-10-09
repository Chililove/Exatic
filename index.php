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
        <img src="./assets/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Exatic
    </a>


</nav>

</html>


<?php

$request = $_SERVER['REQUEST_URI'];

echo $request;

switch ($request) {
    case '':
    case '/':
        require __DIR__ . '/index.php';
        break;

    case '/about-us':
        require __DIR__ . '/public/aboutus.php';
        break;

    case '/contact':
        require __DIR__ . '/public/contact.php';
        break;
    case '/product-overview':
        require __DIR__ . '/public/productoverview.php';
        break;
    case '/frontpage':
        require __DIR__ . '/public/frontpage.php';
        break;
    case '/signin':
        require __DIR__ . '/public/login.php';
        break;
    case '/signup':
        require __DIR__ . '/public/signup.php';
        break;
    case '/profile':
        require __DIR__ . '/public/profile.php';
        break;
    case '/checkout':
        require __DIR__ . '/public/checkout.php';
        break;

    case '/product':
        require __DIR__ . '/public/product.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/public/404.php';
        break;
}
