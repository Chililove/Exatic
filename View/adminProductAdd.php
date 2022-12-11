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
                        <?php
                        //  while ($row = $productTypeResult->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <!--     <option value="<?php //echo $row["productTypeID"]; 
                                                ?>"><?php //echo $row["typeName"]; 
                                                    ?></option> -->
                        <?php //} 
                        ?>
                        <?php foreach ($productTypeResult as $productType) {
                            echo '<option value="' . $productType["productTypeID"] . '">' . $productType["typeName"] . '</option>';
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label>Discount</label>
                    <select type="category" name="discountID" class="form-control" required>
                        <option value="">--- Choose a Discount ---</option>
                        <?php
                        //while ($row = $productDiscount->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <!--  <option value="<?php //echo $row["discountID"]; 
                                                ?>"><?php //echo $row["eventName"]; 
                                                    ?></option> -->
                        <?php // } 
                        ?>
                        <?php foreach ($productDiscount as $discount) {
                            echo '<option value="' . $discount["discountID"] . '">' . $discount["eventName"] .  '</option>';
                        } ?>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" name="productAdd" class="btn admin-button" id="btn-add">Add</button>
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