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
                <h4 class="about2-title text-uppercase">Contact us</h4>
            </div>
            <div class="row">

                <div class="col-lg-4 py-0 py-lg-4">
                    <h1 class="mb-3 about-text">Talk to us</h1>
                    <h5 class="mb-3 about-text">Exatic is here to answer your questions </h5>
                    <h5 class="mb-3"><i class="fa-sharp fa-solid fa-location-dot fa-md"></i> Address: <span class="about-text">SomeAddress 23</span>
                    </h5>
                    <h5 class="mb-3"><i class="fa-solid fa-phone fa-md"></i> Phone: <span class="about-text">+45 123456</span>
                    </h5>
                    <h5 class="mb-3 "><i class="fa-solid fa-envelope fa-md"></i> Email: <span class="about-text">exaticproject@email.com</span>
                    </h5>
                    <h5 class="mb-3 about-text">You can also contact the owners directly on the form bellow.</h5>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
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
                    <div class="col-12 about-green-div">
                        <div class="row">
                            <div class="col-sm-6 pt-2 px-5">
                                <div class="col-lg-12 py-0 py-lg-5">
                                    <h1 class="mb-3 about-text">Let's talk</h1>
                                    <h5 class="mb-3 about-text">We are open for any suggestions or just to have a chat</h5>

                                    <hr>

                                    <form method="post" action="SendMail.php">
                                        <div class="row">
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
                                            <button type="submit" class="btn btn-dark">Send Message</button>

                                        </div>
                                    </form>

                                    <hr>
                                </div>
                            </div>
                            <div class="col-sm-6 pb-sm-0 pb-3 px-0">
                                <div class="position-relative h-100" style="min-height: 445px">
                                    <img class="about-img position-absolute w-100 h-100" src="Exatic/assets/asianfood.jpeg">
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
    .embed-responsive-100x400px {
        padding-bottom: 3%;
    }

    .btn {
        border-radius: 0px;
        box-shadow: 0px 5px 10px #212121;
        font-size: 16px;
        font-weight: 600;
    }

    .add-cart {
        background-color: #212121;
        color: white;
        margin-top: 10px;
        font-size: 12px;
        font-weight: 900;
        width: 90%;
        height: 32%;
        padding-top: 2%;
        box-shadow: 0px 5px 10px #212121;
        border-radius: 0px;
    }

    @media (min-width: 1025px) {
        .h-custom {
            min-height: 100vh !important;
        }
    }

    .about2-title {
        letter-spacing: 4px;
        color: #C3DBB6;
    }

    .about-img {
        object-fit: cover;
    }

    .about-green-div {
        background: #C3DBB6;
        box-shadow: 10px 10px 10px rgba(0, 0, 0, .2);
        width: 100%
    }

    .about-text {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #434343;
    }

    .title-welcome {
        font-size: 40px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #434343;
    }

    .text-box {
        width: 80%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #434343;
        padding-left: 11%;
        line-height: 30px;
        font-size: 18px;
        padding-top: 12%;
        padding-bottom: 14%;
    }
</style>
<!-- <html lang="en">
<section class="h-100 h-custom">
    <div class="container-fluid py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <h1>This is Contact us page</h1>
        </div>
    </div>

</section>

</html>
<style lang="css">
    @media (min-width: 1025px) {
        .h-custom {
            min-height: 100vh !important;
        }
    }
</style> -->