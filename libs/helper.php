<?php

include "Classes/resize.php";

function tem_post()
{
    if (count($_POST) > 0) {
        return true;
    }

    return false;
}

function traduz_data_nascimento_para_banco($data) 
{
	if ($data == "") {
		return "";
	}

	$dados = explode("/", $data);

	if (count($dados) != 3) {
        return $data;
    }

	$data_mysql = "{$dados[2]}-{$dados[0]}-{$dados[1]}";

	return $data_mysql;
}

function traduz_data_nascimento_para_exibir($data) 
{
	if ($data == "" OR $data == "0000-00-00") {
		return "";
	}

	$dados = explode("-", $data);

	if (count($dados) != 3) {
		return $data;
	}

	$data_exibir = "{$dados[1]}/{$dados[2]}/{$dados[0]}";

	return $data_exibir;
}

function validar_data_nascimento($data) 
{
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

    if (! $resultado) {
        return false;
    }

    $dados = explode('/', $data);

    $mes = $dados[0];
    $dia = $dados[1];
    $ano = $dados[2];

    $resultado = checkdate($mes, $dia, $ano);

    return $resultado;
}

function verificar_idade($data) {

	$padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

	if(! $resultado) {
		return false;
	} else {
		$e = explode("/", $data);
		$datan = $e[2].$e[0].$e[1];
		$dataA = date('Ymd');
		$idade = substr(($dataA-$datan), 0, 2);

	    if ($idade >= 18) {
	    	return false;
	    } else if ($idade < 13) {
	    	return false;
	    } else {
	    	return true;
	    }
	}
}

function verificar_idade_c($data) {
		$e = explode("-", $data);
		$datan = $e[0].$e[1].$e[2];
		$dataA = date('Ymd');
		$idade = substr(($dataA-$datan), 0, 2);

	    if ($idade >= 18) {
	    	return false;
	    } else if ($idade < 13) {
	    	return false;
	    } else {
	    	return true;
	    }
}


function traduz_sexo($codigo)
{
	$sexo = '';
	switch ($codigo) {
		case 1:
			$sexo = 'I am a boy!';
			break;
		case 2:
			$sexo = 'I am a girl!';
			break;
	}

	return $sexo;
}

function validar_email($email)
{
	$padrao = '/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/';
	$resultado = preg_match($padrao, $email);

	if (! $resultado) {
		return false;
	}

	return $resultado;
}	

function tratar_foto($foto) 
{
	$padrao = '/^.+(\.jpg$|\.png$|\.jpeg$|\.JPG$|\.PNG$|\.JPEG$)$/';
	$resultado = preg_match($padrao, $foto["name"]);

	if (! $resultado) {
        return false;
    }

    $rand = md5(rand().microtime().rand().microtime());
    $ext = end(explode(".", $foto['name']));
	$_SESSION['rand'] = $rand.'.'.$ext;
	$arquivo = $rand.".".$ext;

    move_uploaded_file($foto['tmp_name'], "./assets/fotos_perfil/".$arquivo);

    return true;
}

function tratar_arte($arte) 
{
	$padrao = '/^.+(\.jpg$|\.png$|\.jpeg$|\.JPG$|\.PNG$|\.JPEG$)$/';
	$resultado = preg_match($padrao, $arte["name"]);

	if (! $resultado) {
        return false;
    }

    $largura = 300;
    $altura = 200;

    $dimensoes = getimagesize($arte["tmp_name"]);

    if($dimensoes[0] < $largura) { 
    	return false;
    }

    if($dimensoes[1] < $altura) {
    	return false;
    }

<<<<<<< Updated upstream
    $porc = (($dimensoes[1]/$dimensoes[0])-1)*100;
=======
    $porc = ($largura+($largura*0.2));
>>>>>>> Stashed changes

    $rand = md5(rand().microtime().rand().microtime());
    $ext = end(explode(".", $arte['name']));
	$_SESSION['rand'] = $rand.'.'.$ext;
	$arquivo = $rand.".".$ext;

    move_uploaded_file($arte['tmp_name'], "./artes/".$arquivo);

    $resizeImg = new resize('./artes/'.$arquivo);
<<<<<<< Updated upstream
    if($porc >= 20 && $porc < 100){$resizeImg -> resizeImage(140, 200, 'exact');}else{
    $resizeImg -> resizeImage(300, 200, 'exact');}
=======
    if($altura >= $porc){
    	$resizeImg -> resizeImage(140, 200, 'exact');
    }
    else{
    	$resizeImg -> resizeImage(300, 200, 'exact');
    }
>>>>>>> Stashed changes
    $resizeImg -> saveImage('./artes/thumbnails/'.$arquivo, 100);


    return true;
}

