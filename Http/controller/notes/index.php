<?php

use utils\App;

$db = App::resolve('utils\Database');


$notes = $db->query("select * from notes")->get();


view('notes/index.view.php', [
    'heading' => 'My notes',
    'notes' => $notes
]);
