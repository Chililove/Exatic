<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        var_dump($result);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if (password_verify($password, $user_data['password'])) {
                $_SESSION['userID'] = $user_data['email'];
                header('Location: /frontpage');
            } else {
                echo "Invalid username or password";
            }
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "<div class='error'>Please fill out everything</div>";
    }
}
