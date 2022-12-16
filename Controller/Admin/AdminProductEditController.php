<?php
$productEditResult = $conn->query($productEdit);
$productTypeResult = $conn->query($AdminProductEditModel->productType);
$productDiscount = $conn->query($AdminProductEditModel->discount);


//edit product
if (isset($_POST['submitProductEdit'])) {
    $title = $sanitized['title'];
    $price = $sanitized['price'];
    $stockQuantity = $sanitized['stockQuantity'];
    $description = $sanitized['description'];
    $isDailySpecial = 1;
    $country = $sanitized['country'];
    $brand = $sanitized['brand'];
    $productTypeID = $sanitized['productTypeID'];
    $discountID = $sanitized['discountID'];
    $productID = $sanitized['productID'];


    if (
        !empty($_POST['title']) || !empty($_POST['price']) || !empty($_POST['stockQuantity']) ||
        !empty($_POST['description']) || !empty($_POST['country']) || !empty($_POST['brand']) || !empty($_POST['productTypeID']) || !empty($_POST['discountID'])
    ) {

        try {
            $conn->beginTransaction();
            $editProductPDO = $conn->prepare($AdminProductEditModel->editProduct);
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
            //for one.com
            /*  $urlAdminProduct ="http://exatic.store/admin-product";
                echo ("<script>
                 location.href='$urlAdminProduct'
                 </script>");  */
        } catch (Exception $err) {
            $errorTransaction = true;
            $conn->rollback();
        }
    }
}
