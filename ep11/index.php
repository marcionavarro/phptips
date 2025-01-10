<?php

require __DIR__ . "/vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Handler\StreamHandler;
use \Monolog\Handler\NativeMailerHandler;
use Monolog\Handler\TelegramBotHandler;
use Monolog\Formatter\LineFormatter;


$logger = new Logger("web");
$logger->pushHandler(new BrowserConsoleHandler(Level::Debug));
$logger->pushHandler(new StreamHandler(__DIR__ . "/log.txt", Level::Warning));
/*$logger->pushHandler(new NativeMailerHandler(
    "marcionavarrodearaujo@gmail.com",
    "Erro em marcionavarro.com.br: " . date("d/m/Y h:i:s"),
    "noreply@marcionavarro.com.br",
    Level::Critical
));*/

$logger->pushProcessor(function ($record) {
    $record["extra"]["HTTP_HOST"] = $_SERVER["HTTP_HOST"];
    $record["extra"]["REQUEST_URI"] = $_SERVER["REQUEST_URI"];
    $record["extra"]["REQUEST_METHOD"] = $_SERVER["REQUEST_METHOD"];
    $record["extra"]["HTTP_USER_AGENT"] = $_SERVER["HTTP_USER_AGENT"];
    return $record;
});

$tele_key = "7821680547:AAEGt8YZgo6RPA4h-rTQdEW9XYZDhHWni-4";
//$tele_channel = "@MarcioNavarroMonolog";
$tele_channel = "-1002480617011"; // Encontra esse ID debugando em sendCurl na classe TelegramBotHandler
$tele_handler = new TelegramBotHandler($tele_key, $tele_channel, Level::Emergency);
$tele_handler->setFormatter(new LineFormatter("%level_name%: %message%"));
$logger->pushHandler($tele_handler);

// Debug
$logger->debug("Olá mundo", ['logger' => true]);
$logger->info("Olá mundo", ['logger' => true]);
$logger->notice("Olá mundo", ['logger' => true]);

// File
$logger->warning("Olá mundo", ['logger' => true]);
$logger->error("Olá mundo", ['logger' => true]);

// Email
//$logger->critical("Olá mundo", ['logger' => true]);
//$logger->alert("Olá mundo", ['logger' => true]);

// Telegram
$logger->emergency("Essa mensagem foi enviada pelo Monolog!");