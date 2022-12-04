<?php

if (isset($_POST['submitProductEdit'])) {
    $title = htmlspecialchars($sanitized['title']);
    $price = htmlspecialchars($sanitized['price']);
    $stockQuantity = htmlspecialchars($sanitized['stockQuantity']);
    $description = htmlspecialchars($sanitized['description']);
    $country = htmlspecialchars($sanitized['country']);
    $brand = htmlspecialchars($sanitized['brand']);
    $producTypeID = htmlspecialchars($sanitized['productTypeID']);
    $discountID = htmlspecialchars($sanitized['discountID']);

    if (
        !empty($_POST['title']) || !empty($_POST['price']) || !empty($_POST['stockQuantity']) ||
        !empty($_POST['description']) ||
        !empty($_POST['country']) || !empty($_POST['brand'])
    )


        $file = $_FILES["productImage"]["name"];

    $filename = strtolower($file);

    $productID = $_SERVER['QUERY_STRING'];

    if ($_FILES['productImage']['name']) {
        move_uploaded_file($_FILES['productImage']['tmp_name'], "../assets/product/" . $_FILES['productImage']['name']);
        $update = "UPDATE Product SET title='$title', price='$price',  stockQuantity='$stockQuantity', `description`='$description', country='$country', 
                        brand='$brand', productTypeID='$producTypeID', discountID='$discountID', productImage='$filename' WHERE productId=$productID";
        $result3 = $conn->query($update);
        echo $result3;
?>
        echo
        <script type="text/javascript">
            window.location = "/admin-product";
        </script>
<?php
    }
} else {
    $conn->rollback();
}
