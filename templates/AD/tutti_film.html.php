    <div class="film-container">
        <div class="add-film">
            <a href="ADAG.php?route=film/edit"><i class="fas fa-plus-circle 2x"></i> Aggiungi film</a>
        </div>
        <?php  foreach($films as $film) : ?>
            <div class="film">
                <div class="flex-container">
                    <div class="locandina-container">
                        <div class="img">
                            <img src="<?=$film['locandina']?>" alt="<?php echo 'locandina ' . $film['title'] ?>">
                        </div>
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
                <div class="edit-delete">
                    <a href="ADAG.php?route=film/delete&id_film=<?=$film['id_film']?>">elimina</a>
                    <a href="ADAG.php?route=film/edit&id_film=<?=$film['id_film']?>">modifica</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>