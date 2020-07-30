<?php
//connessione al database
try {
    $pdo = new \PDO('mysql:host=localhost:3335;dbname=apolloundici;charset=utf8','leo','Natyleo6901');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    include_once __DIR__ . '/../includes/AutoLoader.php';

    $filmTable = new \Framework\DatabaseTable($pdo, 'apolloundici.film', 'id_film');

    $stringa = $_GET['q'];
    
    $films = $filmTable->findByInitials($stringa,'titolo');
    if (!isset($films[0])) {
        echo '<p>no result</p>';
    }
    foreach ($films as $film) {
        echo '<button class="search-result" id="' . $film['id_film'] . '" onclick="inserisciDati(' . $film['id_film'] . ')">' . $film['titolo'] . '</button>';
    }
} catch (\PDOException $e) {
 $title = 'An error has occurred';
        $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' 
        . $e->getFile() . ': ' . $e->getLine();
        echo $output;
    }
 ?>
