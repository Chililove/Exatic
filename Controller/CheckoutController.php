
<?php


if (!isset($_SESSION['shopping_cart']) || empty($_SESSION['shopping_cart'])) {
    header('location:product.php');
    exit();
} else {

    $cartItemCount = count($_SESSION['shopping_cart']);

    //pre($_SESSION);

    if (isset($_POST['submit'])) {
        if (isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['address'], $_POST['country'], $_POST['zipcode']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['country'])  && !empty($_POST['zipcode'])) {
            $firstName = $_POST['firstName'];

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
                $errorMsg[] = 'Please enter valid email address';
            } else {
                //sanitize is a custom function
                //you can find it in index.php file
                $firstName  = sanitize($_POST['firstName']);
                $lastName   = sanitize($_POST['lastName']);
                $email      = sanitize($_POST['email']);
                $address    = sanitize($_POST['address']);
                $address2   = (!empty($_POST['address2']) ? sanitize($_POST['address2']) : '');
                $country    = sanitize($_POST['country']);
                $zipcode    = sanitize($_POST['zipcode']);

                $sql = 'INSERT INTO orders (firstName, lastName, email, address, address2, country, zipcode, order_status,created_at, updated_at) VALUES (:fname, :lname, :email, :address, :address2, :country, :zipcode, :order_status,:created_at, :updated_at)';
                $statement = $conn->prepare($sql);
                $params = [
                    'fname' => $firstName,
                    'lname' => $lastName,
                    'email' => $email,
                    'address' => $address,
                    'address2' => $address2,
                    'country' => $country,
                    'zipcode' => $zipcode,
                    'order_status' => 'confirmed',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ];

                $statement->execute($params);
                if ($statement->rowCount() == 1) {

                    $getOrderID = $conn->lastInsertId();

                    if (isset($_SESSION['cart_items']) || !empty($_SESSION['cart_items'])) {
                        $sqlDetails = 'INSERT INTO orderDetail2 (orderID, productID, productName, price, quantity, totalPrice) VALUES(:orderID,:productID,:productName,:price,:quantity,:totalPrice)';
                        $orderDetailStmt = $conn->prepare($sqlDetails);

                        $totalPrice = 0;
                        foreach ($_SESSION['cart_items'] as $item) {
                            $totalPrice += $item['totalPrice'];

                            $paramOrderDetails = [
                                'orderID' =>  $getOrderID,
                                'productID' =>  $item['productID'],
                                'productName' =>  $item['productName'],
                                'price' =>  $item['price'],
                                'quantity' =>  $item['quantity'],
                                'totalPrice' =>  $item['totalPrice']
                            ];

                            $orderDetailStmt->execute($paramOrderDetails);
                        }

                        $updateSql = 'UPDATE orders SET totalPrice = :total WHERE orderID = :id';

                        $rs = $conn->prepare($updateSql);
                        $prepareUpdate = [
                            'total' => $totalPrice,
                            'id' => $getOrderID
                        ];

                        $rs->execute($prepareUpdate);

                        unset($_SESSION['cart_items']);
                        $_SESSION['confirm_order'] = true;
                        include("View/_partials/thankYou.php");
                        exit();
                    }
                } else {
                    $errorMsg[] = 'Unable to save your order. Please try again';
                }
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

            if (!isset($_POST['address']) || empty($_POST['address'])) {
                $errorMsg[] = 'Address is required';
            } else {
                $addressValue = $_POST['address'];
            }

            if (!isset($_POST['country']) || empty($_POST['country'])) {
                $errorMsg[] = 'Country is required';
            } else {
                $countryValue = $_POST['country'];
            }

            if (!isset($_POST['zipcode']) || empty($_POST['zipcode'])) {
                $errorMsg[] = 'Zipcode is required';
            } else {
                $zipCodeValue = $_POST['zipcode'];
            }


            if (isset($_POST['address2']) || !empty($_POST['address2'])) {
                $address2Value = $_POST['address2'];
            }
        }
    }
}
?>
