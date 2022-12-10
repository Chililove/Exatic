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


$isAuthenticated = isset($_SESSION['userID']);
$isAdmin = isset($_SESSION['userType']) && $_SESSION['userType'] == '0';

// public routes
$view = match ($toCheck) {
    '' => '/View/home.php',
    '/' => '/View/home.php',
    '/contact' => '/View/contact.php',
    '/about-us' => '/View/aboutus.php',
    '/product-overview' => '/View/productoverview.php',
    '/home' => '/View/home.php',
    '/signin' => '/View/login.php',
    '/signup' => '/View/signup.php',
    '/checkout' => '/View/checkout.php',
    '/product' => '/View/product.php',
    '/shopping-cart' => '/View/shoppingcart.php',
    '/cart-preview' => '/View/cart-preview.php',
    '/SendMail' => '/View/SendMail.php',
    '/logout' => '/View/logout.php',
    default => null
};


if ($view == null && $isAuthenticated && !$isAdmin) {
    $view = match ($toCheck) {
        '/profile' => '/View/profile.php',
            // ... other authenticated pages
        default => null
    };
}

if ($view == null && $isAdmin) {
    $view = match ($toCheck) {
        'admin-profile' => '/View/adminProfile.php',
        '/admin-profile' => '/View/adminProfile.php',
        '/admin-product' => '/View/adminProduct.php',
        '/admin-user-list' => '/View/adminUsersList.php',
        '/admin-event' => '/View/adminEvent.php',
        '/admin-product-add' => '/View/adminProductAdd.php',
        '/admin-product-edit' => '/View/adminProductEdit.php',
        '/admin-event-add' => '/View/adminEventAdd.php',
        '/admin-event-edit' => '/View/adminEventEdit.php',

            // ... other admin pages
        default => null
    };
}

if ($view !== null) {
    require __DIR__ . $view;
} else {
    require __DIR__ . '/View/404.php';
}
