<?php

use utils\Validator;
use utils\App;

$db = App::resolve('utils\Database');

$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];

$errors = [];

if (!Validator::string($fname, 2, 255)) {
    $errors['password'] = "Name cannot be empty and must be at least two characters";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Password must be at least 7 characters and not morethan 255";
}

if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address";
}


$user = $db->query("select * from users where email = :email", ["email" => $email])->findOne();

if ($user) {
    header("location: /");
    exit();
} else {

    $options = [
        'cost' => 12
    ];

    $hash_password = password_hash($password, PASSWORD_BCRYPT, $options);

    $db->query("insert into users(name, email, password) values(:name, :email, :password)", [
        "name" => $fname,
        "email" => $email,
        "password" => $hash_password
    ]);

    $_SESSION['user'] = $email;

    header('location: /');
    exit();
}
