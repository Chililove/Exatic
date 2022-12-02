<?php
require("rootPath.php");

require $rootPath . "Model/UsersListModel.php";
require $rootPath . "Controller/Admin/UsersListController.php";
require $rootPath . "Controller/Admin/UserDeleteController.php";
require ("_partials/adminBar.php")

?>

<div class=" row-cols-4 d-flex justify-content-center">
    <div class="col-lg-6 py-5">
            <table class="table table">
                <thead>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>

                <?php
                while ($row = mysqli_fetch_assoc($usersListResult)) { ?>
                    <tbody>
                    <tr>
                        <th scope="row"><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></th>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['streetName'] ?> <?php echo $row['streetNumber'] ?>, <?php echo $row['cityName'] ?></td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><a href="/admin-user-list?<?php echo $row['userID'] ?>" class="delete" data-id="<?php echo $row["userID"]; ?>">delete</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div></td>


                    </tr>

                    </tbody>
                <?php }?>
            </table>
        </div>
    </div>
</div>