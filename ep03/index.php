<?php

require __DIR__ . "/vendor/autoload.php";

use Source\Support\Email;

$email = new Email();

$email->add(
    "Olá mundo esse é meu primeiro E-mail",
    "<h1>Estou apenas testando!</h1>Espero que tenha dado certo!",
    "Marcio N. Araujo",
    "contato@marcionavarro.com.br" // Aqui fica o email pra onde vai enviar
)->send();

if (!$email->error()) {
    var_dump(true);
} else {
    $email->error()->getMessage();
}

/************************************************************************************/

/*$email->add(
    "Olá mundo esse é meu segundo E-mail",
    "<h1>Estou apenas testando!</h1>Espero que tenha dado certo!",
    "Marcio N. Araujo",
    "contato@marcionavarro.com.br"
)->attach(
    "files/01.png",
    "WebDevelloper"
)->attach(
    "files/01.jpg",
    "Koala"
)->send();

if (!$email->error()) {
    var_dump(true);
} else {
    $email->error()->getMessage();
}*/

