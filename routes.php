<?php

use Controller\AboutController;
use Controller\HomeController;
use Controller\ContactController;
use Controller\ProductController;
use Controller\UserController;

return [
    "/" => [HomeController::class, "index"],
    "/contact" => [ContactController::class, "index"],
    "/about" => [AboutController::class, "index"],
    "/products" => [ProductController::class, "index"],
    "/product" => [ProductController::class, "show"],
    "/product/create" => [ProductController::class, "create"],
    "/product/store" => [ProductController::class, "store"],
    "/register" => [UserController::class, "create"],
    "/register/store" => [UserController::class, "store"],
    "/login" => [UserController::class, "login"],
    "/logout" => [UserController::class, "logout"]
];