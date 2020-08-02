<div class="register-form">
    <h1>
        Registrati
    </h1>
    <?php if(isset($errors)) : ?>
        <div class="errors">
            <ul>
                <?php foreach($errors as $error) : ?>
                    <li>
                        <?=$error?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?> 
    <form action="" method="POST">
        <section class="campo">
            <label for="nome">nome</label>
            <input type="text" id="nome" name="user[nome]" value="<?=$user['nome'] ?? '' ?>">
        </section>
        <section class="campo">
            <label for="cognome">cognome</label>
            <input type="text" id="cognome" name="user[cognome]" value="<?=$user['cognome'] ?? '' ?>">
        </section>
        <section class="campo">
            <label for="email">email</label>
            <input type="email" id="email" name="user[email]" value="<?=$user['email'] ?? '' ?>">
        </section>
        <section class="campo">
            <label for="password">password</label>
            <input type="password" id="password" name="user[password]">
        </section>
        <input type="submit" value="registrati">
    </form>
</div>