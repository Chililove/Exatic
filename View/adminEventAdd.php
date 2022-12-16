<?php
require("rootPath.php");

require $rootPath . "Model/EventModel.php";
require $rootPath . "Controller/Admin/EventController.php";
require("_partials/adminBar.php")

?>


<!Doctype html>
<html lang="en">

<div class="container py-5">
    <div class="row">
        <div class="col">
            <h4 class="admin-align-text">Create Event</h4>
        </div>
    </div>
    <form action="#" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col-md-10 mb-6">
                <div class="form-group">
                    <label>Event Name</label>
                    <input type="text" name="eventName" class="form-control" required>

                </div>
            </div>
        </div>

        <div class="row align-self-center">
            <div class="col-md-4 mb-4 col align-self-center">
                <div class="form-outline">
                    <label>Procent</label>
                    <input type="discount" name="discountProcent" class="form-control" required />
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="form-outline">
                    <label>Start Date</label>
                    <input type="datetime-local" name="startDate">
                </div>
                <div class="form-outline">
                    <label>End Date</label>
                    <input type="datetime-local" name="endDate">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 mb-4">
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <div class="input-group mb-3">
                        <input class="form-control" name="description">
                        <div class="input-group-prepend">
                            <button type="submit" name="submit" class="btn btn-dark" id="btn-add">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

</html>
<style lang="css">
    @import "styles.css";

    .admin-align-text {
        text-align: center;
    }
</style>