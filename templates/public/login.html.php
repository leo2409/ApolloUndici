<div class="login-form">
    <h1>
        Login
    </h1>
    <?php if(isset($error)) : ?>
        <div class="errors">
            <ul>
                <li>
                    <?=$error?>
                </li>
            </ul>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <section class="campo">
            <label for="email">email</label>
            <input type="email" id="email" name="email" value="<?=$email ?? '' ?>" >
        </section>
        <section class="campo">
            <label for="password">password</label>
            <input type="password" id="password" name="password">
        </section>
        <input type="hidden" name="id_evento" value="<?= $id_evento ?? '' ?>" >
        <input type="submit" value="accedi">
    </form>
    <a href="index.php?route=register">Crea account ></a>
</div>