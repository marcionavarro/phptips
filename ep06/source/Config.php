<?php session_start();

Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

$app_id = $_ENV['APP_ID'];
$app_secret = $_ENV['APP_SECRET'];
$app_redirect= $_ENV['APP_REDIRECT'];
$app_version = $_ENV['APP_VERSION'];


define('FACEBOOK', [
    "app_id" => $app_id, // clientId
    "app_secret" => $app_secret, // clientSecret
    "app_redirect" => $app_redirect, // redirectUri
    "app_version" => $app_version // graphApiVersion
]);

