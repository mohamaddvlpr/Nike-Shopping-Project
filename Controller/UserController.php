<?php

namespace Controller;

use Core\Database;
use Core\Validator;

class UserController
{

    public $errors = [];

    public function index() {}

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("location: /register");
            exit();
        }

        $username = trim($_POST["username"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $phone = trim($_POST["phone"] ?? "");
        $pass = $_POST["pass"] ?? "";
        $passRepeat = $_POST["passPr"] ?? "";
        $role = in_array($_POST["role"] ?? "", ["admin", "simple"], true) ? $_POST["role"] : "simple";

        $validate = new Validator();

        $validate->validLength($username, 6, 30, "username", "Username is not valid");
        $validate->validLength($pass, 6, 30, "pass", "Password is not valid");
        $validate->validEmail($email, "Your Email Is Not Valid");
        $validate->startWith($phone, "09", "Your PhoneNumber Is Not Valid");
        $validate->isPasswordSame($pass, $passRepeat, "Your Password Is Not Same");

        $this->errors = $validate->errors;

        $db = new Database;

        $user = $db->query("select id from users where email = :email", [
            ":email" => $email
        ])->fetch();

        if ($user) {
            header("location: /login");
            exit();
        }

        if (!empty($this->errors)) {
            view("users/create.view.php", [
                "errors" => $this->errors
            ]);
        } else {
            $newId = $db->insert("users", [
                "username" => $username,
                "email" => $email,
                "password" => password_hash($pass, PASSWORD_DEFAULT),
                "phone" => $phone,
                "roles" => $role
            ]);

            session_regenerate_id(true);
            $_SESSION["username"] = $username;
            $_SESSION["id"] = (int) $newId;

            header("location: /");
            exit();
        }
    }
    public function destory() {}
    public function login()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = trim($_POST["email"] ?? "");
            $password = $_POST["password"] ?? "";

            $query = (new Database)->query("select id, username, email, password from users where email = :email", [
                ":email" => $email
            ])->fetch();

            if ($query) {
                if (!password_verify($password, $query["password"])) {
                    $this->errors[] = "Password is not correct";
                } else {
                    session_regenerate_id(true);
                    $_SESSION["username"] = $query["username"];
                    $_SESSION["id"] = (int) $query["id"];

                    header("location: /");
                    exit;
                }
            } else {
                $this->errors[] = "First Make Account";
            }
        }
        view("users/login.view.php", [
            "errors" => $this->errors
        ]);
    }


    public function create()
    {
        view("users/create.view.php", ["errors" => $this->errors]);
    }

    public function logout()
    {
        $_SESSION = [];

        session_destroy();
        setcookie("PHPSESSID", "", time() - 3600, "/");

        header("location: /");
        exit();
    }
}
