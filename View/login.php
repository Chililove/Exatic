<?php
require("rootPath.php");

require $rootPath . "Model/LoginModel.php";
require $rootPath . "Controller/LoginController.php";
?>
<html>

<head>
    <?php if ($errorPassword) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <strong>Error:</strong> Wrong email or password!
        </div>
    <?php } ?>
    <?php if ($notregistered) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <strong>Invalid login:</strong> Please try again or sign up!
        </div>
    <?php } ?>
</head>
<section class="vh-100">
    <div class="container py-5 h-50">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="my-1 display-3 fw-bold ls-tight">
                    Want a better offer <br />
                    <span style="color: var(--primary-color);">sign in for better offer</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                    quibusdam tempora at cupiditate quis eum maiores libero
                    veritatis? Dicta facilis sint aliquid ipsum atque?
                </p>
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form method="POST">

                    <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-control form-control-lg" />
                        <label class="form-label">Email address</label>
                    </div>


                    <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control form-control-lg" />
                        <label class="form-label">Password</label>
                    </div>

                    <div class="d-flex justify-content-around align-items-center mb-4">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkbox" checked />
                            <label class="form-check-label"> Remember me </label>
                        </div>
                        <a href="#!">Forgot password?</a>
                    </div>



                    <input type="submit" class="btn btn-primary btn-lg" style="color: var(--background)" value="Sign In" />
                    <a href="/signup"><button type="button" class="btn btn-secondary btn-lg">Sign Up</button></a>
                </form>
            </div>
        </div>
    </div>
</section>

</html>