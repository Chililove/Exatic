'<?php
$productId = $_SERVER['QUERY_STRING'];
$productEdit = "SELECT * FROM Product  WHERE productID = $productId";
class AdminProductEditModel
{
    public $productType = "SELECT * FROM ProductType";
    public $discount = "SELECT * FROM Discount";
    public $editProduct = " UPDATE Product SET `title` = :title, `price` = :price, `stockQuantity` = :stockQuantity, `description` = :description, 
                            `isDailySpecial` = :isDailySpecial, `country` = :country, `brand` = :brand, `productTypeID` = :productTypeID, 
                            `discountID` = :discountID
                            WHERE Product.`productID` = :productID";
}

$AdminProductEditModel = new AdminProductEditModel();
