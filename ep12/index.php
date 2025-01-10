<?php

use Faker\Factory;
use League\Csv\Statement;
use League\Csv\Writer;
use League\Csv\Reader;
use Source\Models\User;

require __DIR__ . "/vendor/autoload.php";


$output = false;
if ($output) {
    $users = (new User())->find()->fetch(true);
    $writer = Writer::createFromFileObject(new SplTempFileObject());
    $writer->setDelimiter(';');
    $reader = Reader::createFromString("fist_name, last_name, genre");
    $writer->insertOne($reader->fetchOne());

    foreach ($users as $user) {
        $writer->insertOne([
            $user->first_name,
            $user->last_name,
            $user->genre
        ]);
    }

    $writer->output("users.csv");
}

$create = false;
if ($create) {
    $users = (new User)->find()->fetch(true);

    $stream = fopen(__DIR__ . "/csvs/users.csv", "w");
    $writer = Writer::createFromStream($stream);

    $writer->insertOne(["first_name", "last_name", "genre"]);

    foreach ($users as $user) {
        $writer->insertOne([
            trim($user->first_name ?? ""),
            $user->last_name,
            $user->genre
        ]);
    }

    echo true;
}

$edit = true;
if ($edit) {
    $stream = fopen(__DIR__ . "/csvs/users.csv", "a+");
    $writer = Writer::createFromStream($stream);
    $faker = Factory::create("pt_br");
    $genre = ["male", "female"][rand(0, 1)];

    $writer->insertOne([
        $faker->firstName($genre),
        $faker->firstName($genre),
        strtoupper(substr($genre, 0, 1))
    ]);
}

$read = true;
if ($read) {
    $reader = Reader::createFromPath(__DIR__ . "/csvs/users.csv", "r");
    $reader->setHeaderOffset(0);

    $stmt = (new Statement());
    $users = $stmt->process($reader);

    foreach ($users as $user) {
        var_dump($user);
    }
}
