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
                <th>Order ID</th>
                <th>Date Purchased</th>
                <th>Estimated Delivered</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Details</th>
            </tr>
        </thead>

        <tbody>
            <?php

            while ($row = $orderResult->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td scope="row"><?php echo $row['orderID'] ?></td>
                    <td><?php echo $row['dateOrdered'] ?> </td>
                    <form method="post" action="">
                    <td>  <input type="datetime-local" name="dateDelivered" value="<?php echo $row['dateDelivered']; ?>"></td>

                    <td><select class="form-select" name="status"  aria-label="Default select example">

                            <option selected name="status" value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
                            <option name="status" value="Done">Done</option>
                            <option name="status" value="Not Done">Not Done</option>
                            <option name="status" value="Not Done">Shipping</option>
                            <option name="status" value="Not Done">Delivered</option>
                        </select>
                        </td>
                        <input type="hidden" name="dateOrdered" value="<?php echo $row['dateOrdered'] ?>">
                        <input type="hidden" name="dateDelivered" value="<?php echo $row['dateDelivered'] ?>">
                        <input type="hidden" name="orderID" value="<?php echo $row['orderID'] ?>">
                        <input type="hidden" name="userID" value="<?php echo $row['userID'] ?>">
                    <td><button type="submit" name="updateStatus" id="btn-edit" class="btn admin-button">Edit</button></td>
                    <td><a href="/admin-user-detail?orderID=<?php echo $row['orderID']; ?>" class="edit" data-id="<?php echo $row["orderID"]; ?>">Details</a></td>
                    </form>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>