<?php

use utils\Validator;
use utils\App;

$db = App::resolve('utils\Database');
$heading = "Create Note";

$errors = [];


$id = 5;

if (!Validator::string($_POST["slug"], 5, 20)) {
    $errors['slug'] = "Note slug is required & must not be more than 25 characters";
}

if (!Validator::string($_POST["body"], 10, 255)) {
    $errors['body'] = "Note body is required & must not exceed 255";
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => $heading,
        'note' => $note,
        'errors' => $errors
    ]);
}

$db->query(
    "INSERT INTO notes(create_time, slug, body, user_id) VALUES(:create_time, :slug, :body, :user_id)",
    [
        'create_time' => date("Y-m-d h:i:s"),
        'slug' => sanitizeFields($_POST['slug']),
        'body' => sanitizeFields($_POST["body"]),
        'user_id' => $id
    ]
);

header('location: /notes');
exit();
