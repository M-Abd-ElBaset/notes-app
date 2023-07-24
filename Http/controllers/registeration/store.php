<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$errors = [];
//validate the email
if(!Validator::email($email)){
    $errors['email'] = "Please provide a valid email";
}
//validate the email
if(!Validator::string($password, 7, 255)){
    $errors['password'] = "Please provider a Password of at least 7 characters";
}

if(!empty($errors)){
    return view("registeration/create.view.php", [
        'errors' => $errors
    ]);
}

//check if the email is already exist

$user = $db->query("select * from users where email = :email", [
    'email'=> $email
])->find();

if($user){
    header('location: /');
    die();
}

//store the new user

$db->query("INSERT INTO users(email, password) VALUES (:email, :password)", [
    "email"=>$email,
    "password"=> password_hash($password, PASSWORD_BCRYPT),
]);

login([
    'email'=>$email
]);

header('location: /');
die();