<?php
require("rootPath.php");

require $rootPath . "Model/AdminProductModel.php";
require $rootPath . "Controller/Admin/AdminProductController.php";
require("_partials/adminBar.php")

?>

<div class="container">
    <h1>Edit Product</h1>
    <?php $overview = $_SERVER['QUERY_STRING'];
    $product_details = "SELECT * FROM Product p, ProductType pt WHERE p.productTypeID = pt.producttypeID AND p.productID = $overview";
    $overviewResult = mysqli_query($conn, $product_details);
    while ($row = mysqli_fetch_assoc($overviewResult)) { ?>
        <form action="#" enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="form-group">
                        <label for="image">Add image</label>
                        <img style="width: 10%; justify-items: center" src="/Exatic/assets/product/<?php echo $row['productImage']; ?>" alt="<?php echo $row['productImage'] ?>" />
                        <input type="name" name="productImage" class="form-control" value="<?php echo $row['productImage']; ?>" required />

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
                            while ($row = mysqli_fetch_array($productTypeResult)) {
                            ?>
                                <option value="<?php echo $row["productTypeID"]; ?>"><?php echo $row["typeName"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-group">
                        <label>Discount</label>
                        <select type="category" name="discountID" class="form-control" required>
                            <?php
                            while ($row = mysqli_fetch_array($productDiscount)) {
                            ?>
                                <option value="<?php echo $row["discountID"]; ?>"><?php echo $row["eventName"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" name="submitProductEdit" class="btn btn-success" id="btn-add">Add</button>
        <?php } ?>
        </form>

</div>