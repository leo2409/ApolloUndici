

<?php foreach ($date as $data) : ?>
    <div class="day">
        <div class="date">
            <h2><?=$data['data']?></h2>
        </div>
        <div class="programmazione">
            <?php foreach ($data['events'] as $event) : ?>
                <div class="evento">
                    <img class="locandina" src="<?=$event['film']['locandina'] ?? '' ?>" alt="locandina">
                    <p><?=$event['film']['titolo'] ?? '' ?> <?=$event['orario'] ?? '' ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php foreach ($data['events'] as $event) : ?>
            <div class="informazioni">
                <h2><?=$event['film']['titolo'] ?? '' ?></h2>
                <p>
                    <?=$event['film']['descrizione'] ?? '' ?>
                </p>
                <a href="">prenota ></a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
</div>
