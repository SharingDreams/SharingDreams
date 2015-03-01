<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "config.php";
include "banco.php";
include "helper.php";
include "Classes/Cadastros.php";

$cadastros = new Cadastros($mysqli);

$tem_erros = false;
$sem_erro_foto = false;
$erros_validacao = array();

if (tem_post()) {

    $cadastro = array();

    $cadastro['id'] = $_POST['id'];
    $_SESSION['id'] = $cadastro['id'];

    if(isset($_POST['senha_atual'])) {
        if((MD5($_POST['senha_atual'])) == ($_SESSION['senha'])) {
            if (isset($_POST['senha']) && strlen($_POST['senha']) >= 6) {
                if (($_POST['senha']) == ($_SESSION['usuario'])) {
                    $tem_erros = true;
                    $erros_validacao['senha'] = 'Your password can not be equal your username!';
                } else {
                    $cadastro['senha'] = MD5($_POST['senha']);
                    $_SESSION['senha'] = $cadastro['senha'];
                }
            } else {
                $tem_erros = true;
                $erros_validacao['senha'] = 'Password must have 6 characters or more!';
            }


            if (isset($_POST['senha2']) && strlen($_POST['senha2']) > 0) {
                if (($_POST['senha2']) == ($_POST['senha'])) {
                        $cadastro['senha2'] = MD5($_POST['senha2']);
                } else {
                    $tem_erros = true;
                    $erros_validacao['senha2'] = 'Passwords do not match!';
                }
            } else {
                $tem_erros = true;
                $erros_validacao['senha2'] = 'You forgot to retype your password!';
            }

        } else {
            $tem_erros = true;
            $erros_validacao['senha_atual'] = 'Wrong password!';  
        }
        
    } else {
        $tem_erros = true;
        $erros_validacao['senha_atual'] = 'Where is your password?';
    }


    if (! $tem_erros) {
                            
        $cadastros->editar_senha($cadastro);


        $_SESSION["pedit"] = "Your password has been changed!";
        header('Location: http://sharingdreams.co/gallery');

        die();
                
    }  
    
}

$cadastros -> buscar_dados_cadastro($_SESSION['id']);
$cadastro = $cadastros->cadastro;


$cadastro['senha'] = (isset($_POST['senha'])) ? '' : $_SESSION['senha'];
$cadastro['senha2'] = (isset($_POST['senha2'])) ? '' : '';

include "./templates/template_editar_senha.php";

