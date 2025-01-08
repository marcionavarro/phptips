<?php

require __DIR__ . '/vendor/autoload.php';

use Composer\Package\Dumper;
use CoffeeCode\Cropper\Cropper;
use Faker\Factory;


$faker = Factory::create('pt_br');
$generate = false;

if ($generate) {
    for ($img = 0; $img < 4; $img++) {
        $faker->image('images', 600, 300);
    }
}

$c = new Cropper('images/cache');
for ($image = 1; $image < 4; $image++) {
    ?>
    <article>
    <h1>Imagem <?= $image ?></h1>
    <img src="images/<?= $image; ?>.png" alt="" width="600" height="300" style="margin-bottom: 25px;">
    <img src="<?= $c->make("images/{$image}.png", "300", "300") ?>" />
    <img src="<?= $c->make("images/{$image}.png", "300", "150") ?>" />
    </article>
    <?php
//    $c->flush("1.png");
//    $c->flush();
}


