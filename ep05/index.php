<?php

require __DIR__ . "/vendor/autoload.php";


use CoffeeCode\Paginator\Paginator;
use Source\Models\Post;

$post = new Post();
$page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//$posts = $post->find("")->count();

$paginator = new Paginator("https://localhost/phptips/ep05/?page=", "Página",
    ["Primeria Página", "Primeira"], ["Útima Pagina", "ùltima" ]);
// $paginator = new Paginator("https://localhost/phptips/ep05/?page=");
$paginator->pager($post->find()->count(), 3, $page, 2);

$posts = $post->find()->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

echo "<link href='style.css' rel='stylesheet'/>";

echo "<p>Página {$paginator->page()} de {$paginator->pages()}.</p>";

if ($posts) {
    foreach ($posts as $post) {
        $imageCover = $post->cover ? $post->cover : 'image-not-found.svg';
        echo "<article class='post'>";
        echo "<img src='{$imageCover}'/>";
        echo "<div>";
        echo "<h1>{$post->title}</h1>";
        echo "<div>{$post->description}</div>";
        echo "</div>";
        echo "</article>";
    }
}

echo $paginator->render();

