<?php
    #include "libs/config.php";
    include "libs/banco.php";
    include "libs/helper.php";
    require_once "captcha/recaptchalib.php";

	session_start();

	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }else{
        header("Location: sharingdreams.co/gallery");
    }

    $dono = false;

    $id_arte = $_GET["id"];

    if(verificar_darte($mysqli, $id, $id_arte) == 0){
        header("Location: http://sharingdreams.co/gallery");        
    }

    // Register API keys at https://www.google.com/recaptcha/admin
    $siteKey = "6LceWgITAAAAACuGQQp20Dzf6bgxUkhl1Zw05Lh_";
    $secret = "6LceWgITAAAAAB8qjBn7t4dr3bW1jMTdHnpsbscx";
    // reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
    $lang = "en";
    // The response from reCAPTCHA
    $resp = null;
    // The error code from reCAPTCHA, if any
    $error = null;

    $tem_erros = false;
    $erros_validacao = array();

    if (tem_post()) {
        $reCaptcha = new ReCaptcha($secret);
        // Was there a reCAPTCHA response?
        if ($_POST["g-recaptcha-response"]) {
            $resp = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }

        if ($resp != null && $resp->success) {
            $id = $_GET["id"];
            $desc = $_POST["descricaoArte"];

            $edit = editar_arte($mysqli, $id, $desc);

            if($edit == true){
                $sem_erros['arte'] = 'Your art information has been changed! :D';
            }
        }else{
            $tem_erros = true;
            $erros_validacao['captcha'] = 'Prove you aren\'t a robot! :D';
        }
    }

    if(! verifica_arte($mysqli, $id_arte)){header('Location: http://sharingdreams.co/');}
    $arte = buscar_arte($mysqli, $id_arte);

    $artista = buscar_dados_artista($mysqli, $arte['cadastro_id']);
    $usuario_artista = $artista['usuario'];
    $nome_artista = $artista['nome'];
    $foto_artista = buscar_foto($mysqli, $arte['cadastro_id']);

    include "templates/template_editar_arte.php";  
?>
