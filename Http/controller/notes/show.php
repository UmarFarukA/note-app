<?php

use utils\App;

$db = App::resolve('utils\Database');

$currentUserId = 5;



$note = $db->query("select * from notes where id = :id", [":id" => $_GET['id']])->findOneOrFail();

authorize($note['user_id'] !== $currentUserId);

view('notes/show.view.php', [
    'heading' => 'My notes',
    'note' => $note
]);
