<?php

// fetch all products
$productResultStmt =  $conn->query($firstPageProductsQuery);
$productResult = $productResultStmt->fetchAll(PDO::FETCH_ASSOC);

$pageCountStmt = $conn->query($pageCountQuery);
$pageCountResult = $pageCountStmt->fetchAll(PDO::FETCH_ASSOC);
$pageCount = count($pageCountResult);

//categories
$productTypeResultStmt =  $conn->query($ProductModel->productType);
$productTypeResult = $productTypeResultStmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET["action"])) {

    if ($_GET["action"] == "products") {
        $productTypeID = null;

        if (isset($_GET["productTypeID"]) && $_GET["productTypeID"]) {
            $productTypeID = (int)$_GET["productTypeID"];
            $currentPageProductsQuery .= " WHERE productTypeID = ?";
            $pageCountQuery .= " WHERE productTypeID = ?";
        }

        // These are for pagination and they have to be last in the query in this specific order (LIMIT first, OFFSET second)
        if (isset($_GET["skip"]) && $_GET["skip"]) {
            $skip = (int)$_GET["skip"];
            $currentPageProductsQuery .= " LIMIT $skip";
        }
        if (isset($_GET["limit"]) && $_GET["limit"]) {
            $limit = (int)$_GET["limit"];
            if (!isset($_GET["skip"]) || !$_GET["skip"]) {
                $currentPageProductsQuery .= " LIMIT $limit";
            } else {
                $currentPageProductsQuery .= ", $limit";
            }
        }

        $productResultStmt = $conn->prepare($currentPageProductsQuery);
        $pageCountStmt = $conn->prepare($pageCountQuery);
        if ($productTypeID) {
            $productResultStmt->execute([$productTypeID]);
            $pageCountStmt->execute([$productTypeID]);
        } else {
            $productResultStmt->execute();
            $pageCountStmt->execute();
        }


        $productResult = $productResultStmt->fetchAll();
        $pageCountResult = $pageCountStmt->fetchAll(PDO::FETCH_ASSOC);
        $pageCount = count($pageCountResult);
    }
}
