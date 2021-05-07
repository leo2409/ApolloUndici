<?php foreach ($date as $data) : ?>
    <div class="day">
        <div class="date">
            <h2 class="data"><?=$data['data']?></h2>
        </div>
        <div class="programmazione">
            <?php foreach ($data['events'] as $event) : ?>
                <div class="evento" id="<?=$event['id_evento'] ?? '' ?>">
                    <div class="sfondo">
                        <img class="locandina" src="<?=$event['film']['locandina'] . '.webp' ?? '' ?>" alt="locandina <?=$event['film']['titolo'] ?? '' ?>">
                    </div>
                    <div class="tit-ora">
                        <p><?=$event['orario'] ?? '' ?></p>
                        <h4><?=$event['film']['titolo'] ?? '' ?> </h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php foreach ($data['events'] as $event) : ?>
            <div class="informazioni contenuto" id="<?=$event['id_evento'] ?? '' ?>">
                <h2><?=$event['film']['titolo'] ?? '' ?></h2>
                <p>
                    <?=$event['film']['descrizione'] ?? '' ?>
                </p>
                <a href="index.php?route=prenota&id_evento=<?=$event['id_evento'] ?? '' ?>">prenota ></a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
<div class="contenuto round richiesta-soci">
    <div class="flex-container">
        <div class="cerchio">
            <img src="img/modulo.png" alt="">
        </div>
        <h2>Soci Apollo Undici</h2>
    </div>
    <div class="testo">
        <p>Come Associazione Culturale per partecipare alle attività dell'Apollo Undici si deve essere socio.</p>
        <a class="button blue" href="index.php?route=tesseramento/info">Richiesta per diventare soci ></a>
        
    </div>
</div>
<div class="contenuto round">
    <h2>Dove Siamo</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.061394161998!2d12.507655!3d41.892527!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdfb984382f1032c7!2sApollo%2011!5e0!3m2!1sit!2suk!4v1619217763599!5m2!1sit!2suk" allowfullscreen="" loading="lazy" class="mappa"></iframe>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis pariatur officiis rem sapiente minima veniam a fugit provident magnam voluptas atque totam excepturi magni et, nobis libero ea esse explicabo.</p>
</div>