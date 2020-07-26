<h1>Films</h1>
<div class="film-form">
    <h2>Aggiungi film</h2>
    <form action="ADAG.php" method="post" enctype="multipart/form-data">
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
<div class="film-container">

    <?php foreach($films as $film) : ?>
        <div class="film">
            <div class="locandina-container">
                <img src="<?=$film['locandina']?>" alt="<?php echo 'locandina ' . $film['title'] ?>">
            </div>
            <div class="descrizione">
                <h2>
                    <?=$film['titolo']?>
                </h2>
                <p>
                    <?=$film['descrizione']?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<h1>Eventi</h1>
<div class="event-container">
    <div class="event-form">
        <h2>Aggiungi evento</h2>
        <form action="ADAG.php" method="post">
            <section class="campo">
                <label for=""></label>
            </section>
        </form>
    </div>
</div>