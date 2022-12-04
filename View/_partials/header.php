<?php
$PageTitle = "Exatic";
?>
<!Doctype html>
<html lang="en">
<header>

    <!--   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> -->

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

        <title><?= isset($PageTitle) ? $PageTitle : "Default" ?></title>
    </head>
    <!-- Navigation Bar -->
    <nav class="navbar sticky-top navbar-expand-lg" style="background-color: #C3DBB6;">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="/home" >
                <img src="/assets/exatic-logo-2.png" style="margin-left:85%; width:auto; height:45px;" width="35" height="35" class="d-inline-block" alt="Logo">
            </a>
            <!--responsive aka  burger for mobile ver.--->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: center">

                <ul class="navbar-nav mr-auto">
                    <!-- probably remove home? -->
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="/home">Home</a>
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
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li> -->

                    <!-- Cart-preview -->
                    <li class="nav-item" style="position:absolute; right:8%;">
                        <a class="nav-link" href="/shopping-cart"> <img src="/assets/nav-icons/bag-plus.svg" style=" width:auto; height:29px;" class="d-inline-block" alt="cart">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                <?php if (!empty($_SESSION["shopping_cart"])) {
                                    echo  $product_count = array_sum(array_column($_SESSION['shopping_cart'], 'stockQuantity'));
                                }
                                ?>
                                <span class="visually-hidden">added items</span>
                            </span>
                        </a>
                        <!--     <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/nav-icons/bag-plus.svg" style=" width:auto; height:29px;" class="d-inline-block" alt="cart">
                        </a>
                        <div class="dropdown-menu  dropdown-menu-end card-preview">
                             include($rootPath . "View/cart-preview.php") ?>
                        </div> -->

                    </li>



                    <li class="nav-item" style="position:absolute; right:2%;">
                        <?php if (isset($_SESSION["userID"])) {
                        ?>
                            <a class="nav-link" href="/profile">
                                <img src="/assets/nav-icons/person-circle.svg" style=" width:auto; height:30px;" class="d-inline-block" alt="login">
                            </a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link" href="/signin">Login</a>
                        <?php
                        }
                        ?>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<style lang="css">
    /* Cart preview style */

    .card-preview {
        width: 20rem;
        max-width: 20rem;
        height: 40rem;
        overflow: auto;
        background-color: #ffff;
        padding: 1% 1% 0% 2%;
        border: 1% solid #ddd;
        border-radius: 5px;
        box-shadow: 0px 25px 40px #888;
    }
</style>

</html>