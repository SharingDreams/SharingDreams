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
$erro_login = false;

if(tem_post()){
	$cadastro = array();

	if (isset($_POST['usuario']) && strlen($_POST['usuario']) > 0) {
		$cadastro['usuario'] = $_POST['usuario'];
	} else {
		$tem_erros = true;
		$erros_validacao['login_usuario'] = 'You forgot to type your username';
	}

	if (isset($_POST['senha']) && strlen($_POST['senha']) > 0) {
		$cadastro['senha'] = MD5($_POST['senha']);
	} else {
		$tem_erros = true;
		$erros_validacao['login_senha'] = 'You forgot to type your password!';
	}

	if (! $tem_erros) {
		$verificar = verificar_login($mysqli, $mysqli->escape_string(htmlspecialchars($cadastro['usuario'])), $mysqli->escape_string(htmlspecialchars($cadastro['senha'])));
		if ($verificar == 1) {
			
			$cadastros->buscar_cadastro($cadastro['usuario'], $cadastro['senha']);
			$login = $cadastros->cadastro;

			$_SESSION['usuario_logado']  = true;
			$_SESSION['id']              = $login['id'];
			$_SESSION['foto']            = buscar_foto($mysqli, $_SESSION['id']);
			$_SESSION['usuario']         = $login['usuario'];
			$_SESSION['data_nascimento'] = traduz_data_nascimento_para_exibir($login['data_nascimento']);
			$_SESSION['sexo']            = traduz_sexo($login['sexo']);
			$_SESSION['nome']            = $login['nome'];
			$_SESSION['email']           = $login['email'];
			$_SESSION['endereco']        = $login['endereco'];
			$_SESSION['sobre']           = $login['sobre'];
			$_SESSION['senha']           = $login['senha'];

			header('Location: http://sharingdreams.hol.es/submit.php');
		} else {
			$erro_login                  = true;
			$erros_validacao['invalido'] = 'Invalid username or password';
		}
	}
}


$cadastro = array(
		'usuario'       => (isset($_POST['usuario'])) ? $_POST['usuario'] : '',
		'senha'       	=> (isset($_POST['senha'])) ? '' : ''
);


include "./templates/formulario_login.php";