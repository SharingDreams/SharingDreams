<?php
ob_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

session_start();

require_once "captcha/recaptchalib.php";

if(isset($_SESSION['usuario_logado'])){

	include "config.php";
	include "banco.php";
	include "helper.php";
	include "Classes/Cadastros.php";

    if(verificar_idade_c($_SESSION['data_nascimento']) == false){
        header("Location: http://sharingdreams.co/deslogar.php");
    }

    // Register API keys at https://www.google.com/recaptcha/admin
    $siteKey = "SITEKEY";
    $secret = "SECRET";
    // reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
    $lang = "en";
    // The response from reCAPTCHA
    $resp = null;
    // The error code from reCAPTCHA, if any
    $error = null;

	$cadastros = new Cadastros($mysqli);

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

	    $cadastro = array();

	    $cadastro['id'] = $_SESSION['id'];

	    $cadastro_id = $_POST['cadastro_id'];


    if ($resp != null && $resp->success) {
	    if (! isset($_FILES['arte'])) {
	        $tem_erros = false; 
	        $erros_validacao['arte'] = 'You forgot to select your art file';
	    } else {
	        if (tratar_arte($_FILES['arte'])) {
	            if (isset($_POST['nome_arte']) && strlen($_POST['nome_arte']) >= 4) {
                    if (preg_match("/^([a-zA-Z0-9! ]+)$/", $_POST['nome_arte'])) {
                        $arte = array();
                        $arte['cadastro_id'] = $cadastro_id;
                        $arte['nome'] = $_SESSION['rand'];
                        $arte['arquivo'] = $_SESSION['rand'];
                        $arte['nome_arte'] = $mysqli->escape_string(htmlspecialchars($_POST['nome_arte']));
                        $arte['descricao_arte'] = $_POST['descricaoArte'];
                    }
                    else {
                        $tem_erros = true;
                        $erros_validacao['nome_arte'] = "Don't use special characters!";  
                    }
	            } else {
	                $tem_erros = true;
	                $erros_validacao['nome_arte'] = "Oops! Art's name must have 4 characters or more!";   
	            }
	        } else {
	            $tem_erros = true;
	            $erros_validacao['arte'] = 'Send just pictures! Also... Your art must be bigger than 300x200 pixels';
	        }
	    }


	    if (! $tem_erros) {
	        gravar_arte($mysqli, $arte); 
	        $sem_erros['arte'] = 'Woohoo \o/! Your art has been sent! We will review it and in the next hours it may be ready to receive donations';
	        unset($_SESSION['rand']);
	    }
    }else{
        $tem_erros = true;
        $erros_validacao['arte'] = 'Oops, there\'s something wrong with the captcha. Try again';
    }

	}
	
    include "./templates/submit.php";

} else {

    header('Location: http://sharingdreams.co/');
    die();

}
