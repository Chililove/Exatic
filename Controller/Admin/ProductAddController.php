<?php

if (isset($_POST['productAdd'])) {
    $title = htmlspecialchars($sanitized['title']);
    $price = htmlspecialchars($sanitized['price']);
    $stockQuantity = htmlspecialchars($sanitized['stockQuantity']);
    $description = htmlspecialchars($sanitized['description']);
    $country = htmlspecialchars($sanitized['country']);
    $brand = htmlspecialchars($sanitized['brand']);
    $productypeID = htmlspecialchars($sanitized['productTypeID']);
    $discountID = htmlspecialchars($sanitized['discountID']);
    $timestamp = ['timestamp'];

    if (
        !empty($_POST['title']) || !empty($_POST['price']) || !empty($_POST['stockQuantity']) ||
        !empty($_POST['description']) ||
        !empty($_POST['country']) || !empty($_POST['brand'])
    )

    $file = $_FILES["productImage"]["name"];

    $filename = strtolower($file);

    if ($_FILES['productImage']['name']) {
        move_uploaded_file($_FILES['productImage']['tmp_name'], "../assets/product/" . $_FILES['productImage']['name']);
        echo $addProduct;
        $conn->autocommit(false);
        $handle = $conn->prepare($AdminProductAddModel->addProduct);
        $handle->bind_param('ssisiissssii',  $title, $price, $stockQuantity, $description, $isNew, $isDailySpecial, $country, $brand, $filename, $timestamp, $productypeID, $discountID);
        $result3 = $handle->execute();
        $conn->commit();
?>
        <script type="text/javascript">
            window.location = "/admin-product";
        </script>
<?php
    }
} else {

}
