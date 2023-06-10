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

$user = $db->query("SELECT * FROM users WHERE email = :email", ['email' => $email])->findOne();

if ($user) {
    if (password_verify($password, $user['password'])) {

        login($user);
    } else {
        return view(
            'session/login.view.php',
            [
                'errors' => [
                    'password' => 'Invalid password'
                ]
            ]
        );
    }
} else {
    return view(
        'session/login.view.php',
        [
            'errors' => 'No matching credentials found!'
        ]
    );
    exit();
}
