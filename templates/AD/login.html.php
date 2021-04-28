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
            <label for="username">username</label>
            <input type="text" id="username" name="username" autofocus>
        </section>
        <section class="campo">
            <label for="password">password</label>
            <input type="password" id="password" name="password">
        </section>
        <input type="submit" value="accedi">
    </form>
</div>