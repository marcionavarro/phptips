<?php
require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;

$user = (New User())->findById(7);
$user->first_name = "Roberto";
$user->last_name = "Costa";
$user->save();


var_dump($user);
