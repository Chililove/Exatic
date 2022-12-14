<?php
require("rootPath.php");

require $rootPath . "Model/AdminProductModel.php";
require $rootPath . "Controller/Admin/AdminProductController.php";
require("_partials/adminBar.php")

?>
<div class="container-fluid h-100">
    <div class="row d-flex justify-content-center h-100">
        <div class="row-cols-4 d-flex justify-content-center py-5">
            <div class="col-lg-12 admin-align-text">
                <button type="button" class="btn admin-button">
                    <a href="/admin-product-add">Add a new Product</a>
                </button>
                <form method="post" action="">
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
                            <th scope="col">Country</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Image</th>
                            <th scope="col">Type</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Daily Special</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <?php
                    if (!empty($adminProductResult)) {
                        foreach ($adminProductResult as $row) {
                    ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $row['productID']; ?></th>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['discountProcent']; ?></td>
                                    <td><?php $discountDecimal = $row['discountProcent'] / 100;
                                        $newPrice = $row['price'] * $discountDecimal;
                                        if ($newPrice == 0) {
                                            echo $row['price'];
                                        } else {
                                          echo $newPrice;
                                        } ?></td>
                                    <td><?php echo $row['stockQuantity']; ?></td>
                                    <td class="block text-truncate admin-product-description"><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['country']; ?></td>
                                    <td><?php echo $row['brand']; ?></td>
                                    <td><img class="admin-product-image" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="<?php echo $row['productImage'] ?>" /></td>
                                    <td><?php echo $row['typeName']; ?></td>
                                    <td><?php echo $row['eventName']; ?></td>
                                    <td><div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="isDailySpecial" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1"></label>
                                            <button type="submit" value="" name="submitDaily" id="btn-edit" class="btn admin-button">Change</button></a>
                                        </div>
                                     </td>
                                    <input type="hidden" name="productID">
                                    <td><a href="/admin-product-edit?<?php echo $row['productID']; ?>" class="edit" data-id="<?php echo $row["productID"]; ?>">Edit</a></td>
                                    <td><a href="/admin-product.php?del=1&productID=<?= $row["productID"]?>">Delete</a></td>
                                </tr>
                            </tbody>
                        <?php }
                    } ?>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>


<style lang="css">
    @import "styles.css";

    .admin-align-text {
        text-align: center;
    }

    .admin-button {
        background: #212121;
        color: white;
        border-radius: 0;
    }

    .admin-product-description {
        max-width: 150px;
    }

    .admin-product-image {
        width: 30%;
        justify-items: center;
    }
</style>