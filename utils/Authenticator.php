<?php

namespace utils;

use utils\App;
use utils\Session;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve('utils\Database')->query("SELECT * FROM users WHERE email = :email", ['email' => $email])->findOne();

        if ($user) {

            if (password_verify($password, $user['password'])) {

                $this->login($user);

                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
        redirect("/");

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::flush();
    }
}
