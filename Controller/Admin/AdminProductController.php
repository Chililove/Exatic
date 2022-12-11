<?php

//read product and options
$adminProductResult = $conn->query($AdminProductModel->product_list);
//$deleteProductResult = $conn->query($AdminProductModel->deleteProduct);
//$productTypeResult = $conn ->query( $AdminProductModel->productType);
//$productDiscount = $conn ->query( $AdminProductModel->discount);
$productTypeResult = $conn->query($AdminProductModel->productType);
$productDiscount = $conn->query($AdminProductModel->discount);

//create product
if(isset($_POST['productAdd'])) {

    $title = $sanitized['title'];
    $price = $sanitized['price'];
    $stockQuantity = $sanitized['stockQuantity'];
    $description = $sanitized['description'];
    $country = $sanitized['country'];
    $brand = $sanitized['brand'];
    $productImage = $sanitized['productImage'];
    $productTypeID = $sanitized['productTypeID'];
    $discountID = $sanitized['discountID'];

    if (
        !empty($_POST['title']) || !empty($_POST['price']) || !empty($_POST['stockQuantity']) ||
        !empty($_POST['description']) || !empty($_POST['country']) || !empty($_POST['brand']) || !empty($_POST['productTypeID']) || !empty($_POST['discountID'])
    ) {

        $file = $_FILES["productImage"]["name"];
        $filename = strtolower($file);
        if ($_FILES['productImage']['name']) {
            move_uploaded_file($_FILES['productImage']['tmp_name'],
                "../assets/product/" . $_FILES['productImage']['name']);
        }
        $addProductResult = $conn->prepare($AdminProductModel-> addProduct );

        $createEvent = $addProductResult->execute( array( ':title'=>$_POST['title'], ':price'=>$_POST['price'], ':stockQuantity'=>$_POST['stockQuantity'], ':description'=>$_POST['description'], ':country'=>$_POST['country'] , ':brand'=>$_POST['brand'], ':productImage'=>$_POST['productImage'], ':productTypeID'=>$_POST['productTypeID'], ':discountID'=>$_POST['discountID']) );
        if (!empty($createEvent) ){

            ?>
            <script>
                window.location.href = "/admin-product";
            </script>
            <?php
        } else {
            $conn->rollback();
        }
    }
}







//delete product
    if (isset($_REQUEST['productID'])) {
    $setProduct = $_REQUEST['productID'];
    $handle = $conn->prepare($AdminProductModel->deleteProduct);
    $handle->execute(array(":productID" => $setProduct));
    ?>
    <script>
        window.location.href = "/admin-product";
    </script>
<?php
}

