<?php
require("rootPath.php");

require $rootPath . "Model/ProductModel.php";
require $rootPath . "Controller/ProductController.php";
require $rootPath . "Controller/CartController.php";


?>


<!Doctype html>
<html lang="en">


<head>
    <title>Product</title>
    <?php if ($isSuccess) { ?>
        <div class="alert alert-success text-center" role="alert">
            <strong>Success!</strong> Product added to your shopping cart.
        </div>
    <?php } ?>
    <?php if ($isUpdated) { ?>
        <div class="alert alert-warning text-center" role="alert">
            <strong>Product quantity updated</strong>
        </div>
    <?php } ?>

</head>

<body>
    <div class="text-center container py-2">
        <!--TO DO: NAV Categories Functionality -->


        <ul class="nav justify-content-center">
            <?php
            if (mysqli_num_rows($productTypeResult) > 0) {
                while ($row = mysqli_fetch_array($productTypeResult)) {
            ?>
                    <li class="nav-item">
                        <a style="color:black; font-weight:500;" class="nav-link active" aria-current="page" href="/product?action=products&productTypeID=<?php echo $row['productTypeID'] ?>">
                            <?php echo $row["typeName"]; ?>
                        </a>
                    </li>

            <?php }
            } ?>
            <!-- Future categories with sub-categories-->
            <!--  <li class="nav-item dropdown">
                <a style="color:black; font-weight:500;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Brands</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">BrandTest1</a></li>
                    <li><a class="dropdown-item" href="#">BrandTest2</a></li>
                    <li><a class="dropdown-item" href="#">BrandTest3</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a style="color:black; font-weight:500;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Country</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">CountryTest1</a></li>
                    <li><a class="dropdown-item" href="#">CountryTest2</a></li>
                    <li><a class="dropdown-item" href="#">CountryTest3</a></li>
                </ul>
            </li> -->

        </ul>

    </div>
    <!--Product-->

    <div class="container-fluid">
        <div class="row justify-content-center" style="margin-bottom:5%;">

            <?php
            if (mysqli_num_rows($productResult) > 0) {
                while ($row = mysqli_fetch_array($productResult)) {
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-5 d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">

                            <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>">

                                <a href="/product-overview?<?php echo $row['productID']; ?>"><img class="rounded mx-auto d-block" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="250" height="250" /></a>
                                <div class="card-body text-center mx-auto">
                                    <div class='cvp'>


                                        <h5 class="card-text font-weight-bold"><?php echo $row["title"]; ?></h5>
                                        <div class="overlay-right d-flex flex-row justify-content-center">
                                            <div class="card-text">
                                                <input style="width: 40%; height:70%; text-align: center" type="number" name="stockQuantity" value="1" min="0" class="form-control" />
                                            </div>
                                            <p class="text-end" style="font-size:20px; text-align: center; font-weight:200"><?php echo $row["price"]; ?> kr</p>


                                        </div>

                                        <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                        <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />
                                        <input type="hidden" name="productImage" value="<?php echo $row["productImage"]; ?>" />

                                        <input type="submit" name="add_to_cart" style="margin-bottom:5%;" class="btn cart px-auto" value="Add to Cart" />

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>









    <!-- Pagination -->
    <nav class="d-flex justify-content-center">
        <?php
        // set default values
        $limit = 8;
        $skip = 0;

        if (isset($_GET['limit']) && $_GET['limit']) {
            $limit = $_GET['limit'];
        }
        if (isset($_GET['skip']) && $_GET['skip']) {
            $skip = $_GET['skip'];
        }
        ?>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="/product?action=products&productTypeID=<?php echo ($row['productTypeID']) ?>&limit=<?php echo ($limit) ?>&skip=<?php
                                                                                                                                                                                                                if (($skip - $limit) >= 0) {
                                                                                                                                                                                                                    echo ($skip - $limit);
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo ($skip);
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?>">Previous</a></li>
            <?php
            $pages = ceil($productResultCount->num_rows / $limit);
            for ($i = 0; $i < $pages; $i++) {
            ?>
                <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="/product?action=products&productTypeID=<?php echo ($row['productTypeID']) ?>&limit=<?php echo ($limit) ?>&skip=<?php echo ($limit * $i) ?>"><?php echo ($i + 1); ?></a></li>
            <?php
            }
            ?>
            <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="/product?action=products&productTypeID=<?php echo ($row['productTypeID']) ?>&limit=<?php echo ($limit) ?>&skip=<?php
                                                                                                                                                                                                                if (($skip + $limit) <= ($productResultCount->num_rows)) {
                                                                                                                                                                                                                    echo ($skip + $limit);
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo ($skip);
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?>">Next</a></li>
        </ul>


    </nav>

</body>

<!-- <h3>Order Details for testing</h3>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>
       <?php
        if (!empty($_SESSION["shopping_cart"])) {
            $total = 0;
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        ?>
                <tr>
                    <td><?php echo $values["title"]; ?></td>
                    <td><?php echo $values["stockQuantity"]; ?></td>
                    <td>$ <?php echo $values["price"]; ?></td>
                    <td>$ <?php echo number_format($values["stockQuantity"] * $values["price"], 2); ?></td>
                    <td><a href="/product?action=delete&productID=<?php echo $values["productID"]; ?>"><span class="text-danger">Remove</span></a></td>
                </tr>
            <?php
                $total = $total + ($values["stockQuantity"] * $values["price"]);
            }
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">$ <?php echo number_format($total, 2); ?></td>
                <td></td>
            </tr>
        <?php
        }
        ?>

    </table>
</div> -->

</html>

<style lang="css">
    .card-text {
        font-size: 15px;
    }

    .cart {
        background-color: #212121;
        color: white;
        margin-top: 10px;
        font-size: 12px;
        font-weight: 900;
        width: 90%;
        height: 32px;
        padding-top: 7px;
        box-shadow: 0px 5px 10px #212121;
    }

    .card-body {
        width: fit-content;
        padding: 0%;
    }

    .btn {
        border-radius: 0;
    }

    .img-thumbnail {
        border: none;
    }

    .card {
        box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
        border-radius: 5px;
        padding-bottom: 10px;
    }

    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }
</style>