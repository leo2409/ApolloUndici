<?php foreach ($date as $data) : ?>
    <div class="day">
        <div class="date">
            <h2><?=$data['data']?></h2>
        </div>
        <div class="programmazione">
            <?php foreach ($data['events'] as $event) : ?>
                <div class="evento" id="<?=$event['id_evento'] ?? '' ?>">
                    <img class="locandina" src="<?=$event['film']['locandina'] ?? '' ?>" alt="locandina">
                    <p><?=$event['film']['titolo'] ?? '' ?> <?=$event['orario'] ?? '' ?></p>
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
</div>
