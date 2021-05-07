<script src="js/admin/form.js"></script>

<div class="form film-form">
    <h1>Film</h1>
    <form id="film-form" method="post" enctype="multipart/form-data">
        <div class="form-grid">
            <div class="film-campi contenuto">
                <h2>Scheda Film</h2>
                <img id="preview" src="<?=$film['locandina']?>" class="locandina-preview hidden" onerror="imgHide()">
                <section class="campo">
                    <label for="title">Titolo</label>
                    <input type="text" id="titolo" name="film[titolo]" value="<?=$film['titolo'] ?? '' ?>">
                </section>
                <section class="campo">
                    <label for="locandina">Locandina</label>
                    <input type="file" id="locandina" name="locandina" accept="image/*" onchange="loadFile(event)">
                </section>
                <section class="campo">
                    <label for="descrizione">Descrizione</label>
                    <textarea id="descrizione" name="film[descrizione]" rows="20"><?=$film['descrizione'] ?? '' ?></textarea>
                </section>
                <input type="hidden" name="film[id_film]" value="<?=$film['id_film'] ?? '' ?>">
                <input type="hidden" name="film[locandina]" value="<?=$film['locandina'] ?? '' ?>">
            </div>
            <div class="date contenuto">
                <h2>Programmazione</h2>
                <div id="contenitore-date">
                </div>
                <div class="data-form" id="<?= $evento['id_evento'] ?? '' ?>">
                    <section>
                        <label for="add_data">data</label>
                        <input class="data-input" type="date" id="add_data">
                    </section>
                    <section>
                        <label for="add_orario">orario</label>
                        <input class="data-input" type="time" id="add_orario">
                    </section>
                    <section>
                        <label for="add_posti">posti</label>
                        <input class="data-input-number" type="number" id="add_posti" value="30">
                    </section>
                    <div class="add-button">
                        <button type="button" onclick="aggiungi_data()">Aggiungi <i class="fas fa-plus-circle 2x"></i></button>
                    </Div>
                </div>
            </div>
        </div>
        <button type="submit" class="submit">Salva</button>
    </form>
</div>