<?php
require("rootPath.php");

require $rootPath . "Model/AdminProductEditModel.php";
require $rootPath . "Controller/Admin/AdminProductEditController.php";
require("_partials/adminBar.php")

?>

<div class="container">
    <h1>Edit Product</h1>
    <?php

    while ($row = $productEditResult->fetch(PDO::FETCH_ASSOC)) { ?>

        <form action="#" enctype="multipart/form-data" method="post">
            <h1 name="productID"><?php echo $row['productID']; ?></h1>

            <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 mb-4">
                    <div class="form-outline">
                        <label>Price</label>
                        <input type="price" name="price" class="form-control" value="<?php echo $row['price']; ?>" required />
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="form-outline">
                        <label>Quantity</label>
                        <input type="quantity" name="stockQuantity" class="form-control" value="<?php echo $row['stockQuantity']; ?>" required />
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="form-outline">
                        <label>Brand</label>
                        <input type="brand" name="brand" class="form-control" value="<?php echo $row['brand']; ?>" required />
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="form-outline">
                        <label>Country</label>
                        <input type="country" name="country" class="form-control" value="<?php echo $row['country']; ?>" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"><?php echo $row['description']; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="form-group">
                        <label>Type</label>
                        <select type="text" name="productTypeID" class="form-control" required>
                            <?php
                            while ($row = $productTypeResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row["productTypeID"]; ?>"><?php echo  $row["typeName"]; ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-group">
                        <label>Discount</label>
                        <select type="category" name="discountID" class="form-control" required>
                            <?php
                            while ($row = $productDiscount->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row["discountID"]; ?>"><?php echo $row["eventName"]; ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
            </div>


            <button type="submit" name="submitProductEdit" class="btn admin-button" id="btn-add">Add</button>
        <?php  } ?>
        </form>

</div>

<style lang="css">
    @import "styles.css";

    .admin-button {
        background: #212121;
        color: white;
        border-radius: 0;
    }
</style>