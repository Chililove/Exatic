<?php
require("rootPath.php");

require $rootPath . "Model/POverviewModel.php";
require $rootPath . "Controller/POverviewController.php";
require $rootPath . "Controller/CartController.php";


/*class productoverview
{
    private $POverviewModel;
    private $POverviewController;

    public function __construct($POverviewController, $POverviewModel)
    {
        $this->model = $POverviewModel;
        $this->controller = $POverviewModel;
    }
} */
?>



<!doctype html>
<html lang="en">

<head>
    <title>Product Details</title>
    <!--  <?php // if ($isSuccess) { 
            ?>
        <div class="alert alert-success text-center" role="alert">
            <strong>Success!</strong> Product added to your shopping cart.
        </div>
    <?php //} 
    ?>
    <?php //if ($isUpdated) { 
    ?>
        <div class="alert alert-warning text-center" role="alert">
            <strong>Product quantity updated</strong>
        </div>
    <?php //} 
    ?> -->
</head>

<body>
    <iframe name="productdetails" class="iframe"></iframe>

    <div class="container-fluid h-100">
        <div class="row d-flex justify-content-center h-100">
            <div class="container-fluid d-flex">

                <div class="col-6">
                    <?php
                    while ($row = $pdetailsResult->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                        <a href="/product-overview.php?productID=<?php echo $row["productID"]; ?>"><img class="rounded img-fluid mx-auto d-block" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="ProductImage" width="450" height="250" alt="Card image top" /></a>
                </div>

                <div class="col-6 col-padding">

                    <div class="overlay-right d-flex justify-content-end">

                        <div class="col">

                            <form method="post" action="/product.php?action=add&productID=<?php echo $row["productID"]; ?>" target="productdetails">


                                <h3 class="text-font"><?php echo $row['title']; ?></h3>
                                <h5 class="type-name"><span><?php echo $row['typeName']; ?></span> / <span> <?php echo $row['brand']; ?></span>
                                </h5>

                                <h6 class="title-font"><small>Price:</small></h6>
                                <h3><?php echo $row['price']; ?>kr.</h3>

                                <div class="section">
                                    <h6><small>Country:</small>

                                        <span><?php echo $row['country']; ?></span>
                                    </h6>
                                </div>
                                <div class="section between-pad">
                                    <h6><small>In Stock:</small>
                                        <span><?php echo $row['stockQuantity']; ?></span>
                                    </h6>
                                </div>
                                <div class="section quantity-pad">
                                    <div>
                                        <span><small>Quantity</small></sp>
                                            <input type="number" name="stockQuantity" value="1" min="1" class="form-control quantity-input" />
                                    </div>
                                </div>
                                <div class="section quantity-pad">

                                    <input type="hidden" name="title" value="<?php echo $row["title"]; ?>" />

                                    <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />

                                    <input type="hidden" name="productImage" value="<?php echo $row["productImage"]; ?>" />

                                    <input type="hidden" name="description" value="<?php echo $row["description"]; ?>" />

                                    <input type="submit" name="add_to_cart" class="btn add-cart px-auto" value="ADD TO CART" />

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 text-font silver-border">
                        <small>
                            <?php echo $row['description']; ?>
                        </small>
                    </div>
                <?php } ?>
                </div>
            </div>

            <div class="container-fluid h-100 recommend-div">
                <div class="col exatic-background-color">
                    <div class="overlay-right d-flex flex-row justify-content-between">
                        <div class="col-2">
                            <span class="text-font font-size-recommend">Recommended</span>
                        </div>
                        <div class="col-0">
                            <a class="btn btn-dark border-radius-zero" href="/product">
                                <span class="text-font">View all</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    while ($row = $recommendResult->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-3">
                            <div class="col-12">
                                <a href="/product-overview.php?productID=<?php echo $row['productID']; ?>"><img class="img-fluid rounded  mx-auto d-block" width="200" height="200" src="/Exatic/assets/product/<?php echo $row['productImage'] ?>" alt="Card image top" /></a>
                                <h5 class="bsp_card-title"><?php echo $row['title'] ?></h5>
                                <div class="text-center">
                                    <p class="bsp_card-text"> <?php echo $row['price'] ?> kr.</p>
                                    <!--<p class="text-font"><?php echo $row['brand'] ?></p> -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<style lang="css">
    @import "styles.css";
</style>