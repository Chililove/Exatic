<?php

require("rootPath.php");
require $rootPath . "_partials/Mail.php";

if (isset($_GET['msgid'])) {
    if ($_GET['msgid'] == 1) {
        echo "<p class='msgErr';>" . "Error: Email is not set!" . "</p>";
    } elseif ($_GET['msgid'] == 2) {
        echo "<p class='msgErr';>" . " Error: It's Empty!:)" . "</p>";
    } elseif ($_GET['msgid'] == 3) {
        echo "<p class='msgErr';>" . "Error: Incorrect Email format !" . "</p>";
    } elseif ($_GET['msgid'] == 4) {
        echo "<p class='msgErr';>" . "Error: Message needs to have at least 2 letters !" . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
</head>

<body>
    <!-- Contact Part 1 Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="about2-title exatic-title-color text-uppercase">Contact us</h4>
            </div>
            <div class="row">

                <div class="col-lg-4 py-0 py-lg-4">
                    <?php
                    $address = "SELECT streetName, streetNumber FROM `Address` WHERE addressID=1";
                    $addressResult = $conn->query($address);
                    while ($row = $addressResult->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <h1 class="mb-3 about-text">Talk to us</h1>
                        <h5 class="mb-3 about-text">Exatic is here to answer your questions </h5>
                        <h5 class="mb-3"><i class="fa-sharp fa-solid fa-location-dot fa-md"></i> Address: <span class="about-text"><?php echo $row['streetName'] ?></span><span> <?php echo $row['streetNumber'] ?></span>
                        </h5>
                    <?php } ?>
                    <h5 class="mb-3"><i class="fa-solid fa-phone fa-md"></i> Phone: <span class="about-text">+45 123456</span>
                    </h5>
                    <?php
                    $owner = "SELECT email FROM User WHERE userID = 1";
                    $ownerResult = $conn->query($owner);
                    while ($row = $ownerResult->fetch(PDO::FETCH_ASSOC)) { ?>

                        <h5 class="mb-3 "><i class="fa-solid fa-envelope fa-md"></i> Email: <span class="about-text"><?php echo $row['email'] ?></span>
                        </h5>
                    <?php } ?>
                    <h5 class="mb-3 about-text">You can also contact the owners directly on the form bellow.</h5>
                </div>
                <div class="col-lg-4 py-5 py-lg-0 google-div">
                    <div class="position-relative h-100">
                        <!--Google map-->
                        <div class="embed-responsive embed-responsive-100x400px">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.3556549215245!2d8.44805920338952!3d55.484772262000405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464b20df3d63992b%3A0xa360e7d679541ba7!2sSpangsbjerg%20Kirkevej%2C%206700%20Esbjerg!5e0!3m2!1sen!2sdk!4v1670100543816!5m2!1sen!2sdk" width="350" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!--Google Maps-->
                    </div>
                </div>

                <div class="col-lg-4 py-0 py-lg-4">
                    <h1 class="mb-3 about-text">Find us</h1>
                    <h5 class="mb-3 about-text"> You are always welcome to join our Exatic family.</h5>
                    <a href="#" class="nav-link mb-3"><i class="fa-regular fa-hashtag fa-2xl"></i>
                        <span><i class="fa-brands fa-google fa-2xl"></i></span>
                        <span><i class="fa-brands fa-instagram fa-2xl"></i></span>
                        <span><i class="fa-brands fa-facebook fa-2xl"></i></span>
                        <span><i class="fa-brands fa-twitter fa-2xl"></i></span></a>

                </div>
            </div>
        </div>
    </div>
    <!-- Contact Part 2 Start -->
    <div class="container-fluid py-4 row justify-content-center ">
        <div class="col-11">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 py-4 text-center">
                    <h1 class="title-welcome">Get in touch with us</h1>
                </div>
                <div class="row">
                    <div class="col-12 about-green-div exatic-background-color">
                        <div class="row">
                            <div class="col-sm-6 pt-2 px-5">
                                <div class="col-lg-12 py-0 py-lg-5">
                                    <h1 class="mb-3 about-text">Let's talk</h1>
                                    <h5 class="mb-3 about-text">We are open for any suggestions or just to have a chat</h5>

                                    <hr>

                                    <form method="post" action="">
                                        <div class="row">
                                            <fieldset disabled>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">Owner Email:</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="exaticproject@gmail.com" name="myemail">
                                                </div>
                                            </fieldset>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstName">
                                            </div>
                                            <div class="col mb-3">
                                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastName">
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" placeholder="Subject" aria-label="Subject" name="subject">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Message:</label>
                                                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                            </div>
                                            <button name="send_email" type="submit" class="btn btn-dark">Send Message</button>

                                        </div>
                                    </form>

                                    <hr>
                                </div>
                            </div>
                            <div class="col-sm-6 pb-sm-0 pb-3 px-0">
                                <div class="position-relative h-100 green-div-img-responsive">
                                    <img class="about-img position-absolute w-100 h-100" src="Exatic/assets/contact.png">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>

</html>

<style lang="css">
    @import "styles.css";
</style>