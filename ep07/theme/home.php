<?php $this->layout('_theme'); ?>

<div class="users">
    <?php if (!empty($users)) :
        foreach ($users as $user) :
    ?>
            <article class="users_user">
                <h3><?= $user->first_name, " ", $user->last_name; ?></h3>
            </article>
        <?php
        endforeach;
    else :
        ?>
        <h4 style="margin-bottom: 20px">Não existem usuários cadastrados!</h4>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem, omnis. Impedit quas animi nihil, porro omnis dicta quod doloremque est et tenetur suscipit! Amet odio dolores architecto commodi! Ipsa, ad.Cumque ab fuga, eligendi, incidunt rerum sint vel placeat culpa odit rem doloremque est? Harum ratione officiis voluptatum cumque quas a laudantium? Sequi, possimus animi quam magnam reprehenderit laboriosam error?</p>
    <?php
    endif;
    ?>
</div>