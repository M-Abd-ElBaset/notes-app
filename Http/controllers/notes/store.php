<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$body = trim($_POST['body']);
$userId = 1;

$errors = [];

if(!Validator::string($body, 1, 1000)){
    $errors['body'] = 'Body of less than 1,000 characters is required';
}

if(!empty($errors)){
    return view("notes/create.view.php", [
        'heading'=> 'Create new Note',
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO notes(body, user_id) VALUES (:body, :user_id)", [
    "body"=>$body,
    "user_id"=>$userId,
]);

header('location: /notes');
die();