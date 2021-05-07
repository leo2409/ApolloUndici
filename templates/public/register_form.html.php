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
            <label for="new-password">password</label>
            <input type="password" id="new-password" name="user[password]" autocomplete="new-password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9_*-+!?,:;.\xE0\xE8\xE9\xF9\xF2\xEC\x27]{8,20}$" title="Deve contenere una minuscola, una maiuscola e un numero. Min 8 max 20 di caratteri minuscoli, maiuscoli, accentati, numeri e (_ * – + ! ? , : ; .)" required>
            <button id="toggle-password" type="button" onclick="togglePassword()" aria-label="Show password as plain text. Warning: this will display your password on the screen.">Show password</button>
        </section>
        <input type="submit" value="registrati">
    </form>
</div>