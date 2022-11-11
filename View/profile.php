<?php
require("rootPath.php");

require $rootPath . "Model/ProfileModel.php";
require $rootPath . "Controller/ProfileController.php";


require("Resizer.php");
?>

<html>
<header>

    <div class="headerProfile">
        <br>
        <h2>Profilepage</h2>
    </div>
</header>

<body>




    <?php

    if (mysqli_num_rows($userResult) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_array($userResult)) {  ?>


            <div class="container">
                <div class="card">
                    <a><img class="card-img-top" src="<?php echo ($row['imagePath']) ?>" alt="Card image top" /></a>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $row["lastName"] ?></h4>
                        <p class="card-text"><?php echo $row["firstName"] ?></p>
                    </div>

                </div>

            </div>
    <?php
        }
    } else {
        echo "0 results";
    }

    ?>
</body>

<style>
    .headerProfile {
        width: 200px;
        font-size: 20px;
        background-image: linear-gradient(to left, darkgreen, lightgreen, lightskyblue, lightgreen, lightpink, lightgreen);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-right: auto;
        margin-left: 5%;
        margin-top: 2%;
    }
</style>

</html>