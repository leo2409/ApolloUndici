<div class="film-form">
    <h2>Aggiungi film</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="film-campi">
            <section class="campo">
                <label for="title">Titolo</label>
                <input type="text" id="titolo" name="film[titolo]" value="<?=$film['titolo'] ?? '' ?>">
            </section>
            <section class="campo">
                <label for="locandina">Locandina</label>
                <input type="file" id="locandina" name="locandina" >
            </section>
            <section class="campo">
                <label for="descrizione">Descrizione</label>
                <textarea id="descrizione" name="film[descrizione]" cols="30" rows="3"><?=$film['descrizione'] ?? '' ?></textarea>
            </section>
            <input type="hidden" name="film[id_film]" value="<?=$film['id_film'] ?? '' ?>">
        </div>
        <img src="<?=$film['locandina'] ?? '' ?>" class="locandina-preview" alt="locandina">
        <input type="submit" value="inserisci">
    </form>
</div>