<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([885,8692, 934, 100]);

if($numbers->contains(1000)){
    die(var_dump('it contains 100'));
}