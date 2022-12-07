<?php
$isUpdated = false;
$isSuccess = false;



if (isset($_POST["add_to_cart"])) {

    $title = checkInput($_POST["title"]);
    $price = checkInput($_POST["price"]);
    $stockQuantity = checkInput($_POST["stockQuantity"]);
    $productImage = checkInput($_POST["productImage"]);
    $description = checkInput($_POST["description"]);

    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id =  array_column($_SESSION["shopping_cart"], "productID");

        if (!in_array($_GET["productID"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'productID' => $_GET["productID"],
                'title' => $_POST["title"],
                'price' => $_POST["price"],
                'stockQuantity' => $_POST["stockQuantity"],
                'productImage' => $_POST["productImage"],
                'description' => $_POST["description"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
            $isSuccess = true;
        } else {

            //add quantity to existing item
            // need to find specific product smth with array_search
            $productIndex = array_search($_GET["productID"], $item_array_id);

            $_SESSION["shopping_cart"][$productIndex]["stockQuantity"] += $_POST["stockQuantity"];

            $isUpdated = true;
        }
    } else {
        $item_array = array(
            'productID' => $_GET["productID"],
            'title' => $_POST["title"],
            'price' => $_POST["price"],
            'stockQuantity' => $_POST["stockQuantity"],
            'productImage' => $_POST["productImage"],
            'description' => $_POST["description"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
        $isSuccess = true;
    }
    /*  doesnt workkkkk
   if (empty($stockQuantity) || $stockQuantity < 0) {
        echo '<div class="error">
                quantity less then 1 or empty
            </div>';
    } */
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["productID"] == $_GET["productID"]) {
                unset($_SESSION["shopping_cart"][$keys]);
            }
        }
    }
}

function shopping_cart_product_count()
{
    $product_count = 0;

    if (isset($_SESSION['shopping_cart'])) {
        $product_count = array_sum(array_column($_SESSION['shopping_cart'], 'stockQuantity'));
    }

    return $product_count;
}

//Validation help function 
function checkInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}    

/* Start a new shopping cart logic cuz this is just ugh*/
