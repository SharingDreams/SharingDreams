<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "config.php";
include "banco.php";
include "helper.php";
include "classes/Cadastros.php";

$cadastros = new Cadastros($mysqli);

$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {

	$cadastro = array();

    $cadastro['id'] = $_POST['id'];
    $_SESSION['id'] = $cadastro['id'];

    if($_POST['usuario'] == $_SESSION['usuario']) {
        $cadastro['usuario'] = $_POST['usuario'];
        $_SESSION['usuario'] =  $cadastro['usuario'];
    } elseif(isset($_POST['usuario']) && strlen($_POST['usuario']) >= 6) {
        $verificar = verificar_usuario($mysqli, $_POST['usuario']);
        if ($verificar == 1) {
            $tem_erros = true;
            $erros_validacao['verificacao'] = 'Usuário cadastrado!';
        } else {
            $cadastro['usuario'] = $_POST['usuario'];
            $_SESSION['usuario'] =  $cadastro['usuario'];
        }
    } else {
        $tem_erros = true;
        $erros_validacao['usuario'] = 'O nome do usuário deve ter mais de 6 caracteres!';
    }


    if (isset($_POST['data_nascimento']) && strlen($_POST['data_nascimento']) > 0) {
        if (validar_data_nascimento($_POST['data_nascimento'])) {
            $cadastro['data_nascimento'] = traduz_data_nascimento_para_banco($_POST['data_nascimento']);
            $_SESSION['data_nascimento'] = traduz_data_nascimento_para_exibir($cadastro['data_nascimento']);
        } else {
            $tem_erros = true;
            $erros_validacao['data_nascimento'] = 'A data não é válida!';
        } 
    } else {
        $tem_erros = true;
        $erros_validacao['data_nascimento'] = 'Esqueceu aqui!';
    }


    $cadastro['sexo'] = $_POST['sexo'];
    $_SESSION['sexo'] = traduz_sexo($cadastro['sexo']);


    if (isset($_POST['nome']) && strlen($_POST['nome']) >= 2) {
        $cadastro['nome'] = $_POST['nome'];
        $_SESSION['nome'] =  $cadastro['nome'];
    } else {
        $tem_erros = true;
        $erros_validacao['nome'] = 'Nome é obrigatório!';
    }


    if (isset($_POST['email']) && strlen($_POST['email']) > 0) {
        if (validar_email($_POST['email'])) {
            $cadastro['email'] = $_POST['email'];
            $_SESSION['email'] =  $cadastro['email'];
        } else {
            $tem_erros = true;
            $erros_validacao['email'] = 'Email inválido!!'; 
        }
    } else {
        $tem_erros = true;
        $erros_validacao['email'] = 'Email é obrigatório';
    }


    if (isset($_POST['endereco']) && strlen($_POST['endereco']) >= 2) {
        $cadastro['endereco'] = $_POST['endereco'];
        $_SESSION['endereco'] =  $cadastro['endereco'];
    } else {
        $tem_erros = true;
        $erros_validacao['endereco'] = 'Endereço é obrigatório!';
    }


     if (isset($_POST['sobre'])) {
        $cadastro['sobre'] = $_POST['sobre'];
        $_SESSION['sobre'] =  $cadastro['sobre'];
    } else {
        $cadastro['sobre'] = '';
    }


    if (isset($_POST['senha']) && strlen($_POST['senha']) >= 6) {
       if (($_POST['senha']) == ($_POST['usuario'])) {
            $tem_erros = true;
            $erros_validacao['senha'] = 'A senha deve ser diferente do usuário!';
        } else {
            $cadastro['senha'] = MD5($_POST['senha']);
            $_SESSION['senha'] = $cadastro['senha'];
        }
    } else {
        $tem_erros = true;
        $erros_validacao['senha'] = 'A senha deve ter mais de 6 caracteres!';
    }


    if (isset($_POST['senha2']) && strlen($_POST['senha2']) > 0) {
    	if (($_POST['senha2']) == ($_POST['senha'])) {
    		$cadastro['senha2'] = MD5($_POST['senha2']);
    	} else {
    		$tem_erros = true;
    		$erros_validacao['senha2'] = 'As senhas não combinam!';
    	}
    } else {
        $tem_erros = true;
        $erros_validacao['senha2'] = 'Esqueceu aqui!!';
    }


    // upload da foto
    $cadastro_id = $_POST['cadastro_id'];

    if (isset($_FILES['foto'])) {
        if (tratar_foto($_FILES['foto'])) {
            $foto = array();
            $foto['cadastro_id'] = $cadastro_id;
            $foto['nome'] = $_FILES['foto']['name'];
            $foto['arquivo'] = $_FILES['foto']['name'];
        } else {
            $tem_erros = true;
            $erros_validacao['foto'] = 'Envie apenas fotos!';
        }
    } else {
        $tem_erros = false;
    }


    if (! $tem_erros) {
        $cadastros->editar_cadastro($cadastro);

        $verificar_foto = verificar_foto($mysqli, $_SESSION['id']);

        if($verificar_foto == 1) {
            editar_foto($mysqli, $foto);
        } else {
            gravar_foto($mysqli, $foto); 
        }

        $_SESSION['foto'] = buscar_foto($mysqli, $_SESSION['id']); 

        header('Location: /conta');
        die();
    }

}

$cadastros -> buscar_dados_cadastro($_SESSION['id']);
$cadastro = $cadastros->cadastro;


$cadastro['usuario'] = (isset($_POST['usuario'])) ? $_POST['usuario'] : $_SESSION['usuario'];
$cadastro['data_nascimento'] = (isset($_POST['data_nascimento'])) ? $_POST['data_nascimento'] : $_SESSION['data_nascimento'];
$cadastro['sexo'] = (isset($_POST['sexo'])) ? $_POST['sexo'] : $_SESSION['sexo'];
$cadastro['nome'] = (isset($_POST['nome'])) ? $_POST['nome'] : $_SESSION['nome'];
$cadastro['email'] = (isset($_POST['email'])) ? $_POST['email'] : $_SESSION['email'];
$cadastro['endereco'] = (isset($_POST['endereco'])) ? $_POST['endereco'] : $_SESSION['endereco'];
$cadastro['sobre'] = (isset($_POST['sobre'])) ? $_POST['sobre'] : $_SESSION['sobre'];
$cadastro['senha'] = (isset($_POST['senha'])) ? '' : '';
$cadastro['senha2'] = (isset($_POST['senha2'])) ? '' : '';

include "editar_template.php";

