<div class="prenotazione-form">
    <h1>Prenota</h1>
    <?php if(isset($error)) : ?>
        <div class="errors">
            <ul>
                <li>
                    <?=$error?>
                </li>
            </ul>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <section class="campo">
            <label for="posti">posti</label>
            <input type="number" name="prenotazione[posti]" value="1">
        </section>
        <section class="campo">
            <label for="telefono">telefono</label>
            <input type="tel" name="prenotazione[telefono]">
        </section>
        <input type="submit" value="prenota">
    </form>
    <div class="informazioni-utente">
        <p>nome: <?=$utente['nome']?></p>
        <p>cognome: <?=$utente['cognome']?></p>
        <p>email: <?=$utente['email']?></p>
    </div>
    <div class="evento-prenotazione">
        <h2><?=$evento['film']['titolo']?></h2>
        <div class="locandina-container">
            <div class="img">
                <img src="<?=$evento['film']['locandina']?>" alt="<?php echo 'locandina ' . $evento['film']['titolo'] ?>">
            </div>
        </div>
        <div class="descrizione">
            <p>data: <b><?=$evento['data']?></b></p>
            <p>orario: <b><?=$evento['orario']?></b></p>
        </div>
    </div>
</div>