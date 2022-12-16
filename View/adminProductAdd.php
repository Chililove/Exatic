<?php
require("rootPath.php");

require $rootPath . "Model/AdminProductModel.php";
require $rootPath . "Controller/Admin/AdminProductController.php";
require("_partials/adminBar.php")

?>
<div class="container py-5">
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
            <div class="col-md-8 mb-4">
                <div class="form-group">
                    <label for="image">Add image</label>
                    <input type="file" name="productImage" id="image" value="" class="form-control" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 mb-4">
                <div class="form-outline">
                    <label>Price</label>
                    <input type="price" name="price" class="form-control" required />
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="form-outline">
                    <label>Quantity</label>
                    <input type="quantity" name="stockQuantity" class="form-control" required />
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="form-outline">
                    <label>Brand</label>
                    <input type="brand" name="brand" class="form-control" required />
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="form-outline">
                    <label>Country</label>
                    <input type="country" name="country" class="form-control" required />
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
                    <select type="text" name="productTypeID" class="form-control" required>
                        <option value="">--- Choose a Type ---</option>
                        <?php foreach ($productTypeResult as $productType) {
                            echo '<option value="' . $productType["productTypeID"] . '">' . $productType["typeName"] . '</option>';
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label>Discount</label>
                    <div class="input-group mb-3">
                        <select type="category" name="discountID" class="form-control" required>
                            <option value="">--- Choose a Discount ---</option>
                            <?php foreach ($productDiscount as $discount) {
                                echo '<option value="' . $discount["discountID"] . '">' . $discount["eventName"] .  '</option>';
                            } ?>
                        </select>
                        <div class="input-group-prepend">
                            <button type="submit" name="productAdd" class="btn btn-dark" id="btn-add">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<style lang="css">
    @import "styles.css";

</style>