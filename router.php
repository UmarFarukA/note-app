<?php

//view all navigation
$router->get('/', 'home.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

//view all notes
$router->get('/notes', 'notes/index.php')->only('auth');

//View single note
$router->get('/note', 'notes/show.php');

//delete notes
$router->delete('/note', 'notes/destroy.php');

//create note
$router->get('/note-create', 'notes/create.php')->only('auth');
$router->post('/note-create', 'notes/store.php')->only('auth');


//edit note
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note/edit', 'notes/update.php');


//Registration paths
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');

//Login path
$router->get('/login', 'session/create.php');
$router->post('/session', 'session/store.php');

//Logout
$router->delete('/session', 'session/destroy.php');
