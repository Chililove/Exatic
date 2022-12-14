<?php

$errorPassword = false;
$notregistered = false;
$wrongCredentials = false;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $sanitized['email'];
    $password = $sanitized['password'];

    if (!empty($email) && !empty($password)) {

        $handle = $conn->prepare($LoginModel->selectQuery);
        $handle->bindParam(':email', $email, PDO::PARAM_STR);
        $handle->execute();
        $result = $handle->fetchAll();


        if ($result && count($result) > 0) {
            $user = $result[0];

            if (password_verify($password, $user['password'])) {
                session_regenerate_id();
                $_SESSION['userID'] = $user['userID'];
                $_SESSION['userType'] = $user['userType'];
?>

                <script>
                    window.location.href = "/home";
                </script>
<?php
                exit();
            } else {
                $errorPassword = true;
            }
        } else {
            $notregistered = true;
        }
    } else {
        $wrongCredentials = true;
    }
}
