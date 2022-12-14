<?php
require("rootPath.php");
require $rootPath . "Model/FooterModel.php";
require $rootPath . "Controller/FooterController.php";
?>
<body>
    <footer>
        <!-- Footer main -->
        <section class="ft-main">
            <div class="ft-main-item">
                <h2 class="ft-title">About</h2>
                <ul>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/product">Products</a></li>
                    <li><a href="/about-us">About us</a></li>
                    <li><a href="/contact">Contact us</a></li>
                    <li><a href="/signin">Login</a></li>
                </ul>
            </div>
            <div class="ft-main-item">
                <h2 class="ft-title">Contact</h2>
                <ul>
                    <?php
                    while ($row = $addressResultFooter->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <li>
                            <h8><?php echo $row['streetName'] ?></h8>
                            <span> <?php echo $row['streetNumber'] ?></span>
                        </li>
                        <li>
                            <h8>+45 123456 78910</h8>
                        </li>
                        <?php
                        while ($row = $ownerResultFooter->fetch(PDO::FETCH_ASSOC)) { ?>

                            <li>
                                <h8><?php echo $row['email'] ?></h8>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="ft-main-item">
                <h2 class="ft-title">Opening Hours</h2>
                <ul>
                    <?php
                    while ($row = $companyInfoResultFooter->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <li>
                            <h8> <?php echo $row['weekdays'] ?></h8>
                            <p> <?php echo $row['openingHours'] ?></p>
                        </li>
                        <li>
                            <h8> <?php echo $row['weekends'] ?></h8>
                        </li>
                        <li>
                            <h8> <?php echo $row['weekendHours'] ?></h8>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </section>

        <!-- Footer legal -->
        <section class="ft-legal">
            <ul class="ft-legal-list">
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li>&copy; Copyright 2022 Exatic. All Rights Reserved.</li>
            </ul>
        </section>
    </footer>
</body>


<style lang="css">
    @import "styles.css";
</style>