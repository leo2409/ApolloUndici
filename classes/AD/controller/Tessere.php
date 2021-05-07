<?php 
namespace AD\Controller;

class Tessere {
    private $socioTable;

    public function __construct(\Framework\DatabaseTable $socioTable) {
        $this->socioTable = $socioTable;
    }

    public function soci() {
        $title = 'soci';
        $soci = $this->socioTable->find('stato_socio', 0);
        return [
            'title' => $title,
            'templates' => [
                'template' => 'table_soci.html.php',
            ],
            'variables' => [
                'soci' => $soci,
            ],
        ];

    }

    public function searchSoci() {
        $title = 'ricerca soci';
        $sql = 'SELECT * FROM apolloundici.socio WHERE stato_socio = 1 ORDER BY anno_pagamento DESC LIMIT 20';
        $stmt = $this->socioTable->query($sql);
        $soci = $stmt->fetchAll();
        $data = new \DateTime;
        $current_data = $data->format('Y');
        foreach ($soci as $key => $socio) {
            $phpdate = strtotime( $socio['data_nascita'] );
            $soci[$key]['data_nascita'] = date( 'd-m-Y', $phpdate );
            if ($socio['anno_pagamento'] != NULL) {
                $phpdate = strtotime( $socio['anno_pagamento'] );
                $soci[$key]['anno_pagamento'] = date( 'd-m-Y', $phpdate );
                $anno_pagamento = new \DateTime($socio['anno_pagamento']);
                $anno = $anno_pagamento->format('Y');
                if ($anno == $current_data) {
                    $soci[$key]['valido'] = 'A-T';
                } else {
                    $soci[$key]['valido'] = 'A-F';
                }
            } else {
                $soci[$key]['valido'] = 'A-F';
            }
        }
        return [
            'title' => $title,
            'templates' => [
                'template' => 'search_soci.html.php',
            ],
            'variables' => [
                'soci' => $soci,
            ],
        ];
    }

    public function ajaxSearchSoci() {
        $nome = $_GET['nome'];
        $cognome = $_GET['cognome'];
        $valido = $_GET['valido'];
        $parameters = [
            ':nome' => $_GET['nome'],
            ':cognome' => $_GET['cognome'],
            //':valido' => $_GET['valido'],
        ];
        $sql = "SELECT * FROM apolloundici.socio WHERE stato_socio = 1 AND LOWER(socio.nome) like LOWER(:nome '%') AND LOWER(socio.cognome) like LOWER(:cognome '%') ORDER BY anno_pagamento DESC LIMIT 20";
        $stmt = $this->socioTable->query($sql, $parameters);
        $soci = $stmt->fetchAll();

        //ROBA RIPETUTA
        $data = new \DateTime;
        $current_data = $data->format('Y');
        foreach ($soci as $key => $socio) {
            $phpdate = strtotime( $socio['data_nascita'] );
            $soci[$key]['data_nascita'] = date( 'd-m-Y', $phpdate );
            if ($socio['anno_pagamento'] != NULL) {
                $phpdate = strtotime( $socio['anno_pagamento'] );
                $soci[$key]['anno_pagamento'] = date( 'd-m-Y', $phpdate );
                $anno_pagamento = new \DateTime($socio['anno_pagamento']);
                $anno = $anno_pagamento->format('Y');
                if ($anno == $current_data) {
                    $soci[$key]['valido'] = 'A-T';
                } else {
                    $soci[$key]['valido'] = 'A-F';
                }
            } else {
                $soci[$key]['valido'] = 'A-F';
            }
        }
        //FINE ROBA

        // UTILIZZARE INCLUDE CON UN TEMPLATES ANCHE PER L'ANNO PAGAMENTO
        ob_start();
            include __DIR__ . '/../../../templates/AD/tbody_soci.html.php';
            $risu = ob_get_clean();
        echo $risu;
        foreach ($soci as $key => $socio) {
            
        }
    }

