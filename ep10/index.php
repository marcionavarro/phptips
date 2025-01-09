<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Uploader\Image;
use CoffeeCode\Uploader\File;
use CoffeeCode\Uploader\Media;

/*use CoffeeCode\Uploader\Send;*/

$uploadImage = new Image("storage", "images");
$uploadFile = new File("storage", "files");
$uploadMedia = new Media("storage", "midias");
/*$uploadSend = new Send("storage", "sends", [], []);*/

$files = $_FILES;

if (!empty($files["image"])) {
    $image = $files["image"];

    if (empty($files["image"]) || !in_array($image["type"], $uploadImage::isAllowed())) {
        echo "<p>Selecione um arquivo válida</p>";
    } else {
        $uploaded = $uploadImage->upload($image, pathinfo($image["name"], PATHINFO_FILENAME), 350);
        echo "<img src='{$uploaded}' />";
    }
//    dump($file);
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Single Image:</h1>
    <input type="file" accept="image/jpeg, image/jpg, image/png" name="image"/>
    <button>Enviar</button>
</form>

<hr/>

<?php
if (!empty($files["images"])) {
    $images = $files["images"];

    /*for ($i = 0; $i < count($images["type"]); $i++) {
        foreach (array_keys($images) as $keys) {
            $imageFiles[$i][$keys] = $images[$keys][$i];
        }
    }

    foreach ($imageFiles as $image) {
        //        dump($image);
        if (empty($image["type"])) {
            echo "<p>Selecione uma imagem válida</p>";
        } elseif (!in_array($image["type"], $uploadImage::isAllowed())) {
            echo "<p>O arquivo {$image["name"]} não é válido!</p>";
        } else {
            $uploaded = $uploadImage->upload($image, pathinfo($image["name"], PATHINFO_FILENAME), 350);
            echo "<img src='{$uploaded}' />";
        }
    }*/

//    dump($imageFiles);

    $multipleImages = $uploadImage->multiple("images", $files);
    foreach ($multipleImages as $image) {
        if (empty($image["type"])) {
            echo "<p>Selecione uma imagem válida</p>";
        } elseif (!in_array($image["type"], $uploadImage::isAllowed())) {
            echo "<p>O arquivo {$image["name"]} não é válido!</p>";
        } else {
            $uploaded = $uploadImage->upload($image, pathinfo($image["name"], PATHINFO_FILENAME), 350);
            echo "<img src='{$uploaded}' />";
        }
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Multiple Image:</h1>
    <input type="file" accept="image/jpeg, image/jpg, image/png" name="images[]" multiple/>
    <button>Enviar</button>
</form>

<hr/>
<?php
$files = $_FILES;

if (!empty($files["file"])) {
    $file = $files["file"];

    if (empty($files["file"]) || !in_array($file["type"], $uploadFile::isAllowed())) {
        echo "<p>Selecione uma imagem válida</p>";
    } else {
        $uploaded = $uploadFile->upload($file, pathinfo($file["name"], PATHINFO_FILENAME));
        echo "<a href='{$uploaded}' target='_blank'>Acessar Arquivo</a>";
    }
//    dump($file);
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Send File:</h1>
    <input type="file" name="file"/>
    <button>Enviar</button>
</form>

<hr/>
<?php
$medias = $_FILES;

if (!empty($files["media"])) {
    $media = $medias["media"];

    if (empty($media["type"]) || !in_array($media["type"], $uploadMedia::isAllowed())) {
        echo "<p>Selecione uma mídia válida</p>";
    } else {
        $uploaded = $uploadMedia->upload($media, pathinfo($media["name"], PATHINFO_FILENAME));
        echo "<a href='{$uploaded}' target='_blank'>Acessar Media</a>";
    }
//    dump($file);
}
$sended = filter_input(INPUT_GET, "sended", FILTER_VALIDATE_BOOLEAN);
if ($sended && empty($medias["media"])) {
    echo "Selecione uma mídia de até " . ini_get("upload_max_filesize");
}
?>
<form action="?sended=true" method="post" enctype="multipart/form-data">
    <h1>Send Mídia:</h1>
    <input type="file" name="media"/>
    <button>Enviar</button>
</form>

