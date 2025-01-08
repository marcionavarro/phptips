<?php


namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;
use Source\Support\Seo;

/**
 * Class Web
 * @package Source\App
 */
class Web
{
    /** @var Engine */
    private $view;

    /** @var */
    private $seo;

    /**
     * Web constructor.
     */
    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../theme", "php");
        $this->seo = new Seo();
    }

    /**
     * @param string $templateName
     * @param array $data
     * @return string
     */
    public function render(string $templateName, array $data): string
    {
        if ($this->view->exists($templateName)) {
            $this->view->addData($data);
            return $this->view->render($templateName);
        }

        return "O template {$templateName} não existe em {$this->view->path($templateName)}";
    }

    /**
     * HOME
     *
     * @return void
     */
    public function home()
    {
        $users = (new User())->find()->fetch(true);

        $head = $this->seo->render(
            "HOME | {" . SITE,
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet blanditiis, commodi delectus eveniet in pariatur porro praesentium quibusdam ullam veritatis!",
            url(),
            "https://fakeimg.pl/1200x628?text=Home+Cover"
        );

        echo $this->render("home", [
            "head" => $head,
            'users' => $users
        ]);
    }

    /**
     * CONTATO
     *
     * @return void
     */
    public function contact()
    {
        $head = $this->seo->render(
            "CONTATO | {" . SITE,
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet blanditiis, commodi delectus eveniet in pariatur porro praesentium quibusdam ullam veritatis!",
            url(),
            "https://fakeimg.pl/1200x628?text=Contato+Cover"
        );

        echo $this->render("contact", [
            "head" => $head
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
        $head = $this->seo->render(
            "ERRO {$data["errcode"]}" ,
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet blanditiis, commodi delectus eveniet in pariatur porro praesentium quibusdam ullam veritatis!",
            url("ops/{$data["errcode"]}"),
            "https://fakeimg.pl/1200x628?text=Erro+{$data["errcode"]}"
        );

        echo $this->render("error", [
            "head" => $head,
            "error" => $data["errcode"]
        ]);
    }
}
