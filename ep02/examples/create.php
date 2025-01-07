<?php
require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;
use Source\Models\Address;


$user = New User();
$user->first_name = "Carlos";
$user->last_name = "Rocha";
$user->genre = "M";
$user->save();

$addr = new Address();
$addr->add($user, "Serra Negra", "312");
$addr->save();


echo '<pre>';
var_dump($user);
echo '</pre>';

echo '<pre>';
var_dump($addr);
echo '</pre>';
