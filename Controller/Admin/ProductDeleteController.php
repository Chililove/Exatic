<?php
$deleteProduct = $_SERVER['QUERY_STRING'];
$query = "DELETE FROM Product WHERE productID = $deleteProduct";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Refresh:0");
}else {
    'query error: '.mysqli_error($conn);

}



