<?php
/*
class product
{
    private $model;
    private $controller;

    public function __construct($controller, $model)
    {
        $this->model = $model;
        $this->controller = $controller;
    }
    public function output()
    {
        return "<a href='index.php?action=clicked'>" .
            $this->model->string . "</a>";
    }
} */



//session_start();
//$connect = mysqli_connect("localhost", "root", "root", "ExaticDB");

$stat = session_status();
$msg = "Current Session Status: ";
$msg .= $stat;

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        //echo "$_SESSION";
        $item_array_id = array_column($_SESSION["shopping_cart"], "productID");
        //echo count($_SESSION["shopping_cart"]);
        if (!in_array($_GET["productID"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'productID'            =>    $_GET["productID"],
                'title'            =>    $_POST["title"],
                'price'        =>    $_POST["price"],
                'stockQuantity'        =>    $_POST["stockQuantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo "Item Already Added";
        }
    } else {
        $item_array = array(
            'productID'            =>    $_GET["productID"],
            'title'            =>    $_POST["title"],
            'price'        =>    $_POST["price"],
            'stockQuantity'        =>    $_POST["stockQuantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["productID"] == $_GET["productID"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo "Item Removed";
                echo "/Exatic/product.php";
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
                            <form method="post" action="/Exatic/product.php?action=add&id=<?php echo $row["productID"]; ?>">
                                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                                    <a href="/Exatic/product-overview?<?php echo $row['productID']; ?>"><img class="card-img-top" src="/Exatic/assets/<?php echo $row['productImage'] ?>" alt="Card image top" /></a>


                                    <h4 class="text-info"><?php echo $row["title"]; ?></h4>

                                    <h4 class="text-danger"><?php echo $row["price"]; ?> kr.</h4>

                                    <input type="text" name="stockQuantity" value="1" class="form-control" />

                                    <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                    <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />

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
                                            <td><?php echo $values["title"]; ?></td>
                                            <td><?php echo $values["stockQuantity"]; ?></td>
                                            <td>$ <?php echo $values["price"]; ?></td>
                                            <td>$ <?php echo number_format($values["stockQuantity"] * $values["price"], 2); ?></td>
                                            <td><a href="/Exatic/product?action=delete&id=<?php echo $values["productID"]; ?>"><span class="text-danger">Remove</span></a></td>
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