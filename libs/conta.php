<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "config.php";
include "banco.php";
include "helper.php";

if (isset($_GET['user'])){
    $user = protege_busca($_GET['user']);
    $id = converte_user_id($mysqli, $user);
    if(empty($id)){
        header('Location: http://sharingdreams.hol.es/');
    }else{
        header('Location: /'.$id.'/1');
    }
}

elseif (isset($_GET['id'])) {

    $user = protege_id($_GET['id']);
    $id = converte_user_id($mysqli, $user);
    if(! verifica_user($mysqli, $user)){header('Location: http://sharingdreams.hol.es/');}
    $perfil = buscar_dados_perfil_conta($mysqli, $user);
    $id_perfil = $perfil['id'];
    $usuario_perfil = $perfil['usuario'];
    $nome_perfil = $perfil['nome'];
    $endereco_perfil = $perfil['endereco'];
    $sobre_perfil = $perfil['sobre'];
    $foto_perfil = buscar_foto_perfil($mysqli, $id_perfil);

    $artes_artista = buscar_artes_artista($mysqli, $id_perfil);


    $page = (isset($_GET['page']))? $_GET['page'] : 1;


    $sql = "SELECT * FROM artes WHERE cadastro_id = {$id_perfil} AND acc = '1' ORDER BY id DESC";
    $query = mysqli_query($mysqli, $sql);
    $total_artes = mysqli_num_rows($query);


    $registros = 9;
    $numPaginas = ceil($total_artes/$registros);
    $inicio = ($registros*$page)-$registros;

    $sql2 = "SELECT * FROM artes WHERE cadastro_id = '$id_perfil' AND acc = '1' ORDER BY id DESC LIMIT $inicio, $registros ";
    $artes_pagina = mysqli_query($mysqli, $sql2);
    $total = mysqli_num_rows($artes_pagina);

    $pagina_atual = (isset($_GET['page']))? $_GET['page'] : 1;

    $max_links = 9;
    $links_laterais = ceil($max_links / 2);

    $inicio = $pagina_atual - $links_laterais;
    $limite = $pagina_atual + $links_laterais;
   

    include "./templates/template_conta.php";       
} else {
    header('Location: http://sharingdreams.hol.es/');
}