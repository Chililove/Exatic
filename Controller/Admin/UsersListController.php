<?php
$usersListResult = $conn->query($UsersListModel->usersList);
//$deleteUserResult = $conn->query($UsersListModel->deleteUser);
if (isset($_REQUEST['userID'])) {
    $setUser = $_REQUEST['userID'];

    // Select the record that is going to be deleted
    /* $stmt = $conn->prepare('SELECT userID FROM User WHERE userID = :userID');
    $stmt->execute();
    $deleteUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$deleteUser) {
        exit('User doesn\'t exist with that ID!');
    } */
    // Make sure the user confirms before deletion
    // if (isset($_GET['confirm'])) {
    //    if ($_GET['confirm'] == 'yes') {
    // User clicked the "Yes" button, delete record
    $handle = $conn->prepare($UsersListModel->deleteUser);
    //$handle->bindParam(':userID', $setUser, PDO::PARAM_INT);
    $handle->execute(array(":userID" => $setUser));
?>
    <script>
        window.location.href = "/admin-user-list";
    </script>
<?php
}

// Ensure DB connectivity in this page. And this code will work fine.




//  } else {
// User clicked the "No" button, redirect them back to the read page
// header('Location: read.php');
// exit;

// }
// }
//} else {
//exit('No ID specified!');
//}
/* if (isset($_POST['deleteUser'])) {
    $user_ID = $_POST['deleteUser'];

    try {

        $deleteQuery = "DELETE FROM User WHERE userID = :userID";
        $statement = $conn->prepare($deleteQuery);
        $data =  [
            ':userID' => $user_ID
        ];
        $DeleteResult = $statement->execute($data);

        if ($DeleteResult) {
            $_SESSION['message'] = "Deleted succesfully! :)";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Deleted FAILEEED ! :(";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $err) {
        $err->getMessage();
    }
} */
