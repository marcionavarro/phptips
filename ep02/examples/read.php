<?php

require __DIR__ . "/../vendor/autoload.php";

use CoffeeCode\DataLayer\Connect;

/*$conn = Connect::getInstance();
$error = Connect::getError();

if($error){
    echo $error->getMessage();
    die;
}

$query = $conn->query("SELECT * FROM users");
var_dump($query->fetchAll());*/

use Source\Models\User;
use Source\Models\Address;

$user = new User();

if (!$user) {
    echo "<h1>Não existem dados do usuário no banco</h1>";
    return;
}

$list = $user->find()->fetch(true);

/** @var $userItem User */
foreach ($list as $userItem) {
    var_dump($userItem->data());
}

echo "<hr />";

/** @var $userItem User */
foreach ($list as $userItem) {

    if (empty($userItem->adressess())) {
//        echo "<p>Não existem dados do endereço no banco para o usuário</p>";
        return;
    }

    foreach ($userItem->adressess() as $adressess) {
        var_dump($adressess->data());
    }
}

echo "<hr />";

$address = new Address();
$listAddress = $address->find()->fetch(true);

/** @var  $addressItem */
foreach ($listAddress as $addressItem) {
    if (empty($userItem->users())) {
//        echo "<p>Não existem dados do endereço no banco para o usuário</p>";
        return;
    }

    foreach($addressItem->users() as $users){
        var_dump($users->data());
    }
}




