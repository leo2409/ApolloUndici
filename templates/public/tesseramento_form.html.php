<div class="contenuto form">
    <h1>Modulo Tesseramento</h1>
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
    <form action="index.php?route=tesseramento/modulo" method="POST">
        <section class="campo">
            <label for="nome">nome</label>
            <input type="text" id="nome" name="socio[nome]" value="<?=$socio['nome'] ?? '' ?>" pattern="^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27']\s?)+$" autofocus required>
        </section>
        <section class="campo">
            <label for="cognome">cognome</label>
            <input type="text" id="cognome" name="socio[cognome]" value="<?=$socio['cognome'] ?? '' ?>" pattern="^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27']\s?)+$" required>
        </section>
        <section class="campo">
            <label for="email">email</label>
            <input type="email" id="email" name="socio[email]" value="<?=$socio['email'] ?? '' ?>" autocomplete="username" required>
        </section>
        <section class="campo">
            <label for="data_nascita">data di nascita</label>
            <input type="date" id="data_nascita" name="socio[data_nascita]" value="<?=$socio['data_nascita'] ?? '' ?>" required>
        </section>
        <section class="campo">
            <label for="luogo_nascita">luogo di nascita</label>
            <input type="text" id="luogo_nascita" name="socio[luogo_nascita]" pattern="^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27']\s?)+$" value="<?=$socio['luogo_nascita'] ?? '' ?>" required>
        </section>
        <section class="campo">
            <label for="indirizzo">indirizzo</label>
            <input type="address" id="indirizzo" name="socio[indirizzo]" value="<?=$socio['indirizzo'] ?? '' ?>" required>
        </section>
        <section class="campo">
            <label for="cap">cap</label>
            <input type="text" id="cap" name="socio[cap]" pattern="^[0-9]{5}$" title="CAP 5 numeri" value="<?=$socio['cap'] ?? '' ?>" required>
        </section>
        <section class="campo">
            <input type="checkbox" id="newsletter" name="newsletter" value="true" required>
            <label for="newsletter" id="newsletter">Accetto di ricevere la newsletter periodica ed essere informato sulle attività dell'Associazione</label>
        </section>
        <button class="button blue submit">Invia</button>
    </form>
</div>

<!-- JAVASCRIPT -->
<script src="js\form.js"></script>