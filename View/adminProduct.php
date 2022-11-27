<?php
require("rootPath.php");

require $rootPath . "Model/AdminProductModel.php";
require $rootPath . "Controller/Admin/AdminProductController.php";
require $rootPath . "Controller/Admin/ProductDeleteController.php   ";

?>
<div class="row row-cols-4 d-flex justify-content-center py-5">
    <div class="col-lg-8" style="text-align: center">
        <a href="/admin-product-add">Add a Product</a>
            <table class="table table">
                <thead>
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

                <?php

                $i = 1;

                while ($row = mysqli_fetch_array($adminProductResult)) {
                ?>
                    <tbody>
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
                        <td><img style="width: 50%; justify-items: center" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="<?php echo $row['productImage'] ?>" /></td>
                        <td><?php echo $row['typeName']; ?></td>
                        <td><?php echo $row['eventName']; ?></td>
                        <td><?php echo $row['timestamp']; ?></td>
                        <td><a href="/admin-product-edit?<?php echo $row['productID']; ?>" class="edit" data-id="<?php echo $row["productID"]; ?>">edit</a></td>
                        <td><a href="/admin-product?<?php echo $row['productID'] ?>" class="delete" data-id="<?php echo $row["productID"]; ?>">delete</a></td>
                    </tr>
                    </tbody>
                <?php  $i++;}?>
            </table>
            </div>
        </div>
    </div>

