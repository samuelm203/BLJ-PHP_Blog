<?php

$page = basename($_SERVER['REQUEST_URI'] ?? '');

$routes = [
    'blog'              => 'views/home_view.php',
    'friends'           => 'views/friends_view.php',
    'read'              => 'views/blog_view.php',
    'about'             => 'views/about_view.php',
    'write'             => 'views/write_view.php',
    'login'             => 'views/login_view.php',
    'signup'            => 'views/signup_view.php'
];

if (array_key_exists($page, $routes)) {
    require $routes[$page];
} 
else {
    require 'views/404_view.php';
    http_response_code(404);
}
