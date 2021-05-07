<div class="contenuto">
    <h1>Ricerca Soci</h1>
    <div class="ricerca">
        <form action="">
            <section>
                <label for="nome">nome</label>
                <input type="text" id="nome" name="socio[nome]" onkeyup="ricerca_soci()" value="<?=$socio['nome'] ?? '' ?>">
            </section>
            <section>
                <label for="cognome">cognome</label>
                <input type="text" id="cognome" name="socio[cognome]" onkeyup="ricerca_soci()" value="<?=$socio['cognome'] ?? '' ?>">
            </section>
            <section>
                <input type="checkbox" id="validi" name="validi" value="true" onclick="ricerca_soci()">
                <label for="validi">validi</label>
            </section>
            <button >Cerca</button>
        </form>
    </div>
    <div class="contenuto">
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Email</th>
                        <th>data_nascita</th>
                        <th>luogo_nascita</th>
                        <th>indirizzo</th>
                        <th>cap</th>
                        <th>tessera</th>
                        <th>stato</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php include __DIR__ . '/tbody_soci.html.php'; ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="/ApolloUndici/public/ajax.php?route=socio/excel" class="button">Scarica il file excel dei soci <i class="far fa-file-excel"></i></a>
</div>
<div class="form contenuto">
    <h2>Tessera</h2>
    <form id="form-tessera" method="POST">
        <div class="form-grid">
            <section class="campo">
                <label for="nome">nome</label>
                <input type="text" id="nome" name="socio[nome]" value="<?=$socio_save['nome'] ?? '' ?>" pattern="^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27']\s?)+$" autofocus required>
            </section>
            <section class="campo">
                <label for="cognome">cognome</label>
                <input type="text" id="cognome" name="socio[cognome]" value="<?=$socio_save['cognome'] ?? '' ?>" pattern="^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27']\s?)+$" required>
            </section>
            <section class="campo">
                <label for="email">email</label>
                <input type="email" id="email" name="socio[email]" value="<?=$socio_save['email'] ?? '' ?>" autocomplete="username" required>
            </section>
            <section class="campo">
                <label for="data_nascita">data di nascita</label>
                <input type="date" id="data_nascita" name="socio[data_nascita]" value="<?=$socio_save['data_nascita'] ?? '' ?>" required>
            </section>
            <section class="campo">
                <label for="luogo_nascita">luogo di nascita</label>
                <input type="text" id="luogo_nascita" name="socio[luogo_nascita]" pattern="^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27']\s?)+$" value="<?=$socio_save['luogo_nascita'] ?? '' ?>" required>
            </section>
            <section class="campo">
                <label for="indirizzo">indirizzo</label>
                <input type="address" id="indirizzo" name="socio[indirizzo]" value="<?=$socio_save['indirizzo'] ?? '' ?>" required>
            </section>
            <section class="campo">
                <label for="cap">cap</label>
                <input type="text" id="cap" name="socio[cap]" pattern="^[0-9]{5}$" title="CAP 5 numeri" value="<?=$socio_save['cap'] ?? '' ?>" required>
            </section>
            <section class="campo">
                <input type="checkbox" id="pagato" class="checkbox" value="true" name="pagato" checked>
                <label for="pagato">pagato</label>
            </section>
        </div>
        <button type="button" onclick="saveTessara()" class="button blue submit">salva</button>
    </form>
</div>
<script src="js/admin/search_soci.js"></script>