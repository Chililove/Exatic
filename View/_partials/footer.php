<body>
    <div class="container"></div>
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
                    $addressResult = mysqli_query($conn, $address);
                    if (mysqli_num_rows($addressResult) > 0) {
                        while ($row = mysqli_fetch_assoc($addressResult)) {
                    ?>
                            <li>
                                <h8><?php echo $row["streetName"] ?></h8>
                                <span> <?php echo $row["streetNumber"] ?></span>
                            </li>
                            <li>
                                <h8>+45 we don't have one</h8>
                            </li>
                            <?php
                            $owner = "SELECT email FROM `User` WHERE userID = 2";
                            $ownerResult = mysqli_query($conn, $owner);
                            while ($row = mysqli_fetch_assoc($ownerResult)) { ?>

                                <li>
                                    <h8><?php echo $row["email"] ?></h8>
                                </li>
                    <?php
                            }
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
                    $companyInfoResult = mysqli_query($conn, $companyInfo);
                    if (mysqli_num_rows($companyInfoResult) > 0) {
                        while ($row = mysqli_fetch_assoc($companyInfoResult)) {
                    ?>
                            <li>
                                <h8> All <?php echo $row["weekdays"] ?></h8>
                            </li>
                            <li>
                                <h8>From: 8:00-22:00</h8>
                            </li>
                            <li>
                                <h8>Closed on <?php echo $row["weekends"] ?></h8>
                            </li>
                    <?php
                        }
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
<!-- Footer Start -->
<!--- <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
    </div> -->
<!-- Footer End -->

<style lang="css">
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    ul {
        list-style: none;
        padding-left: 0;
    }

    footer {
        background-color: #323232;
        color: #bbb;
        line-height: 1.5;
    }

    footer a {
        text-decoration: none;
        color: #eee;
    }

    a:hover {
        text-decoration: none;
        color: #bbb;
    }

    .ft-title {
        color: #fff;
        font-family: ’Merriweather’, serif;
        font-size: 1.375rem;
        padding-bottom: 0.625rem;
    }

    /*stick*/
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    .container {
        flex: 1;
        /* same as flex-grow: 1; */
    }

    .ft-main {
        padding: 1.25rem 1.875rem;
        display: flex;
        flex-wrap: wrap;
    }

    .ft-main-item {
        padding: 1.25rem;
        min-width: 12.5rem
            /*200px*/
        ;
    }

    @media only screen and (min-width: 29.8125rem

        /*477px*/
    ) {
        .ft-main {
            justify-content: space-around;
        }
    }

    @media only screen and (min-width: 77.5rem

        /*1240px*/
    ) {
        .ft-main {
            justify-content: space-evenly;
        }
    }

    .ft-legal {
        padding: 0.1rem 0.875rem;
        background-color: #555;
    }

    .ft-legal-list {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
    }

    .ft-legal-list li {
        margin: 0.125rem 0.625rem;
        white-space: nowrap;
    }

    /* one before the last child */
    .ft-legal-list li:nth-last-child(2) {
        flex: 1;
        /* same as flex-grow: 1; */
    }
</style>