<?php
require("rootPath.php");

require $rootPath . "Model/UsersListModel.php";
require $rootPath . "Controller/Admin/UsersListController.php";


?>

<div class=" row-cols-4 d-flex justify-content-center">
    <div class="col-lg-6 py-5">
            <table class="table table">
                <thead>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                </tr>
                </thead>

                <?php


                while ($row = mysqli_fetch_assoc($usersListResult)) { ?>
                    <tbody>
                    <tr>
                        <th scope="row"><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></th>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['streetName'] ?> <?php echo $row['streetNumber'] ?>, <?php echo $row['cityName'] ?></td>
                    </tr>

                    </tbody>
                <?php }?>
            </table>
        </div>
    </div>
</div>