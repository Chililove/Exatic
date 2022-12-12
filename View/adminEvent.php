<?php
require("rootPath.php");

require $rootPath . "Model/EventModel.php";
require $rootPath . "Controller/Admin/EventController.php";
require("_partials/adminBar.php")
?>

<div class="row row-cols-4 d-flex justify-content-center py-5">
    <div class="col-lg-8 admin-align-text">
        <button type="button" class="btn event-background"><a href="/admin-event-add">Add a Event</a></button>
        <table class="table table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Discount procent</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End date</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>

            <?php
            $i = 1;
            while ($row = $EventListResult->fetch(PDO::FETCH_ASSOC)) { ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $row['eventName'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['discountProcent'] ?>%</td>
                        <td><?php echo $row['startDate'] ?></td>
                        <td><?php echo $row['endDate'] ?></td>
                        <td><a href="/admin-event-edit?<?php echo $row['discountID']; ?>" class="edit" data-id="<?php echo $row["discountID"]; ?>">edit</a></td>
                        <td><a href="/admin-event.php?del=1&discountID=<?= $row["discountID"] ?>">Delete</a></td>
                    </tr>

                </tbody>
            <?php $i++;
            } ?>
        </table>
    </div>
</div>
<style lang="css">
    @import "styles.css";

    .admin-align-text {
        text-align: center;
    }

    .event-background {
        background: #212121;
        color: white;
        border-radius: 0;
        text-decoration: none;
    }
</style>