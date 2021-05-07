<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#242323" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/d6104b104e.js" crossorigin="anonymous"></script> 
    <title><?=$title?></title>
</head>

<body>
    <!--NAV-->
    <nav>
        <div class="logo">
            <a href="index.php?route=home">
                <picture>
                    <source srcset="img/Apollo11_logo-330.webp" type="image/webp">
                    <img src="img/Apollo11_logo-330.png" alt="logo">
                </picture>
            </a>
        </div>
        <div class="ul">
            <ul>
                <li>
                    <a class="blue" href="index.php?route=home">Programmazione</a>
                </li>
                <li>
                    <a class="blue" href="index.php?route=tesseramento/info">Tesseramento</a>
                </li>
                <li>
                    <a class="blue" href="">chi siamo</a>
                </li>
                <li>
                    <a class="blue" href="">contatti</a>
                </li>
            </ul>
        </div>
        <div class="burger_btn">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    

    <!-- MAIN -->
    <main>
        <?=$output?>
    </main>

    <script src="js\main.js"></script>
    <!-- FOOTER -->
    <footer>
        <div class="footer">
            <!-- 
            <div class="eco">Apollo Undici</div>
            <span class="eco">Apollo Undici</span>
            -->
            <div class="neon">
                Apollo  Undici
            </div>
            <p>Apollo Undici <br> Via Nino Bixio, 80/A - Roma</p>
            <a class="red" href="https://www.instagram.com/apolloundici/"><i class="fab fa-instagram"></i></a>
            <a class="red" href="https://it-it.facebook.com/apollo.undici.31/"><i class="fab fa-facebook"></i></a>
            <a class="red" href=""><i class="fab fa-twitter"></i></a>
        </div>
        <div class="note-legali">
            <small>©Apollo Undici. All Rights Reserved.</small>
        </div>
    </footer>
</body>
</html>