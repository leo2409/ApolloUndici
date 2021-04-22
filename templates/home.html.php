<?php foreach ($date as $data) : ?>
    <div class="day">
        <div class="date">
            <h2 class="data"><?=$data['data']?></h2>
        </div>
        <div class="programmazione">
            <?php foreach ($data['events'] as $event) : ?>
                <div class="evento" id="<?=$event['id_evento'] ?? '' ?>">
                    <div class="sfondo">
                        <img class="locandina" src="<?=$event['film']['locandina'] ?? '' ?>" alt="locandina">
                    </div>
                    <div class="tit-ora">
                        <p><?=$event['orario'] ?? '' ?></p>
                        <h4><?=$event['film']['titolo'] ?? '' ?> </h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php foreach ($data['events'] as $event) : ?>
            <div class="informazioni" id="<?=$event['id_evento'] ?? '' ?>">
                <h2><?=$event['film']['titolo'] ?? '' ?></h2>
                <p>
                    <?=$event['film']['descrizione'] ?? '' ?>
                </p>
                <a href="index.php?route=prenota&id_evento=<?=$event['id_evento'] ?? '' ?>">prenota ></a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
<div class="iscrizione-soci">
    <div class="testo">
        <h2>Soci Apollo Undici</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas aliquid officiis optio distinctio praesentium corrupti, ipsa suscipit omnis. Illo, ab?</p>
        <a href="">Richiesta per diventare soci ></a>
    </div>
</div>
