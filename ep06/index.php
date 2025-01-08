<?php

use League\OAuth2\Client\Provider\FacebookUser;

ob_start();

require __DIR__ . "/vendor/autoload.php";

if(empty($_SESSION['userlogin'])){
    echo "<h1>GUEST</h1>";

    /**
     * AUTH FACEBOOK
     */
    $facebook = new \League\OAuth2\Client\Provider\Facebook([
        'clientId'          => FACEBOOK["app_id"],
        'clientSecret'      => FACEBOOK["app_secret"],
        'redirectUri'       => FACEBOOK["app_redirect"],
        'graphApiVersion'   => FACEBOOK["app_version"],
    ]);

    $authUrl = $facebook->getAuthorizationUrl([
        "scope" => ["email"]
    ]);

    $error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_SPECIAL_CHARS);
    if($error){
        echo "<h4>Voçê não têm autorização para continuar</h4>";
    }

    $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_SPECIAL_CHARS);
    if($code){
        $token = $facebook->getAccessToken("authorization_code", [
            "code" => $code
        ]);

        $_SESSION["userlogin"] = $facebook->getResourceOwner($token);
        header("refresh: 0");
    }

    echo "<a href='{$authUrl}' title='FB Login'>Facebook Login</a>";

}else{
    /** @var $user FacebookUser */

    $user = $_SESSION["userlogin"];

    echo "<img src='{$user->getPictureUrl()}'/> <h1>Bem Vindo: {$user->getFirstName()}</h1>";

    var_dump($user);
    echo "<a href='?off=true' title='Sair'>sair</a>";

    $off = filter_input(INPUT_GET, "off", FILTER_VALIDATE_BOOLEAN);
    if($off){
        unset($_SESSION["userlogin"]);
        header("refresh: 0");
    }
}


ob_end_flush();
