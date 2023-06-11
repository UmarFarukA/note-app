<?php

namespace Http\Form;

use utils\Validator;

class LoginForm
{

    protected $errors = [];

    public function validate($email, $password)
    {
        if (!Validator::string($password)) {
            $errors['password'] = "Password is invalid";
        }

        if (!Validator::email($email)) {
            $errors['email'] = "Please provide a valid email address";
        }

        return $this->errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
