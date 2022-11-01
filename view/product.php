<?php
require_once("connection/conn.php");
session_start();

$stat = session_status();
$msg = "Current Session Status: ";
$msg .= $stat;

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        echo "$_SESSION";
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["productID"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'            =>    $_GET["productID"],
                'item_name'            =>    $_POST["hidden_name"],
                'item_price'        =>    $_POST["hidden_price"],
                'item_quantity'        =>    $_POST["stockQuantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo "Item Already Added";
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_GET["productID"],
            'item_name'            =>    $_POST["hidden_name"],
            'item_price'        =>    $_POST["hidden_price"],
            'item_quantity'        =>    $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["productID"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="product"</script>';
            }
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
</head>

<body>

    <section style="background-color: #eee;">
        <div class="text-center container py-4">
            <!--- check session status -->
            <html>

            <head>
                <title>Setting up a PHP session</title>
            </head>

            <body>
                <?php echo ($msg); ?>
            </body>

            </html>
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
            <!--Product-->
            <div class="container">
                <?php
                $query = "SELECT * FROM Product ORDER BY productID ASC";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <div class="col-md-4">
                            <form method="post" action="product.php?action=add&id=<?php echo $row["productID"]; ?>">
                                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row["productImage"]) ?>" alt="Card image top" />

                                    <h4 class="text-info"><?php echo $row["title"]; ?></h4>

                                    <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

                                    <input type="text" name="quantity" value="1" class="form-control" />

                                    <input type="hidden" name="hidden_name" value="<?php echo $row["title"]; ?>" />

                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

                                </div>
                            </form>
                        </div>
                        <div style="clear:both"></div>
                        <br />
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
                                            <td><?php echo $values["item_name"]; ?></td>
                                            <td><?php echo $values["item_quantity"]; ?></td>
                                            <td>$ <?php echo $values["item_price"]; ?></td>
                                            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                                            <td><a href="/product?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                        </tr>
                                    <?php
                                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
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
                        <!--   <div class="row">
                    <div class="col-lg-3 col-md-4 mb-2">
                        <div class="card" style="background: #c3dbb6">
                            <a href="product-overview">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['productImage']) ?>" alt="Card image top" class="w-100" />
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="/product-overview" class="text-reset">

                                <h3 class="card-title"><?php echo $row["title"] ?>
                                    <?php if ($row['isNew']) {
                                        echo '<span class="badge bg-secondary">New</span>';
                                    } ?>
                                </h3>
                            </a>
                            <h4 class="card-subtitle"><?php echo $row["description"] ?></h4>
                            <p class="card-text"> <?php echo $row["stockQuantity"] ?> items left</p>
                            <p class="card-text-price text-end">Price<?php echo $row["price"] ?>dkk</p>
                        </div>
                        <div class="card-footer text-center">
                            <button type="button" class="btn btn-primary">Add to cart</button>
                        </div>

                    </div>
                </div>
            </div> -->


                <?php
                    }
                }
                ?>
                <div style="clear:both"></div>
                <br />
                <nav class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" style="background-color: #c3dbb6" href="#">Next</a></li>
                    </ul>
                </nav>
    </section>

</body>

</html>