<?php 
namespace Apollo\Controller;

class Prenotazione {
    private $utenteTable;
    private $eventTable;
    private $prenotazioneTable;
    private $filmTable;
    private $authentication;


    public function __construct(\Framework\DatabaseTable $utenteTable, \Framework\DatabaseTable $eventTable, \Framework\DatabaseTable $prenotazioneTable, \Framework\DatabaseTable $filmTable, \Framework\Authentication $authentication) {
        $this->prenotazioneTable = $prenotazioneTable;
        $this->eventTable = $eventTable;
        $this->utenteTable = $utenteTable;
        $this->filmTable = $filmTable;
        $this->authentication = $authentication;
    }

    public function formPrenotazione() {
        $id_evento = $_GET['id_evento'];
        $title = 'prenotazione';
        $evento = $this->eventTable->findById($id_evento);
        $evento['film'] = $this->filmTable->findById($evento['id_film']);
        $utente = $this->authentication->getUser();
        return [
            'title' => $title,
            'templates' => [
                'template' => 'prenotazione_form.html.php',
            ],
            'variables' => [
                'evento' => $evento,
                'utente' => $utente,
            ],
        ];
    }

    # VIENE PROCESSATA LA PRENOTAZIONE
    public function prenotazioneProcess() {
        # recupero la prenotazione
        $prenotazione = $_POST['prenotazione'];
        # recuper l'evento in cui si vuole prenotare
        $id_evento = $_GET['id_evento'];
        # reupero i dati dell'evento
        $evento = $this->eventTable->findById($id_evento);
        # recupero i dati dell'utente
        $utente = $this->authentication->getUser();
        # recupero le prenotazioni di quell'evento
        $prenotazioni = $this->prenotazioneTable->find('id_evento',$evento['id_evento']);
        # calcolo i posti gia occupati
        $occupati = 0;
        foreach($prenotazioni as $preno) {
            $occupati += $preno['posti'];
        }
        # verifico che ci siano abbastanza posti disponibili e limito le prenotazioni dei posti a 5
        if ($prenotazione['posti'] > 5 or ($prenotazione['posti'] > ($evento['posti'] - $occupati))) {
            # in caso di errore
            $error = 'non è possibile prenotare più di 5 posti o sono terminati i posti liberi ';
            $title = 'prenotazione';
            $evento['film'] = $this->filmTable->findById($evento['id_film']);
            return [
                'title' => $title,
                'templates' => [
                    'template' => 'prenotazione_form.html.php',
                ],
                'variables' => [
                    'evento' => $evento,
                    'utente' => $utente,
                    'error' => $error,
                ],
            ];
        } else {
            # creo la prenotazione
            $prenotazione['id_evento'] = $evento['id_evento'];
            $prenotazione['id_utente'] = $utente['id_utente'];
            # la salvo nel database
            $this->prenotazioneTable->save($prenotazione);
            $film = $this->filmTable->findById($evento['id_film']);
            
            /*
            // GESTIONE EMAIL 
            // FORSE CONVIENE CREARE UNA CLASSE CHE SE NE OCCUPA
            // passing true in constructor enables exceptions in PHPMailers
            $mail = new \vendor\phpmailer\phpmailer\src\PHPMailer(true);

            try {
                // Server settings
                //$mail->SMTPDebug = \vendor\phpmailer\phpmailer\src\SMTP::DEBUG_SERVER; // for detailed debug output
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = \vendor\phpmailer\phpmailer\src\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->Username = 'leonardo.brunetti242@gmail.com'; // YOUR gmail email
                $mail->Password = 'Natyleo6901'; // YOUR gmail password

                // Sender and recipient settings
                $mail->setFrom('leonardo.brunetti242@gmail.com', 'Apollo Undici');
                $mail->addAddress($utente['email'], $utente['nome'] . ' ' . $utente['cognome']);

                // Setting the email content
                $mail->IsHTML(true);
                $mail->Subject = "Conferma prenotazione " . $film['titolo'] . ' il ' . $evento['data'] . ' alle ' . $evento['orario'] . ' POSTI: ' . $prenotazione['posti'];
                $mail->Body = '<b>ciaociaocaio</b>';
                $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

                $mail->send();
                
            } catch (\vendor\phpmailer\phpmailer\src\Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
            // FINE ROBA EMAIL
            */
            
            $title = 'success';
            return [
                'title' => $title,

                'templates' => [
                    'template' => 'corretta_prenotazione.html.php',
                ],

                'variables' => [
                    'evento' => $evento,
                    'film' => $film,
                    'prenotazione' => $prenotazione,
                ],
            ];
        }
    }

    
}