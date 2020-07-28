<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <title><?=$title?></title>
</head>
<body>

    <!--NAV -->
    <nav class="nav">

        <!--NAV L-->
        <div class="nav-l">
            <div class="logo">
                <a href="">
                    <img src="img/Apollo11_logo.png" alt="logo">
                </a>
            </div>
            <div class="ul">
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
                        <a href=""><i class="icon fas fa-search"></i>Programmazione</a>
                    </li>
                    <li>
                        <a href=""><i class="icon fas fa-user-circle"></i>Storia</a>
                    </li>
                    <li>
                        <a href=""><i class="icon fas fa-user-circle"></i>Contatti</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN -->
    <main>
        <?=$output?>
    </main>

    <script src=".\js\main.js"></script>

    <!-- FOOTER -->
    <footer>
        
    </footer>
</body>
</html>