<?php

session_start();

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

	if (isset($_POST['usuario']) && strlen($_POST['usuario']) >= 5) {
		$verificar = verificar_usuario($mysqli, $_POST['usuario']);
        if ($verificar == 1) {
        	$tem_erros = true;
        	$erros_validacao['verificacao'] = 'Username already in use!';
        } else {
        	$cadastro['usuario'] = $_POST['usuario'];
        }
    } else {
        $tem_erros = true;
        $erros_validacao['usuario'] = 'Username must have 5 characters or more!';
    }

    if (isset($_POST['data_nascimento']) && strlen($_POST['data_nascimento']) > 0) {
        if(verificar_idade($_POST['data_nascimento'])) {
            if (validar_data_nascimento($_POST['data_nascimento'])) {
                $cadastro['data_nascimento'] = traduz_data_nascimento_para_banco($_POST['data_nascimento']);
            } else {
                $tem_erros = true;
                $erros_validacao['data_nascimento'] = 'Invalid date!';
            } 
        } else {
            $tem_erros = true;
            $erros_validacao['data_nascimento'] = 'You are over 18 y.o!';
        }
    } else {
        $tem_erros = true;
        $erros_validacao['data_nascimento'] = 'You forgot the date.';
    }

    $cadastro['sexo'] = $_POST['sexo'];

    if (isset($_POST['nome']) && strlen($_POST['nome']) >= 2) {
        $cadastro['nome'] = $_POST['nome'];
    } else {
        $tem_erros = true;
        $erros_validacao['nome'] = 'Ops! You forgot your name!';
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
        $erros_validacao['email'] = 'Ops! You forgot your email!';
    }

    if (isset($_POST['endereco']) && strlen($_POST['endereco']) >= 2) {
        $cadastro['endereco'] = $_POST['endereco'];
    } else {
        $tem_erros = true;
        $erros_validacao['endereco'] = 'You forgot your address!';
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
        $erros_validacao['senha2'] = 'You forgot here!';
    }

    if (! $tem_erros) {
        $cadastros->gravar_cadastro($cadastro);

        header('Location: http://sharingdreams.hol.es/login');
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

