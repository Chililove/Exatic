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
                <th>Edit</th>
                <th>Details</th>
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
                    <td>
                        <form method="post" action="">
                            <input type="text" name="status" value="<?php echo $row['status']; ?>" class="form-control" />

                            <!-- <select class="form-select" aria-label="Default select example">
                                <option selected name="status" value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
                                <option value="done">Done</option>
                            </select> -->
                            <input type="hidden" name="dateOrdered" value="<?php echo $row['dateOrdered'] ?>">
                            <input type="hidden" name="dateDelivered" value="<?php echo $row['dateDelivered'] ?>">
                            <input type="hidden" name="userID" value="<?php echo $row['userID'] ?>">
                            <input type="hidden" name="orderID" value="<?php echo $row['orderID'] ?>">
                    <td> <button type="submit" name="updateStatus" id="btn-edit" class="btn admin-button">Edit</a></button></td>
                    </form>
                    </td>
                    <td><a href="/admin-user-detail?orderID=<?php echo $row['orderID']; ?>" class="edit" data-id="<?php echo $row["orderID"]; ?>">Details</a></td>

                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>