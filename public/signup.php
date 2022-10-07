<?php


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="wrapper">
    <div id="formContent">

        <div id="title" style="text-align: center">
            <h4>Signup Form</h4>
        </div>
        <form action="" method="post">
            <div class="row">
                <label>First name:</label>
                <input type="firstname" name="name" placeholder="Firstname..">
                <label>Last name:</label>
                <input type="lastname" name="name" placeholder="Lastname..">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email...">
                <label>Enter password</label>
                <input type="password" name="password" placeholder="Enter your password...">
                <button type="submit" class="btn" name="submit">Signup</button>
                <p style="text-align: center"> Already having an account? <br> <a href="signup.php"> Login Here!</a></p>
            </div>
        </form>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</body>

<style>
    .wrapper {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        min-height: 100%;
        padding: 20px;
    }


    #formContent {
        border-radius: 10px 10px 10px 10px;
        background: #fff;
        padding: 30px;
        width: 90%;
        max-width: 450px;
        position: relative;
        padding: 0px;
    }

</style>
</html>

