<?php
//create Event
if (isset($_POST['submit'])) {

    if (
        !empty($_POST['eventName']) || !empty($_POST['description']) || !empty($_POST['discountProcent']) ||
        !empty($_POST['startDate']) || !empty($_POST['endDate'])
    ) {

        $sql = "INSERT INTO Discount ( eventName, description, discountProcent, startDate, endDate) VALUES ( :eventName, :description, :discountProcent, :startDate, :endDate )";
        $pdo_statement = $conn->prepare( $sql );

        $result = $pdo_statement->execute( array( ':eventName'=>$_POST['eventName'], ':description'=>$_POST['description'], ':discountProcent'=>$_POST['discountProcent'], ':startDate'=>$_POST['startDate'], ':endDate'=>$_POST['endDate'] ) );
        if (!empty($result) ){

            ?>
            <script>
                window.location.href = "/admin-event";
            </script>
            <?php
        } else {
            $conn->rollback();
        }
    }
}


//edit Event
if (isset($_POST['submitEvent'])) {

    if (
        !empty($_POST['eventName']) || !empty($_POST['description']) || !empty($_POST['discountProcent']) ||
        !empty($_POST['startDate']) || !empty($_POST['endDate'])
    )

    $pdo_statement=$conn->prepare("UPDATE Discount SET eventName='" . $_POST[ 'eventName' ] . "', description='" . $_POST[ 'description' ]. "', discountProcent='" . $_POST[ 'discountProcent' ]. "', startDate='" . $_POST[ '$startDate' ]."', endDate='" . $_POST[ 'endDate' ]."' WHERE discountID=" . $_GET["discountID"]);
    $result = $pdo_statement->execute();
    if($result) {
        header('location:/admin-event.php');
    }


}


$EventListResult = $conn ->query($EventModel->eventList);
