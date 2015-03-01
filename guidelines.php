<html>
    
    <head>
        <title>Sharing Dreams</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://sharingdreams.co/assets/css/others/lightbox.css"/>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <link rel="stylesheet" href="http://sharingdreams.co/assets/css/index.css">
        <link rel="stylesheet" href="http://sharingdreams.co/assets/css/terms.css">
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60227935-1', 'auto');
          ga('send', 'pageview');

        </script>
    </head>
    <?php
            if(isset($_SESSION['usuario_logado'])) {
                if(isset($_GET['art'])) {
                    include "templates/template_topoLogado.php";
                } else {
                    include "libs/menu_logado.php";
                }
            } else{
                if(isset($_GET['art'])) {

                    #include "libs/config.php";
                    #include "libs/banco.php";
                    #include "libs/helper.php";
                    include "libs/Classes/Cadastros.php";

                    echo "<div class='top'>
                        <div class='logo'>
                            <a href='/gallery'><img src='http://sharingdreams.co/assets/img/logo.png' class='logo_img'></a>
                        </div>
                        <ul class='menu_list'>
                            <li><a href='/about.php' id='menu'>About</a></li>
                            <li><a href='/join' id='menu'>Join</a></li>
                            <li><a href='/login' id='menu'>Login</a></li>
                        </ul>
                    </div>";
                } else {
                    include "templates/menu_visitante.php";
                }
            }
        ?>
    <body>
        <div id="terms">

            <h2><b>Community Guidelines</b></h2>

            <p>Sharing Dreams is a creative and inspiring environment. But we need to follow some rules to make it happen.</p>

            <b>Remember:</b>

            <li>
                1. Do not post pornography. Artistic nudity is allowed.
            </li>

            <li>
                2. Do not post hate speech.
            </li>

            <li>
                3. Respect the copyrights of others.
            </li>

            <li>
                4. Do not post shocking or disgusting content.
            </li>

            <li>
                5. Respect the privacy of others
            </li>

            <li>
                6. Respect Sharing Dreams' users.
            </li>

            <br>

            <p>Sharing Dreams can delete, without notice, any content that, in their view, goes against Community Guidelines. Sharing Dreams can also sue the violator.</p>

        </div>
    </body>
</html>
