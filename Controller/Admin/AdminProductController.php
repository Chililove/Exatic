<?php

//read product and options
$adminProductResult = $conn->query($AdminProductModel->product_list);
//$deleteProductResult = $conn->query($AdminProductModel->deleteProduct);
//$productTypeResult = $conn ->query( $AdminProductModel->productType);
//$productDiscount = $conn ->query( $AdminProductModel->discount);
$productTypeResult = $conn->query($AdminProductModel->productType);
$productDiscount = $conn->query($AdminProductModel->discount);

//create product
if (isset($_POST['productAdd'])) {

    $title = $sanitized['title'];
    $price = $sanitized['price'];
    $stockQuantity = $sanitized['stockQuantity'];
    $description = $sanitized['description'];
    $isDailySpecial = 1;
    $country = $sanitized['country'];
    $brand = $sanitized['brand'];
    $productImage = $_FILES['productImage']['name'];
    $productTypeID = $sanitized['productTypeID'];
    $discountID = $sanitized['discountID'];

    if (
        !empty($_POST['title']) || !empty($_POST['price']) || !empty($_POST['stockQuantity']) ||
        !empty($_POST['description']) || !empty($_POST['country']) || !empty($_POST['brand']) || !empty($_POST['productTypeID']) || !empty($_POST['discountID'])
    ) {

        $file = $_FILES["productImage"]["name"];
        $filename = strtolower($file);
        if ($_FILES['productImage']['name']) {
            move_uploaded_file(
                $_FILES['productImage']['tmp_name'],
                "assets/product/" . $filename
            );
        }

        try {
            $conn->beginTransaction();
            $addProduct = $conn->prepare($AdminProductModel->addProduct);
            $addProduct->bindParam(':title', $title, PDO::PARAM_STR);
            $addProduct->bindParam(':price', $price, PDO::PARAM_STR);
            $addProduct->bindParam(':stockQuantity', $stockQuantity, PDO::PARAM_INT);
            $addProduct->bindParam(':description', $description, PDO::PARAM_STR);
            $addProduct->bindParam(':isDailySpecial', $isDailySpecial, PDO::PARAM_INT);
            $addProduct->bindParam(':country', $country, PDO::PARAM_STR);
            $addProduct->bindParam(':brand', $brand, PDO::PARAM_STR);
            $addProduct->bindParam(':productImage', $filename, PDO::PARAM_STR);
            $addProduct->bindParam(':productTypeID', $productTypeID, PDO::PARAM_INT);
            $addProduct->bindParam(':discountID', $discountID, PDO::PARAM_INT);

            $addProductResult = $addProduct->execute();
            $conn->commit();
            header("Location:admin-product");
        } catch (Exception $err) {
            echo $err;
            $errorTransaction = true;
            $conn->rollback();
        }
    }
}



//edit product
if (isset($_POST['submitProductEdit'])) {
    $title = $sanitized['title'];
    $price = $sanitized['price'];
    $stockQuantity = $sanitized['stockQuantity'];
    $description = $sanitized['description'];
    $isDailySpecial = 1;
    $country = $sanitized['country'];
    $brand = $sanitized['brand'];
    //$productImage = $_FILES['productImage']['name'];
    $productTypeID = $sanitized['productTypeID'];
    $discountID = $sanitized['discountID'];
    $productID = $sanitized['productID'];


    if (
        !empty($_POST['title']) || !empty($_POST['price']) || !empty($_POST['stockQuantity']) ||
        !empty($_POST['description']) || !empty($_POST['country']) || !empty($_POST['brand']) || !empty($_POST['productTypeID']) || !empty($_POST['discountID'])
    ) {

        try {
            $conn->beginTransaction();
            $editProductPDO = $conn->prepare($AdminProductModel->editProduct);
            $editProductPDO->bindParam(':productID', $productID, PDO::PARAM_INT);
            $editProductPDO->bindParam(':title', $title, PDO::PARAM_STR);
            $editProductPDO->bindParam(':price', $price, PDO::PARAM_STR);
            $editProductPDO->bindParam(':stockQuantity', $stockQuantity, PDO::PARAM_INT);
            $editProductPDO->bindParam(':description', $description, PDO::PARAM_STR);
            $editProductPDO->bindParam(':isDailySpecial', $isDailySpecial, PDO::PARAM_INT);
            $editProductPDO->bindParam(':country', $country, PDO::PARAM_STR);
            $editProductPDO->bindParam(':brand', $brand, PDO::PARAM_STR);
            $editProductPDO->bindParam(':productTypeID', $productTypeID, PDO::PARAM_INT);
            $editProductPDO->bindParam(':discountID', $discountID, PDO::PARAM_INT);
            $editProductResult = $editProductPDO->execute();
            $conn->commit();
            header("Location:admin-product");
        } catch (Exception $err) {
            echo $err;
            $errorTransaction = true;
            $conn->rollback();
        }
    }
}


//delete product

if (isset($_REQUEST['del'])) {
    $setProduct = $_REQUEST['productID'];
    $conn->query("SET FOREIGN_KEY_CHECKS=0");
    $handle = $conn->prepare($AdminProductModel->deleteProduct);
    $handle->execute(array(":productID" => $setProduct));
    $conn->query("SET FOREIGN_KEY_CHECKS=1");
    header("Location:admin-product");

    // quick fix - ask søren about constraints and deletion.
}
