<?php $this->layout('_theme'); ?>

<div class="contact">
    <h2>Fale Conosoco</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, aspernatur.</p>

    <form action="<?= url();?>" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Seu Nome:">
        <input type="text" name="email" placeholder="Seu Email:">
        <textarea name="message" placeholder="Mensagem:" rows="3"></textarea>
        <button>Enviar Mensagem</button>
    </form>
</div>

<?php $this->start('scripts'); ?>
<script>
    $(function(){
        $("button").after("<button type='reset'>Limpar</button>");
    })
</script>
<?php $this->end('scripts'); ?>