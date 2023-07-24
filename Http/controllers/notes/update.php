<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id", ["id"=>$_POST['id']])->findOrFail();

authorize($note['user_id'] == $currentUserId);

$errors = [];

$body = $_POST['body'];

if(!Validator::string($body, 1, 1000)){
    $errors['body'] = 'Body of less than 1,000 characters is required';
}

if(!empty($errors)){
    return view("notes/edit.view.php", [
        'heading'=> 'Create new Note',
        'errors' => $errors,
        'note'=> $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'id'=>$_POST['id'],
    'body'=> $body
]);

header('location: /notes');
die();