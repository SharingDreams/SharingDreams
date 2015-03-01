<?php

session_start();

include "config.php";
include "banco.php";
include "helper.php";
include "Classes/Cadastros.php";
require_once "captcha/recaptchalib.php";

$cadastros = new Cadastros($mysqli);

$tem_erros = false;
$erros_validacao = array();

// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = "SITEKEY";
$secret = "SECRET";
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = "en";
// The response from reCAPTCHA
$resp = null;
// The error code from reCAPTCHA, if any
$error = null;

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

	if (isset($_POST['usuario']) && strlen($_POST['usuario']) >= 5){
        if (preg_match("/^([a-zA-Z0-9! ]+)$/", $_POST['usuario'])) {
    		$verificar = verificar_usuario($mysqli, $_POST['usuario']);
            if ($verificar == 1) {
            	$tem_erros = true;
            	$erros_validacao['verificacao'] = 'Oops! Username already in use :(';
            } else {
            	$cadastro['usuario'] = $_POST['usuario'];
            }
        }else{
            $tem_erros = true;
            $erros_validacao['usuario'] = 'Please don\'t use special characters.';    
        }
    } else {
        $tem_erros = true;
        $erros_validacao['usuario'] = 'Username must have 5 characters or more.';
    }

    if (isset($_POST['data_nascimento']) && strlen($_POST['data_nascimento']) > 0) {
        if(verificar_idade($_POST['data_nascimento'])) {
            if (validar_data_nascimento($_POST['data_nascimento'])) {
                $cadastro['data_nascimento'] = traduz_data_nascimento_para_banco($_POST['data_nascimento']);
            } else {
                $tem_erros = true;
                $erros_validacao['data_nascimento'] = 'Invalid birthdate.';
            } 
        } else {
            $tem_erros = true;
            $erros_validacao['data_nascimento'] = 'Sorry, Sharing Dreams is made for artists that are 13 years old or above and less than 18 years old.';
        }
    } else {
        $tem_erros = true;
        $erros_validacao['data_nascimento'] = 'Oops! You forgot the birthdate.';
    }

    $cadastro['sexo'] = $_POST['sexo'];

    if (isset($_POST['nome']) && strlen($_POST['nome']) >= 2) {
        $cadastro['nome'] = $_POST['nome'];
    } else {
        $tem_erros = true;
        $erros_validacao['nome'] = 'Oops! You forgot your name!';
    }

    if (isset($_POST['email']) && strlen($_POST['email']) > 0) {
        $verificar = verificar_email($mysqli, $_POST['email']);
        if($verificar >= 1) {
            $tem_erros = true;
            $erros_validacao['email'] = 'Email already in use!';  
        } else {
            if (validar_email($_POST['email'])) {
                $cadastro['email'] = $_POST['email'];
            } else {
                $tem_erros = true;
                $erros_validacao['email'] = 'Invalid email!'; 
            }
        }
    } else {
        $tem_erros = true;
        $erros_validacao['email'] = 'Oops! You forgot your email.';
    }

    if (isset($_POST['endereco']) && strlen($_POST['endereco']) >= 2) {
        $cadastro['endereco'] = $_POST['endereco'];
    } else {
        $tem_erros = true;
        $erros_validacao['endereco'] = 'Oops! You forgot your address.';
    }

     if (isset($_POST['sobre'])) {
        $cadastro['sobre'] = $_POST['sobre'];
    } else {
        $cadastro['sobre'] = '';
    }

    if (isset($_POST['senha']) && strlen($_POST['senha']) >= 6) {
       if (($_POST['senha']) == ($_POST['usuario'])) {
            $tem_erros = true;
            $erros_validacao['senha'] = 'Your password can not be equal your username!';
        } else {
            $cadastro['senha'] = $_POST['senha'];
        }
    } else {
        $tem_erros = true;
        $erros_validacao['senha'] = 'Password must have 6 characters or more!';
    }

    if (isset($_POST['senha2']) && strlen($_POST['senha2']) > 0) {
    	if (($_POST['senha2']) == ($_POST['senha'])) {
    		$cadastro['senha2'] = $_POST['senha2'];
    	} else {
    		$tem_erros = true;
    		$erros_validacao['senha2'] = 'Your password do not match.';
    	}
    } else {
        $tem_erros = true;
        $erros_validacao['senha2'] = 'Oops! You forgot to retype your password.';
    }

    if(!isset($_POST['terms'])) {
       $tem_erros = true;
        $erros_validacao['terms'] = "Don't you agree? Why? :("; 
    }

    if ($resp != null && $resp->success){}
    else{
    	$tem_erros = true;
    	$erros_validacao['captcha'] = "Prove you aren't a robot! :D";
    }

    if (! $tem_erros) {
        $cadastros->gravar_cadastro($cadastro);

        $msg_cadastro = "Welcome to Sharing Dreams! Let's make some arts!";
        $_SESSION["msgCadastro"] = $msg_cadastro; 

        header('Location: http://sharingdreams.co/login');
        die();
    }

}


$cadastro = array(
    'id'                    => 0,
    'usuario'               => (isset($_POST['usuario'])) ? $_POST['usuario'] : '',
    'data_nascimento'       => (isset($_POST['data_nascimento'])) ? traduz_data_nascimento_para_banco($_POST['data_nascimento']) : '',
    'sexo'                  => (isset($_POST['sexo'])) ? $_POST['sexo'] : '1',
    'nome'                  => (isset($_POST['nome'])) ? $_POST['nome'] : '',
    'email'                 => (isset($_POST['email'])) ? $_POST['email'] : '',
    'endereco'              => (isset($_POST['endereco'])) ? $_POST['endereco'] : '',
    'sobre'                 => (isset($_POST['sobre'])) ? $_POST['sobre'] : '',
    'senha'       	        => (isset($_POST['senha'])) ? $_POST['senha'] : '',
    'senha2'       	        => (isset($_POST['senha2'])) ? '' : ''
);

include "./templates/participar.php";