function protege_id($id)
{
	$id = strtolower($id);
 	$id = htmlspecialchars($id);
	$id = str_replace("'",'',$id);$id = str_replace("a",'',$id);
	$id = str_replace(">",'',$id);$id = str_replace("b",'',$id);
	$id = str_replace(";",'',$id);$id = str_replace("c",'',$id);
	$id = str_replace("/",'',$id);$id = str_replace("d",'',$id);
	$id = str_replace("?",'',$id);$id = str_replace("e",'',$id);
	$id = str_replace("|",'',$id);$id = str_replace("f",'',$id);
	$id = str_replace(":",'',$id);$id = str_replace("g",'',$id);
	$id = str_replace("!",'',$id);$id = str_replace("h",'',$id);
	$id = str_replace("\"",'',$id);$id = str_replace("i",'',$id);
	$id = str_replace("@",'',$id);$id = str_replace("j",'',$id);
	$id = str_replace("#",'',$id);$id = str_replace("k",'',$id);
	$id = str_replace("$",'',$id);$id = str_replace("l",'',$id);
	$id = str_replace("%",'',$id);$id = str_replace("m",'',$id);
	$id = str_replace("¨",'',$id);$id = str_replace("n",'',$id);
	$id = str_replace("&",'',$id);$id = str_replace("o",'',$id);
	$id = str_replace("*",'',$id);$id = str_replace("p",'',$id);
	$id = str_replace("(",'',$id);$id = str_replace("q",'',$id);
	$id = str_replace(")",'',$id);$id = str_replace("r",'',$id);
	$id = str_replace("_",'',$id);$id = str_replace("s",'',$id);
	$id = str_replace("+",'',$id);$id = str_replace("t",'',$id);
	$id = str_replace('"','',$id);$id = str_replace("u",'',$id);
	$id = str_replace("^",'',$id);$id = str_replace("v",'',$id);
	$id = str_replace("~",'',$id);$id = str_replace("w",'',$id);
	$id = str_replace("}",'',$id);$id = str_replace("x",'',$id);
	$id = str_replace("º",'',$id);$id = str_replace("y",'',$id);
	$id = str_replace("´",'',$id);$id = str_replace("z",'',$id);
	$id = str_replace("`",'',$id);
	$id = str_replace('¹','',$id);
	$id = str_replace("²",'',$id);
	$id = str_replace("³",'',$id);
	$id = str_replace('£','',$id);
	$id = str_replace("¢",'',$id);
	$id = str_replace("¬",'',$id);
	$id = str_replace("§",'',$id);
	$id = str_replace("]",'',$id);
	$id = str_replace("{",'',$id);
	$id = str_replace("[",'',$id);
	$id = str_replace(",",'',$id);
	$id = str_replace("<",'',$id);
	
	return $id;
}

function protege_busca($id)
{
	$id = strtolower($id);
 	$id = htmlspecialchars($id);
	$id = str_replace("'",'',$id);
	$id = str_replace(">",'',$id);
	$id = str_replace("<",'',$id);
	$id = str_replace(";",'',$id);
	$id = str_replace("/",'',$id);
	$id = str_replace("?",'',$id);
	$id = str_replace("|",'',$id);
	$id = str_replace(":",'',$id);
	$id = str_replace("!",'',$id);
	$id = str_replace("\"",'',$id);
	$id = str_replace("#",'',$id);
	$id = str_replace("$",'',$id);
	$id = str_replace("%",'',$id);
	$id = str_replace("¨",'',$id);
	$id = str_replace("&",'',$id);
	$id = str_replace("*",'',$id);
	$id = str_replace("(",'',$id);
	$id = str_replace(")",'',$id);
	$id = str_replace("_",'',$id);
	$id = str_replace("+",'',$id);
	$id = str_replace('"','',$id);
	$id = str_replace("^",'',$id);
	$id = str_replace("~",'',$id);
	$id = str_replace("}",'',$id);
	$id = str_replace("º",'',$id);
	$id = str_replace("´",'',$id);
	$id = str_replace("`",'',$id);
	$id = str_replace('¹','',$id);
	$id = str_replace("²",'',$id);
	$id = str_replace("³",'',$id);
	$id = str_replace('£','',$id);
	$id = str_replace("¢",'',$id);
	$id = str_replace("¬",'',$id);
	$id = str_replace("§",'',$id);
	$id = str_replace("]",'',$id);
	$id = str_replace("{",'',$id);
	$id = str_replace("[",'',$id);
	$id = str_replace(",",'',$id);
	
	return $id;
}
