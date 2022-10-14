<?php
require_once("../connection/conn.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['price']) || empty($_POST['description']) ||
        empty($_POST['category'])  ||
        empty($_POST['country']) || empty($_POST['brand'])) {
        echo 'Please fill in the blanks';
    } else {

        $title = trim(mysqli_real_escape_string($conn, $_POST['title']));
        $price = trim(mysqli_real_escape_string($conn, $_POST['price']));
        $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
        $country = trim(mysqli_real_escape_string($conn, $_POST['country']));
        $brand = trim(mysqli_real_escape_string($conn, $_POST['brand']));

        $file = $_FILES["image"]["name"];

        $filename = strtolower($file);

        if ($_FILES['image']['name']){
            move_uploaded_file($_FILES['image']['tmp_name'],
                "../includes/images/" . $_FILES['image']['name']);
            header("Location: ../admin/viewProduct.php");
            $query = "INSERT INTO product(title, `price`, description, country, brand, image) 
                        VALUES ('$title', '$price', '$description', '$country',  '$brand', '$filename')";
            $result = mysqli_query($conn, $query);

        }
    }

} else {
    header("");

}

?>


