<?php

$errorPassword = false;
$notregistered = false;
$wrongCredentials = false;

function sanitize($input)
{
    return htmlspecialchars(trim($input));
}

// Here we sanitize all the incoming data
$sanitized = array_map('sanitize', $_POST);



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars($sanitized['email']);
    $password = htmlspecialchars($sanitized['password']);

    if (!empty($email) && !empty($password)) {

        $handle = $conn->prepare($LoginModel->selectQuery);
        $handle->bind_param('s', $email);
        $handle->execute();
        $result = $handle->get_result();





        if ($result && mysqli_num_rows($result) > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['userID'] = $user['userID'];
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
