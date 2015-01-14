
<html>
    
    <head>
        <meta charset='UTF-8'>
        <title>Sharing Dreams</title>
        <link rel="stylesheet" href="assets/css/index.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    </head>
    
    <body>

        <?php

            session_start();

            ini_set('display_errors',1);
            ini_set('display_startup_erros',1);
            error_reporting(E_ALL);

            if(isset($_SESSION['usuario_logado'])) {
                if(isset($_GET['id'])) {
                    include "template_topoLogado.php";
                } else {
                    include "./libs/menu_logado.php";
                }
            } else{
                if(isset($_GET['id'])) {

                    include "./libs/config.php";
                    include "./libs/banco.php";
                    include "./libs/helper.php";

                    echo "<div class='top'>
                        <div class='logo'>
                            <a href='http://sharingdreams.hol.es/'><img src='assets/img/logo.png' class='logo_img'></a>
                        </div>
                        <ul class='menu_list'>
                            <li><a href='./about.php' id='menu'>About</a></li>
                            <li><a href='./join' id='menu'>Join</a></li>
                            <li><a href='./login' id='menu'>Login</a></li>
                        </ul>
                    </div>";
                } else {
                    include "menu_visitante.php";
                }
            }

            $art_id = $_GET['id'];

            $query = "INSERT INTO donate(arte_id) VALUES ('$art_id')";
            $run = $mysqli->query($query);
        ?>
        
        <div class='hr'></div>
        <h1 class="thank_you">
            THANK YOU!
        </h1>
        <div class="txtg">
            You're the one of people who wants to change.
            <br>
            An e-mail will be send about the payment.
            <div style="height:50px;"></div>
            <a href="/gallery">
                Back to gallery
            </a>
        </div>
    </body>
</html>