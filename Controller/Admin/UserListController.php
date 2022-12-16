<?php
$usersListResult = $conn->query($UserListModel->usersList);


if (isset($_REQUEST['userID'])) {
    $setUser = $_REQUEST['userID'];
    $handle = $conn->prepare($UserListModel->deleteUser);
    $handle->execute(array(":userID" => $setUser));
?>
    <script>
        window.location.href = "/admin-user-list";
    </script>
<?php
}
