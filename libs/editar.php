<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "config.php";
include "banco.php";
include "helper.php";
include "Classes/Cadastros.php";

if(verificar_idade_c($_SESSION['data_nascimento']) == false){
        header("Location: http://sharingdreams.co/deslogar.php");
}

$cadastros = new Cadastros($mysqli);

$tem_erros = false;
$sem_erro_foto = false;
$erros_validacao = array();

if (tem_post()) {

    $cadastro = array();

    $cadastro['id'] = $_POST['id'];
    $_SESSION['id'] = $cadastro['id'];


    if (isset($_POST['email']) && strlen($_POST['email']) > 0) {
        $verificar = verificar_email($mysqli, $_POST['email']);

        if($verificar >= 1 AND $_POST['email_u'] != $_POST['email']) {
            $tem_erros = true;
            $erros_validacao['email'] = 'Email already in use!';  
        } else {
            if (validar_email($_POST['email'])) {
                $cadastro['email'] = $_POST['email'];
                $_SESSION['email'] =  $cadastro['email'];
            } else {
                $tem_erros = true;
                $erros_validacao['email'] = 'Invalid email!'; 
            }
        }
    } else {
        $tem_erros = true;
        $erros_validacao['email'] = 'You forgot your email!';
    }


    if (isset($_POST['endereco']) && strlen($_POST['endereco']) >= 2) {
        $cadastro['endereco'] = $mysqli->real_escape_string(htmlspecialchars($_POST['endereco']));
        $_SESSION['endereco'] =  $cadastro['endereco'];
    } else {
        $tem_erros = true;
        $erros_validacao['endereco'] = 'You forgot your address!';
    }


     if (isset($_POST['sobre'])) {
        $cadastro['sobre'] = $mysqli->real_escape_string(htmlspecialchars($_POST['sobre']));
        $_SESSION['sobre'] =  $cadastro['sobre'];
    } else {
        $cadastro['sobre'] = '';
    }
    

    // upload da foto
    $cadastro_id = $_POST['cadastro_id'];

    if (empty($_FILES['foto']['tmp_name'])) {
        $sem_erro_foto = true; 
    } else {
        if (tratar_foto($_FILES['foto'])) {
            $foto = array();
            $foto['cadastro_id'] = $cadastro_id;
            $foto['nome'] = $_SESSION['rand'];
            $foto['arquivo'] = $_SESSION['rand'];
            unset($_SESSION['rand']);
        } else {
            $tem_erros = true;
            $erros_validacao['foto'] = 'Send just pictures!';
        }
    }


    if (! $tem_erros) {
        $cadastros->editar_cadastro($cadastro);

        $_SESSION["pedit"] = "Your profile has been changed successfully!";

        if($sem_erro_foto == false) {
            $verificar_foto = verificar_foto($mysqli, $_SESSION['id']);

            if($verificar_foto == 1) {
                editar_foto($mysqli, $foto);
            } else {
                gravar_foto($mysqli, $foto); 
            }

            $_SESSION['foto'] = buscar_foto($mysqli, $_SESSION['id']); 

            header('Location: http://sharingdreams.co/gallery');
        } else {
            header('Location: http://sharingdreams.co/gallery');
        }

        die();
    }

}

$cadastros -> buscar_dados_cadastro($_SESSION['id']);
$cadastro = $cadastros->cadastro;


$cadastro['email'] = (isset($_POST['email'])) ? $_POST['email'] : $_SESSION['email'];
$cadastro['endereco'] = (isset($_POST['endereco'])) ? $_POST['endereco'] : $_SESSION['endereco'];
$cadastro['sobre'] = (isset($_POST['sobre'])) ? $_POST['sobre'] : $_SESSION['sobre'];

include "./templates/editar_template.php";

