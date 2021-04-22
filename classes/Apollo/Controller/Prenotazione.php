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

    public function prenotazioneProcess() {
        $prenotazione = $_POST['prenotazione'];
        $id_evento = $_GET['id_evento'];
        $evento = $this->eventTable->findById($id_evento);
        $utente = $this->authentication->getUser();
        $prenotazioni = $this->prenotazioneTable->find('id_evento',$evento['id_evento']);
        $occupati = 0;
        foreach($prenotazioni as $preno) {
            $occupati += $preno['posti'];
        }
        if ($prenotazione['posti'] > 5 or ($prenotazione['posti'] > ($evento['posti'] - $occupati))) {
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
            $prenotazione['id_evento'] = $evento['id_evento'];
            $prenotazione['id_utente'] = $utente['id_utente'];
            $this->prenotazioneTable->save($prenotazione);
            $film = $this->filmTable->findById($evento['id_film']);
            
            //SPOSTARE QUESTO ROBA DA UN'ALTRA PARTE
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