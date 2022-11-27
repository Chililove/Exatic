<?php
require("rootPath.php");

require $rootPath . "Model/EventModel.php";
require $rootPath . "Controller/Admin/EventController.php";


?>

<div class=" row-cols-4 d-flex justify-content-center">
    <div class="col-lg-6 py-5">
        <table class="table table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Event Name</th>
                <th scope="col">Description</th>
                <th scope="col">Discount procent</th>
                <th scope="col"Start date</th>
                <th scope="col">End date</th>
                <th scope="col">Edit</th>

            </tr>
            </thead>

            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($EventListResult)) { ?>
                <tbody>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row['eventName'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['discountProcent'] ?>%</td>
                    <td><?php echo $row['startDate'] ?></td>
                    <td><?php echo $row['endDate'] ?></td>
                    <td><a href="/admin-event-edit?<?php echo $row['discountID']; ?>" class="edit" data-id="<?php echo $row["discountID"]; ?>">edit</a></td>
                </tr>

                </tbody>
            <?php $i++;}?>
        </table>
    </div>
</div>
</div>