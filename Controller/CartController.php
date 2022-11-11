<?php

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
