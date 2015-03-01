
<html>
    
    <head>
        <meta charset='UTF-8'>
        <title>Sharing Dreams</title>
        <link rel="stylesheet" href="/assets/css/index.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60227935-1', 'auto');
          ga('send', 'pageview');

        </script>
    </head>
    
    <body>

        <?php

            session_start();

            ini_set('display_errors',1);
            ini_set('display_startup_erros',1);
            error_reporting(E_ALL);

            if(isset($_SESSION['usuario_logado'])) {
                if(isset($_GET['id'])) {
                    include "templates/template_topoLogado.php";
                } else {
                    include "libs/menu_logado.php";
                }
            } else{
                if(isset($_GET['id'])) {

                    include "libs/config.php";
                    include "libs/banco.php";
                    include "libs/helper.php";

                    echo "<div class='top'>
                        <div class='logo'>
                            <a href='http://sharingdreams.co/gallery'><img src='http://sharingdreams.co/assets/img/logo.png' class='logo_img'></a>
                        </div>
                        <ul class='menu_list'>
                            <li><a href='/' id='menu'>About</a></li>
                            <li><a href='/join' id='menu'>Join</a></li>
                            <li><a href='/login' id='menu'>Login</a></li>
                        </ul>
                    </div>";
                } else {
                    include "templates/menu_visitante.php";
                }
            }
        ?>
         <?php if($erro != ""){echo $erro;}else{ ?>
        <h1 class="thank_you">
            THANK YOU!
        </h1>
        <div class="txtg">
            We aren't talking about money. We're talking about actions, actions which are capable of change the world.
            <br>
            This thought brings hope for needed people and we must stay helping them always. 
            <br>
            Thanks for make part of our project and support our cause.
            <div style="height:50px;"></div>
            <a href="/gallery">
                Back to gallery
            </a>
        </div>
        <?php } ?>
    </body>
</html>