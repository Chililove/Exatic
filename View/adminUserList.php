<?php
require("rootPath.php");

require $rootPath . "Model/UserListModel.php";
require $rootPath . "Controller/Admin/UserListController.php";
require("_partials/adminBar.php")

?>
<div class="container h-100">
    <div class="row-cols-4 d-flex justify-content-center">
        <div class="col-lg-6 py-5">
            <table class="table table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($usersListResult as $row) :  ?>

                        <tr>
                            <td><?php echo $row['userID'] ?></td>
                            <th scope="row"><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></th>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['streetName'] ?> <?php echo $row['streetNumber'] ?>, <?php echo $row['cityName'] ?></td>
                            <td><a href="/admin-user-view?userID=<?php echo $row['userID']; ?>" class="edit" data-id="<?php echo $row["userID"]; ?>">View</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>