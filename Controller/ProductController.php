<?php

namespace Controller;

use Core\Database;
use Core\Responce;
use Core\Validator;
use Controller\ControllerInterface;


class ProductController implements ControllerInterface
{

    public $errors = [];

    public function index()
    {
        if (!isset($_SESSION["id"])) {
            header("location: /login");
            exit();
        }

        $products = (new Database)->query("select * from products where user_id = :user_id", [":user_id" => $_SESSION["id"]])->fetchAll();

        view("products/index.view.php", [
            "productDatas" => $products
        ]);
    }

    public function store()
    {
        if (!isset($_SESSION["id"])) {
            header("location: /login");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("location: /product/create");
            exit();
        }

        $name = trim($_POST["name"] ?? "");
        $price = trim($_POST["price"] ?? "");
        $description = trim($_POST["description"] ?? "");

        $validate = new Validator();

        $validate->validLength($name, 8, 30, "name", "Name Is Invalid");
        $validate->validPrice($price, "Price Is Invalid");

        $photo = $_FILES["photo_path"] ?? null;
        $extensions = ["image/jpeg" => "jpg", "image/png" => "png", "image/gif" => "gif", "image/webp" => "webp"];
        $extension = null;

        if (!$photo || $photo["error"] !== UPLOAD_ERR_OK || !is_uploaded_file($photo["tmp_name"])) {
            $validate->errors["photo"] = "Photo Is Required";
        } else {
            $mime = (new \finfo(FILEINFO_MIME_TYPE))->file($photo["tmp_name"]);
            $extension = $extensions[$mime] ?? null;

            if ($extension === null) {
                $validate->errors["photo"] = "Photo Is Invalid";
            }
        }

        $this->errors = $validate->errors;

        if (!empty($this->errors)) {
            view("products/create.view.php", [
                "errors" => $this->errors
            ]);
            return;
        }

        $newNamePhoto = date("y-m-d") . "-" . bin2hex(random_bytes(8)) . "." . $extension;

        if (!move_uploaded_file($photo["tmp_name"], MAIN_PATH . "public/assets/images/" . $newNamePhoto)) {
            view("products/create.view.php", [
                "errors" => ["photo" => "Photo Upload Failed"]
            ]);
            return;
        }

        (new Database)->insert("products", [
            "user_id" => $_SESSION["id"],
            "category_id" => 1,
            "name" => $name,
            "price" => $price,
            "description" => $description,
            "photo_path" => $newNamePhoto,
        ]);

        header("location: /");
        exit();
    }
    public function destory() {}
    public function show()
    {
        if (!isset($_SESSION["id"])) {
            abort(Responce::UNAUTHORIZED);
        }

        $id = filter_var($_GET["id"] ?? null, FILTER_VALIDATE_INT);

        if ($id === false) {
            abort();
        }

        $productDatas = (new Database)->query("select * from products where id = :id", [":id" => $id])->fetchAll();

        if (empty($productDatas)) {
            abort();
        }

        if ((int) $productDatas[0]["user_id"] !== (int) $_SESSION["id"]) {
            abort(Responce::UNAUTHORIZED);
        }

        view("products/show.view.php", [
            "productDatas" => $productDatas
        ]);
    }

    public function showAll()
    {
        

    }

    public function create()
    {
        if (!isset($_SESSION["id"])) {
            header("location: /login");
            exit;
        } else {
            view("products/create.view.php", [
                "errors" => $this->errors
            ]);
        }
    }
}
