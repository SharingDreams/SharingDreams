<html>
    
    <head>
        <meta charset='UTF-8'>
        <title>Sharing Dreams</title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="assets/js/others/editor.js"></script>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/others/editor.css">
        <script type="text/javascript">
            $(document).ready(function() {
                $(".editable").Editor();
            });
        </script>
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/css/index.css">
        <style>
            body {
                font-family:'Lato', sans-serif;
            }
            .middle {
                background:#f7f7f7;
                height:355px;
                text-align: center;
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
                <a href='/'><img src="assets/img/logo.png" class="logo_img"></a>
                <a href="/gallery" class="gotoglr">Go to Gallery</a>
            </div>
            <ul class="menu_list">
                <li><a href="/gallery" id="menu" class="gotoglr">Go to Gallery</a></li>
                <li id="menu"><a href='/editProfile' id='menu'>Settings</a></li>
                <li><a href="deslogar.php" id="menu">Logout</a>
                <?php if (isset($_SESSION['foto'])) : ?>
                    <li>
                        <a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img class="perfil_img_menu" src='/assets/fotos_perfil/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img class="perfil_img_menu" src="./assets/img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
                    </li>
                <?php endif ?>
                </li>
            </ul>
        </div>
        <form action="" method="post" id="form_upload_art" enctype="multipart/form-data">
            <input type="hidden" name="cadastro_id" value="<?php echo $_SESSION['id']; ?>">

            <div class="middle" id="art_page">
                <div class="hr"></div>
                <?php if ($tem_erros && isset($erros_validacao['nome_arte'])) : ?>
                    <span class='erro'><?php echo $erros_validacao['nome_arte']; ?></span>
                <?php endif; ?>

                <?php if ($tem_erros && isset($erros_validacao['arte'])) : ?>
                    <p class="erro" style='font-weight: bold;'><?php echo $erros_validacao['arte']; ?></p>
                <?php endif; ?>

                <?php if (!$tem_erros && isset($sem_erros['arte'])) : ?>
                    <p class="" style='font-weight: bold;'><?php echo $sem_erros['arte']; ?></p>
                <?php endif; ?>
                <div class="txtg t_submit">Click to select your art.</div>
            </div>

            <center class="center_submit">
                <input type="text" name='nome_arte' placeholder="Type here the title" class="simple_input">

                <input type="file" name='arte' id="file-upload" style="display:none;">

                <input type="hidden" id="descricao-arte" name="descricaoArte" >
                
                <p class="txtup">Tell us about your art:</p>
                <div class="editable"></div>
                <div style="height:50px;"></div>

                <input type="submit" class="upload_button" value="Submit">

                <div style="height:50px;"></div>
            </center>
        </form>
        <script>
            $(document).ready(function() {
                $("#file-upload").change(function() {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            // faz as paradas
                            $('.middle').css('background', 'url(' + e.target.result + ')' + 'no-repeat center center fixed');
                            $('.middle').css('-webkit-background-size', 'cover');
                            $('.middle').css('-moz-background-size', 'cover');
                            $('.middle').css('-o-background-size', 'cover');
                            $('.middle').css('background-size', 'cover');
                            $('.txtg').html("");
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });

                $(".middle").click(function() {
                    $("#file-upload").trigger("click");
                });

                 $("#form_upload_art").on('submit', function (e) {
                    e.preventDefault();
                    $("#descricao-arte").val($(".editable").Editor("getText"));
                    $(this).off('submit');
                    this.submit();
                });
            });
                
        </script>
    </body>

</html>