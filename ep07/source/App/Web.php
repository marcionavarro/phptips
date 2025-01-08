<?php


namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../theme", "php");
    }

    public function render(string $templateName, array $data): string
    {
        if($this->view->exists($templateName)){
            $this->view->addData($data);
            return $this->view->render($templateName);
        }

        return  "O template {$templateName} não existe em {$this->view->path($templateName)}";
    }

    /**
     * HOME
     *
     * @return void
     */
    public function home()
    {
        $users = (new User())->find()->fetch(true);

        $render = ["title" => "HOME " . SITE, 'users' => $users];
        echo $this->render("home", $render);
    }

    /**
     * CONTATO
     *
     * @return void
     */
    public function contact()
    {
        echo $this->render("contact", [
            "title" => "Contato " . SITE,
        ]);
    }

    /**
     * ERROR
     *
     * @param array $data
     * @return void
     */
    public function error(array $data)
    {
        echo $this->render("error", [
            "title" => "Error - " . $data["errcode"] . SITE,
            "error" => $data["errcode"]
        ]);
    }
}
