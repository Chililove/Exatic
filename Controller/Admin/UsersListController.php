<?php
$usersListResult = $conn->query($UsersListModel->usersList);


if (isset($_REQUEST['userID'])) {
    $setUser = $_REQUEST['userID'];
    $handle = $conn->prepare($UsersListModel->deleteUser);
    $handle->execute(array(":userID" => $setUser));
?>
    <script>
        window.location.href = "/admin-user-list";
    </script>
<?php
}
