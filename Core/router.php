<?php

// require "./helper.php";
require "helper.php";

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$routes = require MAIN_PATH . "routes.php";

routeToController($uri, $routes);