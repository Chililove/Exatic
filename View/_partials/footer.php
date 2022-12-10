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
                    $address = "SELECT streetName, streetNumber FROM `Address` WHERE addressID=1";
                    $addressResult = $conn->query($address);
                    while ($row = $addressResult->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <li>
                            <h8><?php echo $row['streetName'] ?></h8>
                            <span> <?php echo $row['streetNumber'] ?></span>
                        </li>
                        <li>
                            <h8>+45 123456 78910</h8>
                        </li>
                        <?php
                        $owner = "SELECT email FROM User WHERE userID = 10";
                        $ownerResult = $conn->query($owner);
                        while ($row = $ownerResult->fetch(PDO::FETCH_ASSOC)) { ?>

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
                    $companyInfo = "SELECT * FROM CompanyInfo";
                    $companyInfoResult = $conn->query($companyInfo);
                    while ($row = $companyInfoResult->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <li>
                            <h8> <?php echo $row['weekdays'] ?></h8>
                            <p> 8.00 AM - 8.00 PM </p>
                        </li>
                        <li>
                            <h8> <?php echo $row['weekends'] ?></h8>
                        </li>
                        <li>
                            <h8> 2.00 PM - 8.00 PM </h8>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- Opening Hours -->
            <!--        <h6 class="text-white text-uppercase">Monday - Friday</h6>
                        <p>8.00 AM - 8.00 PM</p>
                        <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                        <p>2.00 PM - 8.00 PM</p> -->

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