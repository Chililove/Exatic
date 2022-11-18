<?php
//$request = $_SERVER['REQUEST_URI'];
$urlpath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Reqex to match everything until .php or ?
$regex = '/.+?(?=.php|\?)/';

// Apply regex to request ($parsedRequest in the result)
preg_match($regex, $urlpath, $parsedRequest);

$toCheck;
if (isset($parsedRequest[0])) {
    $toCheck = $parsedRequest[0];
} else {
    $toCheck = $urlpath;
}



switch ($toCheck) {
    case '':
    case '/':
        require __DIR__ . '/View/home.php';
        break;

    case '/about-us':
        require __DIR__ . '/View/aboutus.php';
        break;

    case '/contact':
        require __DIR__ . '/View/contact.php';
        break;
    case '/product-overview':
        require __DIR__ . '/View/productoverview.php';
        break;
    case '/home':
        require __DIR__ . '/View/home.php';
        break;
    case '/signin':
        require __DIR__ . '/View/login.php';
        break;
    case '/signup':
        require __DIR__ . '/View/signup.php';
        break;
        //remove from navbar after login is complete
    case '/profile':
        require __DIR__ . '/View/profile.php';
        break;
    case '/checkout':
        require __DIR__ . '/View/checkout.php';
        break;
    case '/product':
        require __DIR__ . '/View/product.php';
        break;
    case '/shopping-cart':
        require __DIR__ . '/View/shoppingcart.php';
        break;
    case '/cart-preview':
        require __DIR__ . '/View/cart-preview.php';
        break;
    case '/admin-profile':
        require __DIR__ . '/View/adminProfile.php';
        break;
    case '/admin-product':
        require __DIR__ . '/View/adminProduct.php';
        break;
    case '/admin-product-add':
        require __DIR__ . '/View/adminProductAdd.php';
        break;
    case '/admin-product-edit':
        require __DIR__ . '/View/adminProductEdit.php';
        break;
    case '/admin-event-add':
        require __DIR__ . '/View/adminEventAdd.php';
        break;
    case '/logout':
        require __DIR__ . '/View/logout.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/View/404.php';
        break;
}
