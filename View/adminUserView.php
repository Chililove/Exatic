<?php
require("rootPath.php");

require $rootPath . "Model/UserViewModel.php";
require $rootPath . "Controller/Admin/UserViewController.php";
require("_partials/adminBar.php")

?>

<div class="container h-100">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>OrderID #</th>
                <th>UserID #</th>
                <th>Date Purchased</th>
                <th>Delivered</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($row = $orderResult->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td scope="row"><?php echo $row['orderID'] ?></td>
                    <td><?php echo $row['userID'] ?> </td>
                    <td><?php echo $row['dateOrdered'] ?> </td>
                    <td><?php echo $row['dateDelivered'] ?></td>
                    <td><?php echo $row['status'] ?> </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>