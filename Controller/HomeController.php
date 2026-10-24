<?php

namespace Controller;

use Core\Database;

class HomeController {

    public static function showProduct()
    {
        return (new Database)->query("select * from products where category_id=1 limit 3")->fetchAll();
    }

    public static function index()
    {
        view("index.view.php", [
            "productDatas" => self::showProduct()
        ]);
    }

}
