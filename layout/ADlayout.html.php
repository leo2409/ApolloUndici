<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <script src="https://kit.fontawesome.com/d6104b104e.js" crossorigin="anonymous"></script>
    <title><?=$title?></title>
</head>
<body>
<script src="js/admin.js"></script>
    <nav>
        <div class="nav-icon">
            <a href="ADAG.php?route=home">
                <div>
                    <i class="far fa-calendar-alt"></i>
                </div>
            </a>
        </div>
        <div class="nav-icon">
            <a href="ADAG.php?route=prenotazioni">
                <div>
                    <i class="fas fa-ticket-alt"></i>
                </div>
            </a>
        </div>
    </nav>
    <main>
        <?=$output?>    
    </main>
</body>
</html>