<?php
require("rootPath.php");

require $rootPath . "Model/AdminProductModel.php";
require $rootPath . "Controller/Admin/AdminProductController.php";

?>

<!doctype html>
<html lang="en">

<body>
    <div class="container">
        <table class="table table-hover">
            <thead style="background: #c3dbb6">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">%</th>
                    <th scope="col">NewPrice</th>
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

                //  $id_to_delete = $_SERVER['QUERY_STRING'];

                //  $deleteProduct = "DELETE FROM product WHERE productID = $id_to_delete";
                // $adminProductDelete = mysqli_query($conn, $deleteProduct);


                // $product_list = "SELECT p.productID, p.title, p.price, p.stockQuantity, p.description, p.isNew, p.isDailySpecial, p.country, p.brand, p.productImage, p.timestamp, pt.productTypeID, pt.typeName, d.discountID, d.eventName, d.discountProcent
                //         FROM product p, producttype pt, discount d WHERE p.productTypeID = pt.producttypeID AND p.discountID = d.discountID";
                //  $adminProductResult = mysqli_query($conn, $product_list);
                $i = 1;
                while ($row = mysqli_fetch_array($adminProductResult)) {
                ?>

                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discountProcent']; ?></td>
                        <td><?php $discountDecimal = $row['discountProcent'] / 100;
                            $newPrice = $row['price'] * $discountDecimal;
                            if ($newPrice == 0) {
                                echo $row['price'];
                            } else {
                                $newPrice;
                            } ?></td>
                        <td><?php echo $row['stockQuantity']; ?></td>
                        <td class="block text-truncate" style="max-width: 150px;"><?php echo $row['description']; ?></td>
                        <td><?php echo $row['isNew']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['brand']; ?></td>
                        <td><img style="width: 20%; justify-items: center" src="/Exatic/assets/<?php echo $row['productImage'] ?>" alt="<?php echo $row['productImage'] ?>" </td>
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