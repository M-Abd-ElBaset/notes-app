<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm {
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        //validate the email
        if(!Validator::email($attributes['email'])){
            $this->errors['email'] = "Please provide a valid email";
        }
        //validate the email
        if(!Validator::string($attributes['password'])){
            $this->errors['password'] = "Please provider a Password";
        }
    }

    public static function validate($attributes){
        $instance = new static($attributes);
        return $instance->failed()? $instance->throw() : $instance;
    }

    public function throw(){
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(){
        return count($this->errors);
    }

    public function error($key, $message){
        $this->errors[$key] = $message;
        return $this;
    }

    public function errors(){
        return $this->errors;
    }
}
