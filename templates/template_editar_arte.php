<html>
    
    <head>
        <meta charset='UTF-8'>
        <title>Sharing Dreams</title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="/assets/js/others/editor.js"></script>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/others/editor.css">
        <script type="text/javascript">
            $(document).ready(function() {
                var editor = $(".editable").Editor();
                $(".editable").Editor("setText", "<?php echo $arte['descricao_arte']; ?>");
            });
        </script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60227935-1', 'auto');
          ga('send', 'pageview');

        </script>
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/assets/css/index.css">
        <style>
            body {
                font-family:'Lato', sans-serif;
            }
            .middle{
                background:url('/artes/<?php echo $arte['nome']; ?>') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                height:480px;
            }
            .simple_input {
                font-family:'Lato', sans-serif;
                position: relative;
                margin-top: -165px;
            }
            .txtg {
                font-size:36px;
                margin-top:135px;
            }
            a.gotoglr {
                margin-left:20px;
                color:#484848;
                text-decoration:none;
            }
            a.gotoglr:hover {
                text-decoration: underline;
                color:#484848;
            }
            p.txtup {
                font-size:24px;
                margin-top:25px;
            }
            .Editor-container {
                width:80% !important;
            }
            .top{
                font-family: 'Open Sans', sans-serif !important;
            }
        </style>
    </head>
    
    <body>
        <div class="top tp_marginlg">
            <div class="logo">
                <a href='/gallery'><img src="/assets/img/logo.png" class="logo_img"></a>
            </div>
            <ul class="menu_list">
                <li><a href="/gallery" id="menu">Gallery</a></li>
                <li><a href="/submit" id="menu">Submit</a></li>
                <li id="menu"><a href='/editProfile' id='menu'>Settings</a></li>
                <li><a href="deslogar.php" id="menu">Logout</a>
                <?php if (isset($_SESSION['foto'])) : ?>
                    <li>
                        <a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img id="img-ok" class="perfil_img_menu absolute" src='/assets/fotos_perfil/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img id="img-ok" class="perfil_img_menu absolute" src="/assets/img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
                    </li>
                <?php endif ?>
                </li>
            </ul>
        </div>
        <form action="" method="post" id="form_upload_art" enctype="multipart/form-data">
            <input type="hidden" name="cadastro_id" value="<?php echo $_SESSION['id']; ?>">
            <?php if (!$tem_erros && isset($sem_erros['arte'])) : ?>
                <center><p class="" style='font-weight: bold;'><?php echo $sem_erros['arte']; ?></p></center>
            <?php endif; ?>
            <div class="middle" id="art_page">
                <div class="hr"></div>

            </div>

            <center class="center_submit">
                <input type="text" name='nome_arte' value="<?php echo $arte['nome_arte']; ?>" class="simple_input" id="input_nome_arte" disabled>
                <!-- VERIFICAR SE O NOME NAO MUDOU, SE MUDOU, N DEIXA !-->

                <input type="file" name='arte' id="file-upload" style="display:none;">

                <input type="hidden" id="descricao-arte" name="descricaoArte" >
                
                <p class="txtup" id="tell_us">Tell us about your art:</p>
                <div class="editable"></div>
                <div style="height:20px;"></div>
                <input type="button" class="botoes" value="Delete this art!" id="del">
                <div style="height:50px;"></div>
                <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
                <script type="text/javascript"src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>"></script>
                <?php if ($tem_erros && isset($erros_validacao['captcha'])) : ?>
                    <span class='erro'><?php echo $erros_validacao['captcha']; ?></span>
                <? endif; ?>
                <div style="height:50px;"></div>
                <input type="submit" class="upload_button" value="Submit" id="submit_btn_art">

                <div style="height:50px;"></div>
            </center>
        </form>
        <script>
            $(document).ready(function() {
                 $("#form_upload_art").on('submit', function (e) {
                    e.preventDefault();
                    $("#descricao-arte").val($(".editable").Editor("getText"));
                    $(this).off('submit');
                    this.submit();
                });

                
            });
            $("#del").click(function(){
                    decisao = confirm("Do you really want to remove this art from the gallery and from your profile?");
                    if (decisao){
                        location.href="http://sharingdreams.co/delArt/<?php echo $arte['id']; ?>/";   
                    }
                }); 
                
        </script>
    </body>

</html>