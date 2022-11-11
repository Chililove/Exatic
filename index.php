<?php require("connection/conn.php");
session_start();
?>


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
        <a class="navbar-brand" href="/Exatic/home">
            <img src="/Exatic/assets/exatic-logo-2.png" style="margin-left:85%; width:auto; height:45px;" width="35" height="35" class="d-inline-block" alt="">
        </a>
        <!--responsive aka  burger for mobile ver.--->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 35%;">

            <ul class="navbar-nav mr-auto">
                <!-- probably remove home? -->
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="/Exatic/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Exatic/product">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Exatic/about-us">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Exatic/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Exatic/profile">Profile</a>
                </li>

                <!-- Cart-preview -->
                <li class="nav-item dropdown" style="position:absolute; right:6%;">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/Exatic/assets/bag-plus.svg" style=" width:auto; height:29px;" class="d-inline-block" alt="cart">
                    </a>
                    <div class="dropdown-menu  dropdown-menu-end cardpreview">
                        <?php require($rootPath . "View/cart-preview.php") ?>
                    </div>

                </li>
                <li class="nav-item" style="position:absolute; list-style-type: none; right:2%;">
                    <a class="nav-link" href="/Exatic/signin">
                        <img src="/Exatic/assets/nav-icons/person-circle.svg" style=" width:auto; height:30px;" class="d-inline-block" alt="login">
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
/*
spl_autoload_register(function ($class) {
    include($class . ".php");
});

$model = new Model();
$controller = new Controller($model);
$view = new product($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller = $controller->{$_GET['action']}();
}
echo $view->output();
*/
//$request = $_SERVER['REQUEST_URI'];
$urlpath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Reqex to match everything until .php or ?
$regex = '/.+?(?=.php|\?)/';

// Apply regex to request ($parsedRequest is the result)
preg_match($regex, $urlpath, $parsedRequest);

$toCheck;
if (isset($parsedRequest[0])) {
    $toCheck = $parsedRequest[0];
} else {
    $toCheck = $urlpath;
}



switch ($toCheck) {
    case '':
        //doesnt redirecct case "/"
    case '/':
        require __DIR__ . '/View/home.php';
        break;

    case '/Exatic/about-us':
        require __DIR__ . '/View/aboutus.php';
        break;

    case '/Exatic/contact':
        require __DIR__ . '/View/contact.php';
        break;
    case '/Exatic/product-overview':
        require __DIR__ . '/View/productoverview.php';
        break;
    case '/Exatic/home':
        require __DIR__ . '/View/home.php';
        break;
    case '/Exatic/signin':
        require __DIR__ . '/View/login.php';
        break;
    case '/Exatic/signup':
        require __DIR__ . '/View/signup.php';
        break;
        //remove from navbar after login is complete
    case '/Exatic/profile':
        require __DIR__ . '/View/profile.php';
        break;
    case '/Exatic/checkout':
        require __DIR__ . '/View/checkout.php';
        break;
    case '/Exatic/product':
        require __DIR__ . '/View/product.php';
        break;
    case '/Exatic/shopping-cart':
        require __DIR__ . '/View/shoppingcart.php';
        break;
    case '/Exatic/cart-preview':
        require __DIR__ . '/View/cart-preview.php';
        break;
    case '/Exatic/product-admin':
        require __DIR__ . '/View/adminProduct.php';
        break;
    case '/Exatic/product-admin-add':
        require __DIR__ . '/View/adminProductAdd.php';
        break;
    case '/Exatic/test':
        require __DIR__ . '/View/test.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/View/404.php';
        break;
}
