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
    <!-- ALERTS-->
    <!--   <?php //if ($isSuccess) { 
            ?>
        <div class="alert alert-success text-center" role="alert">
            <strong>Success!</strong> Product added to your shopping cart.
        </div>
    <?php //} 
    ?>
    <?php //if ($isUpdated) { 
    ?>
        <div class="alert alert-warning text-center" role="alert">
            <strong>Product quantity updated</strong>
        </div>
    <?php //} 
    ?> -->

</head>

<body>
    <iframe name="product" class="iframe"></iframe>
    <div class="text-center container py-2">
        <ul class="nav justify-content-center">
            <?php
            foreach ($productTypeResult as $row) {
            ?>
                <li class="nav-item">
                    <a class="nav-link categories-text" href="/product?action=products&productTypeID=<?php echo $row['productTypeID'] ?>">
                        <?php echo $row['typeName']; ?>
                    </a>
                </li>

            <?php
            } ?>
            <!-- Future categories with sub-categories-->
            <!--  <li class="nav-item dropdown">
                <a  class="nav-link dropdown-toggle categories-text" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Brands</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">BrandTest1</a></li>
                    <li><a class="dropdown-item" href="#">BrandTest2</a></li>
                    <li><a class="dropdown-item" href="#">BrandTest3</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Country</a>
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
        <div class="row justify-content-center product-margin">

            <?php
            foreach ($productResult as $row) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-5 d-flex justify-content-center">
                    <div class="card">

                        <form method="post" action="/product.php?action=add&productID=<?php echo $row['productID']; ?>" target="product">

                            <a href="/product-overview?productID=<?php echo $row['productID']; ?>"><img class="rounded mx-auto d-block" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="250" height="230" /></a>
                            <div class="card-body text-center mx-auto">
                                <div class='cvp'>

                                    <h5 class="card-text font-weight-bold"><?php echo $row["title"]; ?></h5>
                                    <div class="overlay-right d-flex flex-row justify-content-center">
                                        <div class="card-text">
                                            <input type="number" name="stockQuantity" value="1" min="1" class="form-control quantity-input" required />
                                        </div>
                                        <p class="text-end price-style"><?php echo $row["price"]; ?> kr</p>

                                    </div>

                                    <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                    <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />

                                    <input type="hidden" name="productImage" value="<?php echo $row["productImage"]; ?>" />

                                    <input type="hidden" name="description" value="<?php echo $row["description"]; ?>" />

                                    <input type="submit" name="add_to_cart" class="btn cart px-auto" value="Add to Cart" />

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <!-- Pagination -->
    <nav class="d-flex justify-content-center">
        <?php
        // set default values
        $productTypeID = null;

        if (isset($_GET['limit']) && $_GET['limit']) {
            $limit = $_GET['limit'];
        }

        if (isset($_GET['skip']) && $_GET['skip']) {
            $skip = $_GET['skip'];
        }

        if (isset($_GET['productTypeID']) && $_GET['productTypeID']) {
            $productTypeID = $_GET['productTypeID'];
        }

        ?>
        <ul class="pagination">
            <li class="page-item"><a class="page-link exatic-background-color" href="/product?action=products&productTypeID=<?php echo ($productTypeID); ?>&limit=<?php echo ($limit) ?>&skip=
            <?php
            if (($skip - $limit) >= 0) {
                echo ($skip - $limit);
            } else {
                echo ($skip);
            }
            ?>">Previous</a></li>
            <?php
            $pages = ceil($pageCount / $limit);
            for ($i = 0; $i < $pages; $i++) {
            ?>
                <li class="page-item">
                    <a class="page-link exatic-background-color" href="/product?action=products&productTypeID=<?php echo ($productTypeID) ?>&limit=<?php echo ($limit) ?>&skip=<?php echo ($limit * $i) ?>"><?php echo ($i + 1); ?>
                    </a>
                </li>
            <?php
            }
            ?>
            <li class="page-item"><a class="page-link exatic-background-color" href="/product?action=products&productTypeID=<?php echo ($productTypeID) ?>&limit=<?php echo ($limit) ?>&skip=<?php
                                                                                                                                                                                                if (($skip + $limit) <= ($pageCount)) {
                                                                                                                                                                                                    echo ($skip + $limit);
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    echo ($skip);
                                                                                                                                                                                                }
                                                                                                                                                                                                ?>">Next</a></li>
        </ul>


    </nav>

</body>

</html>

<style lang="css">
    @import "styles.css";
</style>