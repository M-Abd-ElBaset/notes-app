<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note-create', 'notes/create.php');
$router->get('/note', 'notes/show.php');
$router->get('/note/edit', 'notes/edit.php');
$router->delete('/note', 'notes/destroy.php');
$router->post('/notes', 'notes/store.php');
$router->patch('/note', 'notes/update.php');

$router->get('/register', 'registeration/create.php')->only('guest');
$router->post('/register', 'registeration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');