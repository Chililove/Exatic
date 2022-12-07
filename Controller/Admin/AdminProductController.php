<?php

$adminProductResult = $conn->query($AdminProductModel->product_list);
//$deleteProductResult = $conn->query($AdminProductModel->deleteProduct);
//$productTypeResult = $conn ->query( $AdminProductModel->productType);
//$productDiscount = $conn ->query( $AdminProductModel->discount);
$productTypeResult = $conn->query($AdminProductModel->productType);
$productDiscount = $conn->query($AdminProductModel->discount);



// Create product 

if (isset($_POST['productAdd'])) {
    $title = $sanitized['title'];
    $price = $sanitized['price'];
    $stockQuantity = $sanitized['stockQuantity'];
    $description = $sanitized['description'];
    $country = $sanitized['country'];
    $brand = $sanitized['brand'];
    $productTypeID = $sanitized['productTypeID'];
    $discountID = $sanitized['discountID'];
    $timestamp = ['timestamp'];

    if (
        !empty($_POST['title']) || !empty($_POST['price']) || !empty($_POST['stockQuantity']) ||
        !empty($_POST['description']) ||
        !empty($_POST['country']) || !empty($_POST['brand'])
    ) {

        /*    $file = $_FILES["productImage"]["name"];

        $filename = strtolower($file); */

        // if ($_FILES['productImage']['name']) {

        //     move_uploaded_file($_FILES['productImage']['tmp_name'], "../assets/product/" . $_FILES['productImage']['name']);

        try {
            $conn->beginTransaction();

            $handle = $conn->prepare($AdminProductModel->addProduct);
            $handle->bindParam(':title', $title, PDO::PARAM_STR);
            $handle->bindParam(':price', $price, PDO::PARAM_STR);
            $handle->bindParam(':stockQuantity', $stockQuantity, PDO::PARAM_INT);
            $handle->bindParam(':description', $description, PDO::PARAM_STR);
            $handle->bindParam(':isNew', $isNew, PDO::PARAM_BOOL);
            $handle->bindParam(':isDailySpecial', $isDailySpecial, PDO::PARAM_BOOL);
            $handle->bindParam(':country', $country, PDO::PARAM_STR);
            $handle->bindParam(':brand', $brand, PDO::PARAM_STR);
            $handle->bindParam(':productImage', $filename, PDO::PARAM_STR);
            $handle->bindParam(':timestamp', $timestamp, PDO::PARAM_INT);
            $handle->bindParam(':productTypeID', $productTypeID, PDO::PARAM_INT);
            $handle->bindParam(':discountID', $discountID, PDO::PARAM_INT);

            $resultAdd = $handle->execute();
            echo ($handle);
            $conn->commit();
            echo "Succedded!!!"

?>

            <!-- <script type="text/javascript">
                window.location = "/admin-product";
            </script> -->
<?php
        } catch (Exception $err) {
            // $conn->rollback();
            echo "failed!!!";
        }
    }
}
// }
//Update product

/* if (isset($_POST['submitProductEdit'])) {
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
        // $update = "UPDATE Product SET title='$title', price='$price',  stockQuantity='$stockQuantity', `description`='$description', country='$country', 
        //                 brand='$brand', productTypeID='$producTypeID', discountID='$discountID', productImage='$filename' WHERE productId=$productID";



        $resultEdit = $conn->query($update);


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
} */
