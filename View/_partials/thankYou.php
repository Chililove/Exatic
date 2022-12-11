<?php

if (!isset($_SESSION['confirm_order']) || empty($_SESSION['confirm_order'])) {
    header('location:checkout.php');
    exit();
}


$pageTitle = 'Thank You';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConfirmedOrder</title>
</head>

<body>
    <div class="vh-100 h-custom d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="border border-3 border-success"></div>
            <div class="card  bg-white shadow p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1>Thank You !</h1>
                            <p> Your order has been placed. <br> We've send the invoice to your mail ?
                                <?php unset($_SESSION['confirm_order']); ?>
                            </p>
                            <a href="/" type="button" class="btn btn-outline-dark">Back Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>