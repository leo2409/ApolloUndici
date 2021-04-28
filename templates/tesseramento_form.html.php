<div class="contenuto form">
    <h1>Modulo Tesseramento</h1>
    <form action="" method="POST">
        <section class="campo">
            <label for="nome">nome</label>
            <input type="text" id="nome" name="user[nome]" value="<?=$user['nome'] ?? '' ?>" autofocus required>
            <small></small>
        </section>
        <section class="campo">
            <label for="cognome">cognome</label>
            <input type="text" id="cognome" name="user[cognome]" value="<?=$user['cognome'] ?? '' ?>" required>
            <small></small>
        </section>
        <section class="campo">
            <label for="email">email</label>
            <input type="email" id="email" name="user[email]" value="<?=$user['email'] ?? '' ?>" autocomplete="username" required>
            <small></small>
        </section>
        <section class="campo">
            <label for="new-password">password</label>
            <input type="password" id="new-password" name="user[password]" autocomplete="new-password" required>
            <button id="toggle-password" type="button" onclick="togglePassword()" aria-label="Show password as plain text. Warning: this will display your password on the screen.">Show password</button>
            <small></small>
        </section>
        <section class="campo">
            <label for="data_nascita">data di nascita</label>
            <input type="date" id="data_nascita" name="user[data_nascita]" required>
            <small></small>
        </section>
        <section class="campo">
            <label for="luogo_nascita">luogo di nascita</label>
            <input type="text" id="luogo_nascita" name="user[luogo_nascita]" required>
            <small></small>
        </section>
        <section class="campo">
            <label for="indirizzo">indirizzo</label>
            <input type="address" id="indirizzo" name="user[indirizzo]" required>
            <small></small>
        </section>
        <section class="campo">
            <label for="cap">cap</label>
            <input type="number" id="cap" name="user[cap]" required>
            <small></small>
        </section>
        <section class="campo">
            <input type="checkbox" id="newsletter" name="newsletter" value="true" required>
            <label for="newsletter" id="newsletter">Accetto di ricevere la newsletter periodica ed essere informato sulle attività dell'Associazione</label>
            <small></small>
        </section>
        <button>Invia</button>
    </form>
</div>

<!-- JAVASCRIPT -->
<script src="js\form.js"></script>