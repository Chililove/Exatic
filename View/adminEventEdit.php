<?php
require("rootPath.php");

require $rootPath . "Model/EventEditModel.php";
require $rootPath . "Controller/Admin/EventEditController.php";
require("_partials/adminBar.php")
?>

<div class="container py-5">
    <div class="row">
        <div class="col">
            <h4>Edit Event</h4>
        </div>
    </div>
    <?php
    while ($row = $overviewResult->fetch(PDO::FETCH_ASSOC)) { ?>
        <form action="#" enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="col-md-10 mb-6">
                    <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" name="eventName" value="<?php echo $row['eventName']; ?>" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row align-self-center">
                <div class="col-md-4 mb-4 col align-self-center">
                    <div class="form-outline">
                        <label>Procent</label>
                        <input type="discount" name="discountProcent" value="<?php echo $row['discountProcent']; ?>" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="form-outline">
                        <label>Start Date</label>
                        <input type="datetime-local" name="startDate" value="<?php echo $row['startDate']; ?>">
                    </div>
                    <div class="form-outline">
                        <label>End Date</label>
                        <input type="datetime-local" name="endDate" value="<?php echo $row['endDate']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 mb-4">
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <div class="input-group mb-3">
                            <input class="form-control" name="description" value="<?php echo $row['description']; ?>" >
                            <div class="input-group-prepend">
                                <button type="submit" name="submitEvent" class="btn btn-dark" id="btn-add">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="discountID" value="<?php echo $row['discountID']; ?>">
        </form>
    <?php } ?>
</div>

<style lang="css">
    @import "styles.css";

</style>