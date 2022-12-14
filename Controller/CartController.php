<?php
$isUpdated = false;
$isSuccess = false;


if (isset($_POST["add_to_cart"])) {
    if ($_POST["stockQuantity"] > 0 && !empty($_POST["stockQuantity"])) { //????

        $title = sanitize($_POST["title"]);
        $price = sanitize($_POST["price"]);
        $stockQuantity = sanitize($_POST["stockQuantity"]);
        $productImage = sanitize($_POST["productImage"]);
        $description = sanitize($_POST["description"]);

        if (isset($_SESSION["shopping_cart"])) {
            $item_array_id =  array_column($_SESSION["shopping_cart"], "productID");

            if (!in_array($_GET["productID"], $item_array_id)) {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'productID' => sanitize($_GET["productID"]),
                    'title' => sanitize($_POST["title"]),
                    'price' => sanitize($_POST["price"]),
                    'stockQuantity' => sanitize($_POST["stockQuantity"]),
                    'productImage' => sanitize($_POST["productImage"]),
                    'description' => sanitize($_POST["description"]),
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
                $isSuccess = true;
            } else {

                //Add quantity to existing item
                $productIndex = array_search($_GET["productID"], $item_array_id);

                $_SESSION["shopping_cart"][$productIndex]["stockQuantity"] += $_POST["stockQuantity"];

                $isUpdated = true;
            }
        } else {

            $item_array = array(
                'productID' => sanitize($_GET["productID"]),
                'title' => sanitize($_POST["title"]),
                'price' => sanitize($_POST["price"]),
                'stockQuantity' => sanitize($_POST["stockQuantity"]),
                'productImage' => sanitize($_POST["productImage"]),
                'description' => sanitize($_POST["description"]),
            );
            $_SESSION["shopping_cart"][0] = $item_array;
            $isSuccess = true;
        }
    }
    header("Location:product.php");
    exit();
    //for one.com  
    /*  $urlProduct ="http://exatic.store/product";
       echo ("<script>
           location.href='$urlProduct'
           </script>");  */
}

// Remove product from shopping_cart
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["productID"] == $_GET["productID"]) {
                unset($_SESSION["shopping_cart"][$keys]);
            }
        }
    }
}

// Helper function for counting the products in the shopping cart
function shopping_cart_product_count()
{
    $product_count = 0;

    if (isset($_SESSION['shopping_cart'])) {
        $product_count = array_sum(array_column($_SESSION['shopping_cart'], 'stockQuantity'));
    }

    return $product_count;
}
   

/* Start a new shopping cart logic cuz this is just ugh*/
