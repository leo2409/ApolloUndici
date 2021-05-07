
<div class="suddivisione">

    <div class="films">
        <h1>Film</h1>
        <div class="film-container">

            <div class="add-button">
                <a href="ADAG.php?route=film/edit"><i class="fas fa-plus-circle 2x"></i> Aggiungi film</a>
            </div>

            <?php foreach($films as $film) : ?>
                <div class="film">
                    <div class="flex-container">
                        <div class="locandina-container">
                            <div class="img">
                                <img src="<?=$film['locandina'] . '.webp' ?>" alt="<?php echo 'locandina ' . $film['title'] ?>">
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
                        <a href="ADAG.php?route=film/edit&id_film=<?=$film['id_film']?>">modifica</a>
                        <a href="ADAG.php?route=film/delete&id_film=<?=$film['id_film']?>">elimina</a>
                    </div>
                </div>
            <?php endforeach; ?>

            <div>
                <a href="ADAG.php?route=film/all">visualizza tutti ></a>
            </div>

        </div>
    </div>

    <div class="eventi">
        <h1>Eventi</h1>
        <div class="event-container">

            <div class="add-button">
                <a href="ADAG.php?route=event/edit"><i class="fas fa-plus-circle 2x"></i> Aggiungi evento</a>
            </div>

            <?php foreach($eventi as $n => $evento) : ?>

                <div class="evento">
                    <div class="flex-container">
                        <div class="locandina-container">
                            <div class="img">
                                <img src="<?=$evento['film']['locandina'] . '.webp' ?>" alt="<?php echo 'locandina ' . $evento['film']['titolo'] ?>">
                            </div>
                        </div>
                        <div class="descrizione">
                            <h2>titolo:</h2>
                            <p>
                                <?=$evento['film']['titolo']?>
                            </p>
                            <h2>descrizione evento:</h2>
                            <p>
                                <?=$evento['descrizione']?>
                            </p>
                            <h2>data:</h2>
                            <p><?=$evento['data']?></p>
                            <h2>orario:</h2>
                            <p><?=$evento['orario']?></p>
                            <h2>posti:</h2>
                            <p><?=$evento['posti']?></p>
                        </div>
                    </div>

                    <div class="edit-delete">
                        <a href="ADAG.php?route=event/edit&id_evento=<?=$evento['id_evento']?>">modifica</a>
                        <a href="ADAG.php?route=event/delete&id_evento=<?=$evento['id_evento']?>">elimina</a>
                    </div>
                    
                </div>

            <?php endforeach; ?>

            <div>
                <a href="#">visualizza tutti ></a>
            </div>
        </div>
    </div>
</div>
<!--<iframe src="http://93.42.99.214/ApolloUndici/public/" frameborder="0" class="apolloIframe"></iframe>-->
