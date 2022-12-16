<?php
require("rootPath.php");

require $rootPath . "Model/OrderDetailModel.php";
require $rootPath . "Controller/Admin/OrderDetailController.php";
require("_partials/adminBar.php")

?>

<div class="container h-100">

    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>OrderDetailID #</th>
                <th>Title</th>
                <th>Price pr.Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Procent</th>
                <th>productID</th>

            </tr>
        </thead>

        <tbody>
            <?php
            while ($row = $orderDetailResult->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['orderDetailID'] ?> </td>
                    <td><?php echo $row['title'] ?> </td>
                    <td><?php echo $row['priceOne'] ?> kr.</td>
                    <td><?php echo $row['quantity'] ?> </td>
                    <td><?php echo $row['price'] ?> kr.</td>
                    <td><?php echo $row['procent'] ?></td>
                    <td><?php echo $row['productID'] ?> </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>