<?php

namespace Core;

class Validator
{
    public $errors = [];

    public function validLength($value, int $min, int $max, string $key, string $message)
    {
        $valueLen = mb_strlen(trim((string) $value));

        if ($valueLen > $max || $valueLen < $min) {
            $this->errors[$key] = $message;
        }

        return $this->errors;
    }

    public function validEmail($email, $message)
    {
        if (!filter_var(trim((string) $email), FILTER_VALIDATE_EMAIL)) {
            $this->errors["email"] = $message;
        }

        return $this->errors;
    }

    public function startWith($value, string $needle, $message)
    {
        if (!str_starts_with(trim((string) $value), $needle)) {
            $this->errors["phone"] = $message;
        }

        return $this->errors;
    }

    public function isPasswordSame($userPass, $passRepeat, $message)
    {
        if ((string) $userPass !== (string) $passRepeat) {
            $this->errors["passRp"] = $message;
        }

        return $this->errors;
    }

    public function validPrice($price, $message)
    {
        if (!is_numeric($price) || $price < 0) {
            $this->errors["price"] = $message;
        }

        return $this->errors;
    }
}
