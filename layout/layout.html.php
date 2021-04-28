<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <script src="https://kit.fontawesome.com/d6104b104e.js" crossorigin="anonymous"></script>
    <title><?=$title?></title>
</head>
<body>

    

    <!--ROBA FACEBOOK-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v10.0" nonce="k8ZuExFP"></script>
    <!--FINE ROBA FACEBOOK-->

    <!--NAV -->
    <nav class="nav">

        <!--NAV L-->
        <div class="nav-l">
            <div class="logo">
                <a href="index.php">
                    <img src="img/Apollo11_logo.png" alt="logo">
                </a>
            </div>
            <div class="ul">
                <ul>
                    <li>
                        <a href="index.php">Programmazione</a>
                    </li>
                    <li>
                        <a href="index.php?route=tesseramento/info">Tesseramento</a>
                    </li>
                    <li>
                        <a href="">chi siamo</a>
                    </li>
                    <li>
                        <a href="">contatti</a>
                    </li>
                </ul>
            </div>
        </div>

        <!--NAV S-->
        <div class="nav-s">
            <div class="logo">
                <a href="">
                    <img src="img/Apollo11_logo.png" alt="logo">
                </a>
            </div>
            <div class="burger_Btn">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <div class="hide-ul">
                <div class="list">
                  <ul>
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>
                        <a href="">Programmazione</a>
                    </li>
                    <li>
                        <a href="">Storia</a>
                    </li>
                    <li>
                        <a href="">Contatti</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN -->
    <main>
        <?=$output?>
    </main>

    <script src="js\main.js"></script>
    <!-- FOOTER -->
    <footer>
        
    </footer>
</body>
</html>