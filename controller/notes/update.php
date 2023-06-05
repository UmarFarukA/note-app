<?php

use utils\Validator;
use utils\App;

$db = App::resolve('utils\Database');
$heading = "Edit Note";

$errors = [];


$id = 1;

if (!Validator::string($_POST["slug"], 5, 20)) {
    $errors['slug'] = "Note slug is required & must not be more than 25 characters";
}

if (!Validator::string($_POST["body"], 10, 255)) {
    $errors['body'] = "Note body is required & must not exceed 255";
}

$note = $db->query("select * from notes where id = :id", [":id" => $_GET['id']])->findOneOrFail();

authorize($note['user_id'] !== $id);

if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'heading' => $heading,
        'note' => $note,
        'errors' => $errors
    ]);
}

$db->query(
    "update notes set slug = :slug, body = :body where id = :id",
    [
        'slug' => sanitizeFields($_POST['slug']),
        'body' => sanitizeFields($_POST['body']),
        'id' => $_GET['id']
    ]
);

header('location: /notes');
exit();
