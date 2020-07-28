<div class="film-form">
    <h2>Aggiungi film</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="film-campi">
            <section class="campo">
                <label for="title">Titolo</label>
                <input type="text" id="titolo" name="film[titolo]">
            </section>
            <section class="campo">
                <label for="locandina">Locandina</label>
                <input type="file" id="locandina" name="locandina">
            </section>
            <section class="campo">
                <label for="descrizione">Descrizione</label>
                <textarea id="descrizione" name="film[descrizione]" cols="30" rows="3"></textarea>
            </section>
        </div>
        <input type="submit" value="inserisci">
    </form>
</div>