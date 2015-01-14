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
$erros_validacao = array();

if (tem_post()) {

    $cadastro = array();

    $cadastro['id'] = $_SESSION['id'];

    $cadastro_id = $_POST['cadastro_id'];

    if (! isset($_FILES['arte'])) {
        $tem_erros = false; 
        $erros_validacao['arte'] = 'You forgot to select a picture';
    } else {
        if (tratar_arte($_FILES['arte'])) {
            if (isset($_POST['nome_arte']) && strlen($_POST['nome_arte']) >= 4) { 
                $arte = array();
                $arte['cadastro_id'] = $cadastro_id;
                $arte['nome'] = $_SESSION['rand'];
                $arte['arquivo'] = $_SESSION['rand'];
                $arte['nome_arte'] = $_POST['nome_arte'];
            } else {
                $tem_erros = true;
                $erros_validacao['nome_arte'] = "Ops! Art's name must have 4 characters or more!";   
            }
        } else {
            $tem_erros = true;
            $erros_validacao['arte'] = 'Send just pictures! And height must be > 200 pixels and width > 300 pixels';
        }
    }


    if (! $tem_erros) {
        gravar_arte($mysqli, $arte); 
        $sem_erros['arte'] = 'Sent!';
        unset($_SESSION['rand']);
    }

}

include "../templates/template_menulogado.php";
