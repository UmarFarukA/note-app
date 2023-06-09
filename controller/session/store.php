<?php

use utils\Validator;
use utils\App;

$db = App::resolve('utils\Database');

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::string($password)) {
    $errors['password'] = "Password is invalid";
}

if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address";
}

$user = $db->query("SELECT * FROM users WHERE email = :email", ['email' => $email]);

if (!$user) {
    require view(
        'session/login.view.php',
        [
            'errors' => $errors
        ]
    );
    exit();
} else {

    if (password_verify($password, $user->password)) {

        $_SESSION['user'] = $email;
        header('location: /');
        exit();
    } else {
        require view('session/login.view.php');;
        exit();
    }
}
