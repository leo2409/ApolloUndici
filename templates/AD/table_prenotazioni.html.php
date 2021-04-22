
<div class="contenuto">
    <p>giorno: </p>
    <form action="">
        <input type="search">
    </form>
</div>
<h1><?= $eventi[0]['data'] ?? 'NON CI SONO EVENTI IN PROGRAMMAZIONE PER QUESTO GIORNO'?></h1>
<?php foreach($eventi as $evento) : ?>
    <div class="contenuto">
        <div class="titolo-orario">
            <h2><?= $evento['film']['titolo'] ?></h2> 
            <p><?= $evento['orario'] ?></p>
            <p>occupati <?= $evento['occupati'] ?> liberi <?= $evento['posti'] - $evento['occupati'] ?></p>
        </div>
        <table>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Posti</th>
                <th>Email</th>
                <th>Numero</th>
                <th></th>
            </tr>
            <?php foreach($evento['prenotazioni'] as $prenotazione) : ?>
                <tr>
                    <td><?= $prenotazione['utente']['nome'] ?></td>
                    <td><?= $prenotazione['utente']['cognome'] ?></td>
                    <td><?= $prenotazione['posti'] ?></td>
                    <td><?= $prenotazione['utente']['email'] ?></td>
                    <td><?= $prenotazione['telefono'] ?></td>
                    <td>
                        <a href="ADAG.php?route=prenotazione/modifica&id_prenotazione=<?= $prenotazione['id_prenotazione'] ?>">modifica</a>
                        <a href="ADAG.php?route=prenotazione/elimina&id_prenotazione=<?= $prenotazione['id_prenotazione'] ?>">elimina</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endforeach; ?>