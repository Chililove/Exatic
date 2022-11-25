<?php

if (isset($_POST['submit'])) {
    if (
        empty($_POST['title']) || empty($_POST['price']) || empty($_POST['stockQuantity']) ||
        empty($_POST['description']) ||
        empty($_POST['country']) || empty($_POST['brand'])
    ) {
        echo 'Please fill in the blanks';
    } else {

        $title = trim(mysqli_real_escape_string($conn, $_POST['title']));
        $price = trim(mysqli_real_escape_string($conn, $_POST['price']));
        $stockQuantity = trim(mysqli_real_escape_string($conn, $_POST['stockQuantity']));
        $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
        $country = trim(mysqli_real_escape_string($conn, $_POST['country']));
        $brand = trim(mysqli_real_escape_string($conn, $_POST['brand']));
        $productypeID = trim(mysqli_real_escape_string($conn, $_POST['productTypeID']));
        $discountID = trim(mysqli_real_escape_string($conn, $_POST['discountID']));

        $file = $_FILES["productImage"]["name"];

        $filename = strtolower($file);

        if ($_FILES['productImage']['name']) {
            move_uploaded_file($_FILES['productImage']['tmp_name'], "../assets/product/" . $_FILES['productImage']['name']);
            $update = "UPDATE Product SET `title` ='" . $title . "', `pricde` ='" . $price . "', `stockQuantity` ='" . $stockQuantity . "', 
    `description` ='" . $description . "', `country` ='" . $country . "', `brand` ='" . $brand . "', `productTypeID` ='" . $productypeID . "', `productImage` ='" . $filename ."', `discountID` ='" . $discountID . "' WHERE `product_id` = '" . $product_id . "'";
            echo $update;
            $result3 = mysqli_query($conn, $update);
        }
    }
} else {
}

