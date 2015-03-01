        <?php
                    $farte_nome_id = str_replace(" ", "-", $arte['nome_arte']);
                    $farte_nome_id = str_replace(".", "-", $farte_nome_id);
                    $farte_nome_id = str_replace("<", "-", $farte_nome_id);
                    $farte_nome_id = str_replace(">", "-", $farte_nome_id);
                    $farte_nome_id = str_replace("&lt;", "-", $farte_nome_id);
                    $farte_nome_id = str_replace("&gt;", "-", $farte_nome_id);
                    $farte_nome_id = str_replace("/", "-", $farte_nome_id);
        ?>
<html>
    
    <head>
        <title>Sharing Dreams</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://sharingdreams.co/assets/css/others/lightbox.css"/>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <link rel="stylesheet" href="http://sharingdreams.co/assets/css/index.css">
        <meta property="og:site_name" content="Sharing Dreams"/>
        <meta property="og:title" content="<?php echo $arte['nome_arte']." by ".$nome_artista." - Sharing Dreams" ?>" />
        <meta property="og:description" content="Sharing Dreams is a website that has 3 main goals: To develop teenagers' creative side, to develop your humanitarian thinking and to help needy people from all over the world. Visit our website: http://sharingdreams.co/" />
        <meta property="og:image" content="http://sharingdreams.co/artes/<?php echo $arte['nome']; ?>" />
        <meta property="og:url" content="http://sharingdreams.co/art/<?php echo $farte_nome_id; ?>/<?php echo $arte['id']; ?>0" />
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
        <!-- FACEBOOK and pinterest !-->
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '410942295730302',
              xfbml      : true,
              version    : 'v2.2'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>
        <!-- OK. !-->
        <style>
            .middle{
                background:url('/artes/<?php echo $arte['nome']; ?>') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                height:480px;
            }
            .full_art_all{
                display: inline-block;
                width: 465px;
                background: #e5e5e5 url('/artes/<?php echo $arte['nome']; ?>') no-repeat center center;
                background-size:auto 300px;
                height:300px;
            }
            @media(max-width: 329px){
                .full_art_all{
                    width: 300px;
                    height:180px;
                }
            }
            @media(min-width: 330px) and (max-width:389px) {
                .full_art_all{
                    width: 300px;
                    height:200px;
                }
            }
            @media(min-width: 390px) and (max-width:500px) {
                .full_art_all{
                    width: 340px;
                    height:240px;
                }
            }
        </style>
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
        <div class="middle" id="art_page">
            <div class="hr"></div>
        </div>
         <div style="height:20px;"></div>
            <div class="info_art">
            <?php if (isset($foto_artista)) : ?>    
                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="/assets/fotos_perfil/<?php echo $foto_artista['nome'] ?>" width="60px" height="60px" class="author-image"></a>
                <?php else : ?>
                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="/assets/img/sem-foto.png" width="60px" height="60px" class="author-image"></a>
            <?php endif; ?>
                <div class="art_name">
                    "<?php echo $arte['nome_arte']; ?>"
                </div>
                <div class="author_name">
                    by <a href='/conta.php?user=<?php echo $usuario_artista; ?>' id="menu"><?php echo $nome_artista; ?></a>
                </div>
                <div class="amount">
                    <div class="amount_dollar">
                        $<?php $arte_id = $_SESSION['arte_id']; $query2 = "SELECT * FROM donate WHERE arte_id='$arte_id' "; $run2 = $mysqli->query($query2); $n = $run2->num_rows; echo $n;?>
                    </div>
                    donated
                </div>
            </div>
            <center>
                <div class="art">
                    <a href="/artes/<?php echo $arte['nome']; ?>" data-lightbox="image-1" data-title="<?php echo $arte['nome_arte']; ?> by <?php echo $nome_artista; ?>">
                        <div class="full_art_all">
                        </div>
                    </a>
                    <div class="about_donate">
                        <div class="why">
                            About donate
                        </div>
                        <p style"text-indent: 10px;" style=" margin-top:5px;" class="about_donate_text">It's not about 1 dollar. It's a deposit of hope for a better world. All the money collected is distribuited weekly for many charity institutions.<br><a href="/">Read more here</a></p>
                        <form method="POST" action="/process.php" style="margin:0;">
                            <input type="hidden" name="itemname" value="<?php echo $arte['nome_arte']; ?> - by <?php echo $nome_artista; ?>" /> 
                            <input type="hidden" name="itemnumber" value="<?php echo $arte['id']; ?>" />
                            <input type="hidden" name="itemdesc" value="Make a donation to <?php echo $arte['nome_arte']; ?>" />
                            <input type="submit" class="donate_button paypal-button" value="Donate with PayPal">
                        </form>
                    </div>
                    <br>
                    <div class="fb-like" data-href="http://sharingdreams.co/art/<?php echo $farte_nome_id; ?>/<?php echo $arte_id; ?>"0 data-layout="button_count" data-action="like" data-show-faces="false" style="display:inline-block;"></div>
                    <div class="fb-share-button" id="facebook_share" data-href="?u=http://sharingdreams.co/art/<?php echo $farte_nome_id; ?>/<?php echo $arte_id; ?>0&display=popup" data-layout="button" style="display:inline-block;"></div>
                    <a href="http://www.pinterest.com/pin/create/button/?url=http://sharingdreams.co/&media=http://sharingdreams.co/artes/<?php echo $arte['nome']; ?>&description=Look this art made by <?php echo $nome_artista; ?>! I loved it!! http://sharingdreams.co/art/<?php echo $farte_nome_id; ?>/<?php echo $arte['id']; ?>0" data-pin-do="buttonPin" style="display:inline-block;">
                        <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
                    </a>
                </div>
                <br>
                <?php if($arte['descricao_arte'] != ""){ ?>
                <div class="txtg bold" style="margin-top:50px !important;">
                    About this art:
                </div>
                <div class="about_art">
                    <?php echo $arte['descricao_arte']; ?>
                </div>
                <?php } ?>
                <div style="height:20px;"></div>
                <?php if($dono == true){ ?><a href="/editArt/<?php echo $arte['id'] ?>/"><input type="button" class="botoes" value="Edit informations above or delete the art"></a>
                <div style="height:50px;"></div><?php } ?>
                <div class="fb-comments" data-href="http://sharingdreams.co/art/<?php echo $farte_nome_id; ?>/<?php echo $arte['id']; ?>0" data-numposts="5" data-colorscheme="light"></div>
                <div style="height:50px;"></div>

                <div class="hr"></div>


                <div class="more_of">
                    <br><br>More of <?php echo $nome_artista; ?><br>
                    <?php foreach ($artes_artista as $arte_artista) : $arte_nome_id = str_replace(" ", "-", $arte_artista['nome_arte']);
                                $arte_nome_id = str_replace(".", "-", $arte_nome_id);
                    $arte_nome_id = str_replace("<", "-", $arte_nome_id);
                    $arte_nome_id = str_replace(">", "-", $arte_nome_id);
                    $arte_nome_id = str_replace("&lt;", "-", $arte_nome_id);
                    $arte_nome_id = str_replace("&gt;", "-", $arte_nome_id);
                    $arte_nome_id = str_replace("/", "-", $arte_nome_id); ?>
                        <a href="/art/<?php echo $arte_nome_id; ?>/<?php echo $arte_artista['id']; ?>0"><img src="/artes/<?php echo $arte_artista['nome']; ?>" class="more_of_art"></a>
                    <?php endforeach; ?>
                </div>

            </center>

        <div style="height:40px;"></div>

        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="http://sharingdreams.co/assets/js/others/lightbox.min.js"></script>
		<script type="text/javascript" src="https://www.paypalobjects.com/js/external/paypal-button.min.js"></script>

    </body>

</html>
