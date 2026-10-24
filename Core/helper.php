<?php
// require "./Responce.php";

use Core\Responce;

if (!function_exists("dd")) {
    function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }
}

if (!function_exists("isUrl")) {
    function isUrl($value)
    {
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) === $value;
    }
}

if (!function_exists("abort")) {
    function abort($code = Responce::NOT_FOUND)
    {
        http_response_code($code);
        require MAIN_PATH . "./views/{$code}.view.php";
        die();
    }
}

if (!function_exists("routeToController")) {
    function routeToController($uri, $routes)
    {
        if (!array_key_exists($uri, $routes)) {
            abort();
        } else {
            [$controller, $method] = $routes[$uri];
            $controller = new $controller;
            $controller->$method();
        }
    }
}

if (!function_exists("view")) {
    function view($path, $attr = [])
    {
        extract($attr);
        require MAIN_PATH . "views/{$path}";
    }
}

if (!function_exists("assets")) {
    function assets($path)
    {
        return "/assets/{$path}";
    }
}

if(!function_exists("startWith")) {
    function startWith(string $value, string $needle, $message)
    {
        $errors = [];
        if (!str_starts_with(trim($value), $needle)) {
            $errors["phone"] = $message;
        }

        return $errors;
    }

}
