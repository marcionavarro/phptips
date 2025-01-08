<?php $this->layout('_theme'); ?>

<div class="error">
<h2>Ooops erro <?= $error; ?></h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, ad!</p>
</div>

<?php $this->start("sidebar"); ?>
<a href="<?= url(); ?>" title="Voltar ao inicio">Voltar</a>
<?php $this->end("sidebar"); ?>