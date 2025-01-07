<?php

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

$host = $_ENV['HOST'];
$port = $_ENV['PORT'];
$user = $_ENV['USER'];
$pass = $_ENV['PASSWORD'];
$from_name = $_ENV['FROM_NAME'];
$from_email = $_ENV['FROM_EMAIL'];

define('MAIL', [
    "host" => $host,
    "port" => $port,
    "user" => $user,
    "passwd" => $pass,
    "from_name" => "$from_name",
    "from_email" => $from_email,
]);