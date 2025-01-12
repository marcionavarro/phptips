<?php $this->layout("_theme", ["title" => "Usuários"]); ?>

<div class="create">
    <div class="form_ajax" style="display: none"></div>
    <form class="form" name="gallery" action="<?= $router->route("form.create") ?>" method="post"
          enctype="multipart/form-data">
        <label>
            <input type="text" name="first_name" placeholder="Nome:"/>
        </label>
        <label>
            <input type="text" name="last_name" placeholder="Sobrenome:"/>
        </label>
        <button>Cadastrar Usuário</button>
    </form>
</div>

<section class="users">
    <?php
    if (!empty($users)):
        foreach ($users as $user):
            $this->insert("user", ["user" => $user]);
        endforeach;
    endif;
    ?>

    <?php if (empty($user)) : ?>
        <article class="users_user" style="color: white; background: #34a6fc !important;">
            <h1>Não existem usuários cadastrados!</h1>
        </article>
    <?php endif; ?>
</section>

<?php $this->start("js") ?>
<script>
    $(function () {
        function load(action) {
            var load_div = $(".ajax_load");

            if (action === "open") {
                load_div.fadeIn().css("display", "flex");
            } else {
                load_div.fadeOut();
            }
        }

        $("form").submit(function (e) {
            e.preventDefault();

            var form = $(this);
            var form_ajax = $(".form_ajax");
            var users = $(".users");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "POST",
                dataType: "json",
                beforeSend: function () {
                    load("open");
                },
                success: function (callback) {
                    if (callback.message) {
                        form_ajax.html(callback.message).fadeIn();
                    } else {
                        form_ajax.fadeOut(function () {
                            $(this).html("");
                        })
                    }

                    if (callback.user) {
                        users.prepend(callback.user);
                    }
                },
                complete: function () {
                    load("close");
                }
            })
        })

        $("body").on("click", "[data-action]", function (e) {
            e.preventDefault();

            var data = $(this).data();
            var div = $(this).parent();

            $.post(data.action, data, function () {
                div.fadeOut();
            }, "json").fail(function () {
                alert("erro ao processar requisição!");
            })

        })

    })
</script>
<?php $this->end() ?>

