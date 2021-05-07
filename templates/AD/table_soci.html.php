<div class="contenuto">
    <h1>Richieste soci</h1>
    <div class="contenuto">
        <div class="table">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Email</th>
                    <th>data_nascita</th>
                    <th>luogo_nascita</th>
                    <th>indirizzo</th>
                    <th>cap</th>
                    <th></th>
                </tr>
                <?php foreach($soci as $socio) : ?>
                    <tr id="<?= $socio['id_socio'] ?>">
                        <td><?= $socio['nome'] ?></td>
                        <td><?= $socio['cognome'] ?></td>
                        <td><?= $socio['email'] ?></td>
                        <td><?= $socio['data_nascita'] ?></td>
                        <td><?= $socio['luogo_nascita'] ?></td>
                        <td><?= $socio['indirizzo'] ?></td>
                        <td><?= $socio['cap'] ?></td>
                        <td>
                            <button type="button" onclick="accetta_socio(<?= $socio['id_socio'] ?>)">Accetta</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<script src="js/admin/socio.js"></script>