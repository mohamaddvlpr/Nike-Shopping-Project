<?php
const MAIN_PATH = __DIR__ . "/../";

session_start();

spl_autoload_register(function($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require MAIN_PATH . ("{$class}.php");
});


require MAIN_PATH . "Core/helper.php";
require MAIN_PATH . "Core/Database.php";
require MAIN_PATH . "Core/router.php";




