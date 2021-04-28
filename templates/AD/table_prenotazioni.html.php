
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
        <div class="table">
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
                    <tr id="<?= $prenotazione['id_prenotazione'] ?>">
                        <td><?= $prenotazione['utente']['nome'] ?></td>
                        <td><?= $prenotazione['utente']['cognome'] ?></td>
                        <td><?= $prenotazione['posti'] ?></td>
                        <td><?= $prenotazione['utente']['email'] ?></td>
                        <td><?= $prenotazione['telefono'] ?></td>
                        <td>
                            <button type="button" onclick="modifica_prenotazione(<?= $prenotazione['id_prenotazione'] ?>)">modifica</button>
                            <button type="button" onclick="elimina_prenotazione(<?= $prenotazione['id_prenotazione'] ?>)">elimina</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php endforeach; ?>
<div class="prenotazione-form">
    
</div>