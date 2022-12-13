<?php
require("rootPath.php");

require $rootPath . "Model/UserViewModel.php";
require $rootPath . "Controller/Admin/UserViewController.php";
require("_partials/adminBar.php")

?>

<table class="table table-hover mb-0">
    <thead>
    <tr>
        <th>Order #</th>
        <th>Date Purchased</th>
        <th>Delivered</th>
        <th>Status</th>
    </tr>
    </thead>

    <tbody>
        <tr>
            <?php
            $userView = "SELECT * FROM `Order` WHERE userID = :userID";
            $userViewResult = $conn->prepare($userView);
            while ($row = $userViewResult->fetch(PDO::FETCH_ASSOC)) { ?>
            <h1><?php echo $row['userID']; ?></h1>
            <td><?php echo $row['orderID']; ?></td>
            <td><?php echo $row['dateOrdered'] ?></td>
            <td><?php echo $row['dateDelivered'] ?></td>
            <td>
                <option value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
            </td>
            <?php } ?>
    </tbody>
</table>
