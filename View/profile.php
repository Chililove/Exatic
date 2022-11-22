<?php
require("rootPath.php");
require $rootPath . "Model/ProfileModel.php";
require $rootPath . "Controller/ProfileController.php";

?>


<html>

<head>
    <title>
        Profile page
    </title>
    <div class="logout" style="margin-left: 92%;">
        <a class="btn btn-primary m-3" href="/logout">Logout</a>

    </div>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="/assets/default.jpg" alt="image" id="imgprofile" style="width: 100%">
            </div>
            <div class="col-md-9" style="margin-top: 8%;">
                <h1>Ruben Lau</h1>
                <p class="title">his email here!</p>
                <p>His address here!</p>
                <p>Streetname</p>
                <p>streetnumber</p>
                <p>postnumber</p>
                <p>city</p>
                <p>country</p>

                <p><button>Contact</button></p>
            </div>
        </div>
    </div>

    <style>
        .card {
            align-items: center;
        }
    </style>
</body>

</html>