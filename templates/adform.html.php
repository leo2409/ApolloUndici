
<div class="film-form">
    <form action="ADAG.php" method="post" enctype="multipart/form-data">
        <div class="film">
            <h2>Film</h2>
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
                <textarea name="film[descrizione]" id="descrizione" cols="30" rows="3"></textarea>
            </section>
            
        </div>
        <input type="submit" value="inserisci">
    </form>
</div>