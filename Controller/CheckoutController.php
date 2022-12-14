
<?php
require_once('index.php');



$cities = $conn->query($ProfileModel->allPostalSelect);


if (!isset($_SESSION['shopping_cart']) || empty($_SESSION['shopping_cart'])) {
    header('location:product.php');
    exit();
} else if (!isset($_SESSION['userID']) || empty($_SESSION['userID'])) {
    header('location:signup.php?checkout=1');
    exit();
} else {

    $cartItemCount = count($_SESSION['shopping_cart']);

    //pre($_SESSION);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $firstName  = $sanitized['firstName'];
        $lastName   = $sanitized['lastName'];
        $email      = $sanitized['email'];
        $streetName    = $sanitized['streetName'];
        $streetNumber   = $sanitized['streetNumber'];
        $postalCodeID    = $sanitized['postalCodeID'];
        $userID = $_SESSION['userID'];


        if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($streetName) && !empty($streetNumber) && !empty($postalCodeID)) {

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
                $errorMsg[] = 'Please enter valid email address';
            } else {

                try {
                    $conn->beginTransaction();

                    $ProfileModel->update($conn, $userID, $firstName, $lastName, $email, '', $streetName, $streetNumber, $postalCodeID);
                    $status = 'Pending';
                    $handle = $conn->prepare($OrderModel->orderInsert);
                    $handle->bindParam(':status', $status, PDO::PARAM_STR);
                    $handle->bindParam(':userID', $userID, PDO::PARAM_INT);
                    $handle->execute();
                    $orderID = $conn->lastInsertId();

                    foreach ($_SESSION['shopping_cart'] as $item) {
                        $quantity = $item['stockQuantity'];
                        $priceOne = $item['price'];
                        $price = $item['price'] * $item['stockQuantity'];
                        $procent = 0;
                        $productID = $item['productID'];
                        $title = $item['title'];
                        $handleOrderDetail = $conn->prepare($OrderModel->orderDetailsInsert);
                        $handleOrderDetail->bindParam(':title', $title, PDO::PARAM_STR);
                        $handleOrderDetail->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                        $handleOrderDetail->bindParam(':price', $price, PDO::PARAM_INT);
                        $handleOrderDetail->bindParam(':procent', $procent, PDO::PARAM_INT);
                        $handleOrderDetail->bindParam(':orderID', $orderID, PDO::PARAM_INT);
                        $handleOrderDetail->bindParam(':productID', $productID, PDO::PARAM_INT);
                        $handleOrderDetail->bindParam(':priceOne', $priceOne, PDO::PARAM_INT);


                        $handleOrderDetail->execute();
                    }
                    $conn->commit();
                    unset($_SESSION['shopping_cart']);
                    $_SESSION['confirm_order'] = true;
                    include("View/_partials/thankYou.php");
                    exit();
                } catch (Exception $err) {
                    $conn->rollback();
                    $errorMsg[] = 'Transaction failed';
                }





                //         unset($_SESSION['cart_items']);
                //         $_SESSION['confirm_order'] = true;
                //         include("View/_partials/thankYou.php");
                //         exit();
                //     }
                // } else {
                //     $errorMsg[] = 'Unable to save your order. Please try again';
                // }
            }
        } else {
            $errorMsg = [];

            if (!isset($_POST['firstName']) || empty($_POST['firstName'])) {
                $errorMsg[] = 'First name is required';
            } else {
                $fnameValue = $_POST['firstName'];
            }

            if (!isset($_POST['lastName']) || empty($_POST['lastName'])) {
                $errorMsg[] = 'Last name is required';
            } else {
                $lnameValue = $_POST['lastName'];
            }

            if (!isset($_POST['email']) || empty($_POST['email'])) {
                $errorMsg[] = 'Email is required';
            } else {
                $emailValue = $_POST['email'];
            }
        }
    }
}
$handle = $conn->prepare($ProfileModel->user);
$handle->bindParam(':userID', $_SESSION['userID'], PDO::PARAM_INT);
$handle->execute();
$result = $handle->fetchAll();

$user = $result[0];
?>
