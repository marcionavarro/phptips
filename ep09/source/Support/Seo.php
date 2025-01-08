<?php


namespace Source\Support;


use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    protected $optmizer;

    public function __construct(string $schema = "article")
    {
        $this->optmizer = new Optimizer();
        $this->optmizer->openGraph(
            SITE,
            "pt-br",
            $schema
        )->publisher(
            "marcio.navarroaraujo"
        )->twitterCard(
            "@mnsaipers",
            "https://www.marcionavarro.com.br",
            "marcionavarro.com.br"
        )->facebook(
            "",
        );
    }

    public function render(string $title, string $description, string $url, string $image, bool $follow = true)
    {
        return $this->optmizer->optimize($title, $description, $url, $image, $follow)->render();
    }
}