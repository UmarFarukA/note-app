<?php

use utils\App;

$db = App::resolve('utils\Database');

$currentUserId = 1;



$note = $db->query("select * from notes where id = :id", [":id" => $_GET['id']])->findOneOrFail();

authorize($note['user_id'] !== $currentUserId);

view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'note' => $note
]);
