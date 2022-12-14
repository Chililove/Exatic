<!Doctype html>
<html lang="en">

<head>
    <title>Exatic</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <script src="https://kit.fontawesome.com/fe76d7cf69.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles.css" type="text/css">
</head>

</html>

<header>
    <!-- Navigation Bar -->
    <nav class="navbar sticky-top navbar-expand-lg exatic-background-color">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="/home">
                <img src="/assets/exatic-logo-2.png" width="50" height="50" class="d-inline-block logo" alt="Logo">
            </a>
            <!--responsive aka  burger for mobile ver.--->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse content-center" id="navbarNav" role="navigation">

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
                    <!-- Cart -->
                    <li class="nav-item shopping-cart">
                        <a class="nav-link" href="/shopping-cart"> <img src="/assets/nav-icons/bag-plus.svg" class="cart-icon d-inline-block img-fluid" alt="cart">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                <?php if (!empty($_SESSION["shopping_cart"])) {
                                    echo $product_count = array_sum(array_column($_SESSION['shopping_cart'], 'stockQuantity'));
                                }
                                ?>
                                <span class="visually-hidden">added items</span>
                            </span>
                        </a>
                    </li>

                    <!-- switching between admin and user profile :) -->
                    <li class="nav-item login">
                        <?php if (isset($_SESSION["userID"]) && $_SESSION['userType'] == 0) { ?>
                            <a class="nav-link" href="/admin-profile">
                                <img src="/assets/nav-icons/person-circle.svg" class="login-icon d-inline-block" alt="login">
                            </a>
                            <?php
                        } else {
                            if (isset($_SESSION["userID"])) { ?>
                                <a class="nav-link" href="/profile">
                                    <img src="/assets/nav-icons/person-circle.svg" class="login-icon d-inline-block" alt="login">
                                </a>
                            <?php
                            } else {
                            ?>
                                <a class="nav-link" href="/signin">Login</a>
                        <?php
                            }
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<style lang="css">
    @import "styles.css";
</style>