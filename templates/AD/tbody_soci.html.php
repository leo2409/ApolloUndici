<?php foreach($soci as $socio) : ?>
    <tr id="<?= $socio['id_socio'] ?>" class="<?= $socio['valido'] ?>">
        <td><?= $socio['nome'] ?></td>
        <td><?= $socio['cognome'] ?></td>
        <td><?= $socio['email'] ?></td>
        <td><?= $socio['data_nascita'] ?></td>
        <td><?= $socio['luogo_nascita'] ?></td>
        <td><?= $socio['indirizzo'] ?></td>
        <td><?= $socio['cap'] ?></td>
        <td><?= $socio['anno_pagamento'] ?? 'NO' ?></td>
        <td>
        <?php
        if ($socio['valido'] == 'A-F') {
            if ($socio['anno_pagamento'] == NUll) {
                echo 'nuovo';
            } else {
                echo 'scaduto';
            }
        } else {
            echo 'valido';
        }
         ?>
        </td>
        <td>
        <?php if($socio['valido'] == 'A-F') : ?>
            <button type="button" onclick="paga_socio(<?= $socio['id_socio'] ?>)" >Pagato</button>
        <?php endif; ?>
        </td>
        <td><button type="button" onclick="modifica_socio(<?= $socio['id_socio'] ?>)"  >Modifica</button></td>
    </tr>
<?php endforeach; ?>