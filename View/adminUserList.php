<?php
require("rootPath.php");

require $rootPath . "Model/UserListModel.php";
require $rootPath . "Controller/Admin/UserListController.php";
require("_partials/adminBar.php")

?>
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th scope="col">Profile picture</th>
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
                                <td><img src="Exatic/assets/profilepictures/<?php echo $row["imagePath"] ?>" alt="" width="50" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm center-block"></td>
                                <td><?php echo $row['userID'] ?></td>
                                <th scope="row"><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></th>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['streetName'] ?> <?php echo $row['streetNumber'] ?>, <?php echo $row['cityName'] ?></td>
                                <td><a href="/admin-user-view?userID=<?php echo $row['userID']; ?>" class="edit" data-id="<?php echo $row["userID"]; ?>">View</a></td>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>