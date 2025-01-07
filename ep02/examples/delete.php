<?php
require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;

$user = (New User())->findById(4 );
if ($user) {
    $user->destroy();
} else {
    var_dump($user);
}
