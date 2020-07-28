
 <div class="event-stuff">
     <img src="<?=$film['locandina'] ?>" alt="locandina" class="locandina-preview">
     <input type="hidden" name="evento[id_film]" value="<?=$film['id_film']?>">
    <section class="campo">
        <label for="date">orario</label>
        <input type="date" id="date" name="evento[data]">
    </section>
    <section class="campo">
        <label for="orario">orario</label>
        <input type="time" id="orario" name="evento[orario]">
    </section>
    <section class="campo">
        <label for="descrizione">descrizione</label>
        <textarea id="descrizione" name="evento[descrizione]" cols="30" rows="3"></textarea>
    </section>
    <section class="campo">
        <label for="posti">posti</label>
        <input type="number" id="posti" value="50" name="evento[posti]">
    </section>

    <!--
        TIPOLOGIA DI EVENTO
    <section class="campo">
        <label for="presentazione">presentazione</label>
        <input type="radio" id="presentazione" value="presentazione" name="tipologia">
        <label for="presentazione-libro">presentazione libro</label>
        <input type="radio" id="presentazione-libro" value="presentazione-libro" name="tipologia">
    </section>
    -->

    <input type="submit" value="inserisci">
</div>
