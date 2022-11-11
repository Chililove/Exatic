<?php
require_once("../connection/conn.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['price']) || empty($_POST['stockQuantity']) ||
        empty($_POST['description']) ||
        empty($_POST['country']) || empty($_POST['brand'])) {
        echo 'Please fill in the blanks';
    } else {

        $title = trim(mysqli_real_escape_string($conn, $_POST['title']));
        $price = trim(mysqli_real_escape_string($conn, $_POST['price']));
        $stockQuantity = trim(mysqli_real_escape_string($conn, $_POST['stockQuantity']));
        $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
        $country = trim(mysqli_real_escape_string($conn, $_POST['country']));
        $brand = trim(mysqli_real_escape_string($conn, $_POST['brand']));
        $productypeID = trim(mysqli_real_escape_string($conn, $_POST['productTypeID']));
        $discountID = trim(mysqli_real_escape_string($conn, $_POST['discountID']));

        $file = $_FILES["productImage"]["name"];

        $filename = strtolower($file);

        if ($_FILES['productImage']['name']){
            move_uploaded_file($_FILES['productImage']['tmp_name'], "../assets/" . $_FILES['productImage']['name']);
            $product = "INSERT INTO product (title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values ('$title', '$price', '$stockQuantity', '$description',1,  1, '$country', '$brand', '$filename', TIMESTAMP, '$productypeID', '$discountID' )";
            echo $product;
            $result3 = mysqli_query($conn, $product);

        }
    }
} else {

}



?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Create</title>
</head>
<body>
<div class="container">
    <h1>Create Product</h1>
    <form action="#" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="form-group">
                <label>Title</label>
                <input type="text" id="title" name="title" class="form-control" required>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 mb-4">
            <div class="form-outline">
                <label>Price</label>
                <input type="price" name="price" class="form-control" required/>
            </div>
        </div>
        <div class="col-md-2 mb-4">
            <div class="form-outline">
                <label>Quantity</label>
                <input type="quantity" name="stockQuantity" class="form-control" required/>
            </div>
        </div>
        <div class="col-md-2 mb-4">
            <div class="form-outline">
                <label>Brand</label>
                <input type="brand" name="brand" class="form-control" required/>
            </div>
        </div>
        <div class="col-md-2 mb-4">
            <div class="form-outline">
                <label>Country</label>
                <input type="country" name="country" class="form-control" required/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="form-group">
            <label>Type</label>
            <select type="text" id="type" name="productTypeID" class="form-control" required>
                <option value="">--- Choose a Type ---</option>
                <?php $product_type = "SELECT * FROM producttype";
                $result = mysqli_query($conn, $product_type);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["productTypeID"]; ?>"><?php echo $row["typeName"]; ?></option>
                    <?php } ?>
            </select>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="form-group">
                <label>Discount</label>
                <select type="category" id="category" name="discountID" class="form-control" required>
                    <option value="">--- Choose a Discount ---</option>
                    <?php $discount = "SELECT * FROM discount";
                    $result2 = mysqli_query($conn, $discount);
                    while ($row = mysqli_fetch_array($result2)) {
                        ?>
                        <option value="<?php echo $row["discountID"]; ?>"><?php echo $row["eventName"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="form-group">
                    <label for="image">Add image</label>
                    <input type="file" name="productImage" id="image" value="" class="form-control" required/>
                </div>
            </div>
        </div>
    <button type="submit" name="submit" class="btn btn-success" id="btn-add">Add</button>
    </form>
</div>
</body>
</html>