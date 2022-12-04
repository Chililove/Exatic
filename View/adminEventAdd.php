<?php
require("rootPath.php");

require $rootPath . "Model/AdminOverviewModel.php";
require $rootPath . "Controller/Admin/AdminOverviewController.php";
require $rootPath . "Controller/Admin/EventAddController.php";
require ("_partials/adminBar.php")

?>

<div class="container py-5">
    <div class="row">
        <div class="col">
            <h4 style="text-align: center">Create Event</h4>
        </div>
    </div>
<form action="#" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-md-10 mb-6">
            <div class="form-group">
                <label>Event Name</label>
                <input type="text"  name="eventName" class="form-control" required>

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
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
        </div>
    </div>

    <button type="submit" name="submit" class="btn" id="btn-add" style="background: #212121;color: white;border-radius: 0">Add</button>
</form>
</div>