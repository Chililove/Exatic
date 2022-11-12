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
</head>

<body>

    <div class="text-center container py-2">
        <!--TO DO:NAV Categories DB FETCH -->
        <ul class="nav  justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Beverages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Spices</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Frozen</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Brands</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Brand1</a></li>
                    <li><a class="dropdown-item" href="#">YUMYUM</a></li>
                    <li><a class="dropdown-item" href="#">AnotherBrand</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Country</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Brand1</a></li>
                    <li><a class="dropdown-item" href="#">YUMYUM</a></li>
                    <li><a class="dropdown-item" href="#">AnotherBrand</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--Product-->

    <div class="container-fluid">
        <div class="row">
            <?php
            if (mysqli_num_rows($productResult) > 0) {
                while ($row = mysqli_fetch_array($productResult)) {
            ?>
                    <div class="card mx-auto col-md-6 col-10 mt-5">
                        <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>">

                            <a href="/product-overview?<?php echo $row['productID']; ?>"><img class="mx-auto img-thumbnail" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="auto" height="auto" /></a>
                            <div class="card-body text-center mx-auto">
                                <div class='cvp'>


                                    <h5 class="card-title font-weight-bold"><?php echo $row["title"]; ?></h5>
                                    <p class="card-text"><?php echo $row["price"]; ?> kr</p>

                                    <h6 class="mb-3">
                                        <span>Quantity:</span><strong class="ms-2 text-danger"><input style="width: 35%; margin-left: 32%; text-align: center" type="text" name="stockQuantity" value="1" class="form-control" /></strong>
                                    </h6>
                                    <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                    <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />

                                    <input type="submit" name="add_to_cart" style="margin-bottom:5%;" class="btn cart px-auto" value="Add to Cart" />

                                </div>
                            </div>
                        </form>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>


    <div style="clear:both"></div>

    <br />




    <div style="clear:both"></div>

    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">1</a></li>
            <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">2</a></li>
            <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">3</a></li>
            <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">Next</a></li>
        </ul>
    </nav>

</body>

<h3>Order Details</h3>
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
</div>

<style lang="css">
    /*
    .card-img-products {
        width: 100%;
    }

    .card-border {
        border: 1px solid #C3DBB6;
        background-color: #C3DBB6;
        border-radius: 5px;
        padding: 16px;
        align: center;

    }

    .card {
        width: 85%;
        border-radius: 10% 10% 10% 10%;
        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2), 0 10px 24px 0 rgba(0, 0, 0, 0.19);

    }
*/
    body {
        background: #E0E0E0;
    }

    .cart {
        background-color: #212121;
        color: white;
        margin-top: 10px;
        font-size: 12px;
        font-weight: 900;
        width: 100%;
        height: 39px;
        padding-top: 9px;
        box-shadow: 0px 5px 10px #212121;
    }

    .card {
        max-width: 30%;
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
</style>

</html>