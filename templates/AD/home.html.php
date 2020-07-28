<h1>Films</h1>
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
            <div class="edit-delete">
                <a href="ADAG.php?route=film/edit&id=<?=$film['id_film']?>">modifica></a>
                <a href="ADAG.php?route=film/delete&id=<?=$film['id_film']?>">elimina></a>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="add-film">
        <a href="ADAG.php?route=film/edit">Aggiungi film></a>
    </div>

</div>

<h1>Eventi</h1>
<div class="event-container">
    <div class="add-event">
        <a href="ADAG.php?route=event/edit">Aggiungi evento></a>
    </div>
</div>