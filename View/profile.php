<?php require_once("connection/conn.php");
require("Resizer.php");
?>

<html>
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <div style="width: 200px; font-size: 20px; background-image: linear-gradient(to left, darkgreen, lightgreen, lightskyblue, lightgreen, lightpink, lightgreen);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-right:auto;
  margin-left: 5%;
  margin-top: 2%;
    ">
        <br>
        <h2>Profilepage</h2>
    </div>
</header>

<body>




    <?php
    $user = "SELECT `userID`, `firstName`, `lastName`, `email`, `imagePath`  FROM `User` WHERE userID = 1";
    $result = mysqli_query($conn, $user);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_array($result)) {  ?>

           
<div class="container">
                <div class="card">
                    <a><img class="card-img-top" src="<?php echo ($row ['imagePath']) ?>" alt="Card image top" /></a>
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

</html>