    public function socioAccettazione() {
        $socio = [
            'id_socio' => $_GET['id_socio'],
            'stato_socio' => true,
        ];
        $this->socioTable->save($socio);

        /*
        //invio mail al socio esito richiesta
        // GESTIONE EMAIL 
        // FORSE CONVIENE CREARE UNA CLASSE CHE SE NE OCCUPA
        // passing true in constructor enables exceptions in PHPMailers
        $mail = new \vendor\phpmailer\phpmailer\src\PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = \vendor\phpmailer\phpmailer\src\SMTP::DEBUG_SERVER; // for detailed debug output

            $mail->isSMTP();
            
            //$mail->SMTPDebug  = 2;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            //s$mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPSecure = \vendor\phpmailer\phpmailer\src\PHPMailer::ENCRYPTION_STARTTLS;

            $mail->Username = 'leonardo.brunetti242@gmail.com'; // YOUR gmail email
            $mail->Password = 'Natyleo6901'; // YOUR gmail password

            // Sender and recipient settings
            $mail->setFrom('leonardo.brunetti242@gmail.com', 'Apollo Undici');
            $mail->addAddress($socio['email'], $socio['nome'] . ' ' . $socio['cognome']);

            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject = "Socio Apollo Undici " . $socio['nome'] . ' ' . $socio['cognome'];
            $mail->Body = '<p>La tua richiesta è stata accettata. Ritira in sede Apollo Undici (via bixio) la tua tessera per il costo di 6 euro. </br> Clicca su questo link per creare un profilo e prenotare ai nostri eventi. <a href=""> link> </a></p>';
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

            $mail->send();

            $myJSON = json_encode(true);
                
        } catch (\vendor\phpmailer\phpmailer\src\Exception $e) {
            echo $mail->ErrorInfo;
        }
        // FINE ROBA EMAIL    
        */

        $myJSON = json_encode(true);
        echo $myJSON;
    }

    public function ajaxSocioPaga() {
        $data = new \DateTime;
        $current_socio = $this->socioTable->findById($_GET['id_socio']);
        $current_data = $data->format('Y');
        $anno_pagamento = new \DateTime($current_socio['anno_pagamento']);
        $anno = $anno_pagamento->format('Y');
        if ($current_socio['anno_pagamento'] == NULL or $anno != $current_data) {
            $socio = [
                'id_socio' => $_GET['id_socio'],
                'anno_pagamento' => $data->format('Y-m-d'),
            ];
            $this->socioTable->save($socio);
        }
    }

    public function ajaxSocioSave()  {
        $socio = $_POST['socio'];
        $socio['stato_socio'] = 1;
        if (isset($_POST['pagato']) and $_POST['pagato'] == 'true') {
            $data = new \DateTime;
            $socio['anno_pagamento'] = $data->format('Y-m-d');
        }
        $this->socioTable->save($socio);
    }

    public function ajaxSociExcel() {
        $soci = $this->socioTable->findAll();
        $data = new \DateTime;
        $current_data = $data->format('d-m-Y');
        $filename = 'soci_' . $current_data;
        header("Content-Type: application/xls");    
        header("Content-Disposition: attachment; filename=$filename.xls");  
        header("Pragma: no-cache"); 
        header("Expires: 0");

        $sep = "\t";

        $columnHeader = "Id_socio" . "\t" . "nome" . "\t" . "cognome" . "\t" . "data nascita" . "\t" . "luogo nascita" . "\t" . "indirizzo" . "\t" . "cap" . "\t" . "tessera" . "\t" . "\n";

        $excel = '';

        foreach ($soci as $socio) {
            $riga = '';
            foreach ($socio as $value ) {
                $riga .= '"' . $value . '"' . "\t";
            }
            $excel .= $riga . "\n";
        }

        echo $columnHeader . "\n" . $excel . "\n";
    }
}