<?php
// set default values
if (isset($_GET["limit"])) {
    $limit = $_GET["limit"];
} else {
    $limit = 8;
}

if (isset($_GET["skip"])) {
    $skip = $_GET["skip"];
} else {
    $skip = 0;
}

if (isset($_GET["productTypeID"])) {
    $productTypeID = $_GET["productTypeID"];
} else {
    $productTypeID = null;
}


$getAllProductsQuery = "SELECT * FROM Product LIMIT $limit";
$productResult = mysqli_query($conn, $getAllProductsQuery);


$getAllProductsCountQuery = "SELECT * FROM Product";
$productResultCount = mysqli_num_rows(mysqli_query($conn, $getAllProductsCountQuery));

$productTypeResult = mysqli_query($conn, $ProductModel->productType);


if (isset($_GET["action"])) {
    $query = "SELECT * FROM Product";
    $getAllProductsCountQuery = "SELECT * FROM Product";

    if ($_GET["action"] == "products") {

        if (isset($_GET["productTypeID"]) && $_GET["productTypeID"]) {
            $productTypeID = $_GET["productTypeID"];
            $query .= " WHERE productTypeID = $productTypeID";
            $getAllProductsCountQuery .= " WHERE productTypeID = $productTypeID";
        }

        // These are for pagination and they have to be last in the query in this specific order (LIMIT first, OFFSET second)
        if (isset($_GET["limit"]) && $_GET["limit"]) {
            $limit = $_GET["limit"];
            $query .= (" LIMIT $limit");
        }
        if (isset($_GET["skip"]) && $_GET["skip"]) {
            $skip = $_GET["skip"];
            $query .= " OFFSET $skip";
        }

        $productResultCount = mysqli_num_rows(mysqli_query($conn, $getAllProductsCountQuery));
        $productResult = mysqli_query($conn, $query);
    }
}
