<?php
require_once("../connection/conn.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>product-list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <table class="table table-hover">
        <thead style="background: #c3dbb6">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">%</th>
            <th scope="col">Quantity</th>
            <th scope="col">Description</th>
            <th scope="col">isNew</th>
            <th scope="col">Country</th>
            <th scope="col">Brand</th>
            <th scope="col">Image</th>
            <th scope="col">Type</th>
            <th scope="col">Discount</th>
            <th scope="col">CreatedAt</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>

        <?php

        $id_to_delete = $_SERVER['QUERY_STRING'];

        $query = "DELETE FROM product WHERE productID = $id_to_delete";
        $result = mysqli_query($conn, $query);


        $product_list = "SELECT p.productID, p.title, p.price, p.stockQuantity, p.description, p.isNew, p.isDailySpecial, p.country, p.brand, p.productImage, p.timestamp, pt.productTypeID, pt.typeName, d.discountID, d.eventName, d.discountProcent
                        FROM product p, producttype pt, discount d WHERE p.productTypeID = pt.producttypeID AND p.discountID = d.discountID";
        $result = mysqli_query($conn, $product_list);
        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
        ?>

        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['discountProcent']  ; ?> <?php echo $row['price']; ?></td>
            <td><?php echo $row['stockQuantity']; ?></td>
            <td class="block text-truncate" style="max-width: 150px;"><?php echo $row['description']; ?></td>
            <td><?php echo $row['isNew']; ?></td>
            <td><?php echo $row['country']; ?></td>
            <td><?php echo $row['brand']; ?></td>
            <td><img style="width: 20%; justify-items: center" src="/Exatic/assets/<?php echo $row['productImage'] ?>"  alt="<?php echo $row['productImage'] ?>"</td>
            <td><?php echo $row['typeName']; ?></td>
            <td><?php echo $row['eventName']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
            <td><a href="#" class="edit" data-id="<?php echo $row["productID"]; ?>">edit</a></td>
            <td><a href="#" class="delete" data-id="<?php echo $row["productID"]; ?>">delete</a></td>


        </tr>
            <?php
            $i++;
        }
        ?>
        </tbody>
</div>

</body>
</html>
