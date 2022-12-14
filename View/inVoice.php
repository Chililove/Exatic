<?php
require("rootPath.php");

require $rootPath . "Model/InVoiceModel.php";
require $rootPath . "Controller/InVoiceController.php";


?>

<div class="container h-100">
    <div class="row">
        <div class="col align-self-start">
            <ul class="list-unstyled">
                <li><strong>Invoiced To</strong></li>
                <?php
                while ($row = $orderUserResult->fetch(PDO::FETCH_ASSOC)) { ?>
                    <li><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></li>
                    <li><?php echo $row['streetName'] ?> <?php echo $row['streetNumber'] ?></li>
                    <li><?php echo $row['cityName'] ?> <?php echo $row['postNumber'] ?></li>
                    <li>Denmark</li>
                <?php } ?>
            </ul>
        </div>
        <div class="col justify-content-end">
            <ul class="list-unstyled">
                <?php
                while ($row = $orderDateResult->fetch(PDO::FETCH_ASSOC)) { ?>
                    <li><strong>Invoice</strong> #<?php echo $row['orderID'] ?></li>
                    <li><strong>Invoice Date:</strong> <?php echo $row['dateOrdered'] ?></li>
                    <li><strong>Due Date:</strong> <?php echo $row['dateDelivered']; ?></li>
                    <li><strong>Status:</strong> <span class="label label-danger"> <?php echo $row['status'] ?></span></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="invoice-items">
        <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <thead>
                            <tr>
                                <th class="per70 text-center">Item</th>
                                <th class="per5 text-center">Qty</th>
                                <th class="per5 text-center">Price</th>
                                <th class="per25 text-center">Total</th>
                            </tr>
                        </thead>
                <tbody>
                    <?php
                    while ($row = $orderDetailResult->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['title'] ?> </td>
                            <td class="text-center"><?php echo $row['quantity'] ?> </td>
                            <td class="alignright"><?php echo $row['priceOne'] ?> kr.</td>
                            <td class="alignright"><?php echo $row['price'] ?> kr.</td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="3" class="text-right">Total:</th>
                        <?php
                        while ($row = $orderTotalResult->fetch(PDO::FETCH_ASSOC)) { ?>
                            <th class="alignright"><?php echo $row['totalQuantity'] ?> kr.</th>
                        <?php } ?>
                    </tr>
                    </tfoot>
            </table>
        </div>
    </div>
    <div class="invoice-footer mt25">
        <?php
        while ($row = $orderCompanyResult->fetch(PDO::FETCH_ASSOC)) { ?>
            <p class="text-center">Exatic, <?php echo $row['streetName'] ?> <?php echo $row['streetNumber'] ?>, <?php echo $row['cityName'] ?> <?php echo $row['postNumber'] ?></p>
        <?php } ?>
    </div>

</div>
<style lang="css">
    @import "styles.css";

    .alignright {
        text-align: right;
    }
</style>