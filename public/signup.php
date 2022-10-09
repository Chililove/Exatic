<?php
include "../database/conn.php";
include "../controller/signup.php"

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signup</title>
</head>
<body>

<section class="col-xs-1" align="center">

    <div class="login-page">
        <div class="form" method="post">
            <form class="login-form">
                <h4>Signup</h4>
                <input type="firstname" name="fname" placeholder="firstname" required/>
                <input type="lastname" name="lname" placeholder="lastname" required/>
                <input type="email" name="email" placeholder="email" required/>
                <input type="password" name="pass" placeholder="password" required/>
                <h4>Address Information</h4>
                <input type="street" name="street" placeholder="street" required/>
                <input type="text" name="stnum" placeholder="streetnumber" required/>
                <div class="row-cols-2">
                    <input type="postelcode" name="postcode" placeholder="postelcode" required/>
                    <input type="city" name="city" placeholder="city" required/>
                </div>
                <input type="country" name="country" placeholder="country" required/>

                <input type="submit" name="submit" value="Create" />
                <p class="message">Already registered? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
</section>

<style>

    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }
    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }
    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
        background: #43A047;
    }
    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }
    .container .info span {
        color: #4d4d4d;
        font-size: 12px;
    }
    .container .info span a {
        color: #000000;
        text-decoration: none;
    }
    .container .info span .fa {
        color: #EF3B3A;
    }
    body {
        background: #c3dbb6;
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>

</body>
</html>
