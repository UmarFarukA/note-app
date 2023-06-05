<?php

//view all navigation
$router->get('/', 'controller/home.php');
$router->get('/about', 'controller/about.php');
$router->get('/contact', 'controller/contact.php');

//view all notes
$router->get('/notes', 'controller/notes/index.php')->only('auth');

//View single note
$router->get('/note', 'controller/notes/show.php');

//delete notes
$router->delete('/note', 'controller/notes/destroy.php');

//create note
$router->get('/note-create', 'controller/notes/create.php')->only('guest');
$router->post('/note-create', 'controller/notes/store.php');


//edit note
$router->get('/note/edit', 'controller/notes/edit.php');
$router->patch('/note/edit', 'controller/notes/update.php');


//Registration paths
$router->get('/register', 'controller/registration/create.php');
$router->post('/register', 'controller/registration/store.php');