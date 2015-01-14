<html>
    
    <head>
        <meta charset='UTF-8'>
        <title>Sharing Dreams</title>
        <link rel="stylesheet" href="assets/css/index.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="assets/css/others/editor.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    </head>
    
    <body>
        <!-- FACEBOOK and pinterest !-->
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
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
        </style>

        <div class="middle" id="art_page">
            <div class="hr"></div>
        </div>
         <div style="height:20px;"></div>
            <div class="info_art">
            <?php if (isset($foto_artista)) : ?>    
                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="assets/fotos_perfil/<?php echo $foto_artista['nome'] ?>" width="60px" height="60px" class="author-image"></a>
                <?php else : ?>
                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="assets/img/sem-foto.png" width="60px" height="60px" class="author-image"></a>
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
                    <img src="artes/<?php echo $arte['nome']; ?>" class="full_art">
                    <div class="about_donate">
                        <div class="why">
                            About donate
                        </div>
                        <?php

                            $cod = (rand(1, 999).rand(1, 999).rand(1, 999))*microtime();
                            $cod = explode('.', $cod);
                            $cod = $cod[0];

                            $conn_cod = new mysqli("mysql.hostinger.com.br", "u175477054_root", "Riletho", "u175477054_shari");
                            $query = "INSERT INTO donate(sid) VALUES ('$cod')";
                            $run = $conn_cod->query($query);

                        ?>
                        <p style"text-indent: 10px;" style=" margin-top:5px;" class="about_donate_text">It's not about 1 dollar. Its a deposit of hope for a better world. All the money collected is distribuited weekly for many charity institutions.<br><a href="about.php">Read more here</a></p>
                        <script async="async" src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=guivr2011@gmail.com"
        					data-button="donate" 
        					data-amount="1.00" 
        					data-item_name="<?php echo $arte['nome_arte']; ?> - by <?php echo $nome_artista; ?>"
        					data-item_number="<?php echo $arte['id']; ?>"
        					data-callback="http://sharingdreams.hol.es/success.php?id=<?php echo $arte['id']; ?>&sid=<?php echo $cod; ?>"
        				></script>
                    </div>
                    <br>
                    <div class="fb-like" data-href="http://sharingdreams.hol.es/artes/<?php echo $arte['nome']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" style="display:inline-block;"></div>
                    <a href="http://www.pinterest.com/pin/create/button/?url=http://sharingdreams.hol.es/&media=http://sharingdreams.hol.es/artes/<?php echo $arte['nome']; ?>&description=Look this art made by <?php echo $nome_artista; ?>! I loved it!!" data-pin-do="buttonPin" style="display:inline-block;">
                        <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
                    </a>
                </div>
                <br>
                <div class="txtg bold" style="margin-top:50px !important;">
                    About this art:
                </div>
                <div class="about_art">
                    <?php echo $arte['descricao_arte']; ?>
                </div>
                <div style="height:50px;"></div>

                <div class="hr"></div>


                <div class="more_of">
                    <br><br>More of <?php echo $nome_artista; ?><br>
                    <?php foreach ($artes_artista as $arte_artista) : ?>
                        <img src="artes/<?php echo $arte_artista['nome']; ?>" class="more_of_art">
                    <?php endforeach; ?>
                </div>

            </center>

        <div style="height:40px;"></div>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://www.paypalobjects.com/js/external/paypal-button.min.js"></script>

    </body>

</html>
