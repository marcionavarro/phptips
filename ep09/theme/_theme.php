<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $head ?>

    <link rel="stylesheet" href="<?= url("/theme/style.css"); ?>">
</head>

<body>
    <nav class="main_nav">
        <?php
        if ($this->section('sidebar')) :
            echo $this->section('sidebar');
        else :
        ?>
            <a href="<?= url(); ?>" title="">Home</a>
            <a href="<?= url("contato"); ?>" title="">Contato</a>
            <a href="<?= url("teste"); ?>" title="">Teste</a>
        <?php endif; ?>
    </nav>

    <main class="main_content">
        <?= $this->section("content"); ?>
    </main>

    <footer class="main_footer">
        <?= SITE; ?> Todos os direitos Reservados
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <?= $this->section("scripts"); ?>
</body>

</html>