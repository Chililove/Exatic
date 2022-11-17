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
            <div class="col">
                <img src="/assets/prettyplate.jpeg" class="d-block w-100" alt="image">
            </div>

            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <h3 class="mb-3 pb-2 pb-md-10">Sign in</h3>
                <form method="POST">

                    <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-control form-control-lg" />
                        <label class="form-label">Email address</label>
                    </div>


                    <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control form-control-lg" />
                        <label class="form-label">Password</label>
                    </div>

                    <!-- <div class="d-flex justify-content-around align-items-center mb-4">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkbox" checked />
                            <label class="form-check-label"> Remember me </label>
                        </div>
                        <a href="#!">Forgot password?</a>
                    </div> -->

                    <input type="submit" class="btn btn-success btn-lg" style="color: var(--background)" value="Sign In" />
                    <a href="/signup"><button type="button" class="btn btn-outline-secondary btn-lg">Sign Up</button></a>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .item img {
        width: 100%;
        height: 100%;

    }

    section {
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>


</html>