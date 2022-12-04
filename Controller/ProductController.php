<?php


$productResult =  $conn->query($getAllProductsQuery);

$productResultCount = mysqli_num_rows($conn->query($getAllProductsCountQuery));

$productTypeResult =  $conn->query($ProductModel->productType);

// KIM?
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

        $productResultCount = mysqli_num_rows($conn->query($getAllProductsCountQuery));
        $productResult = $conn->query($query);
    }
}
