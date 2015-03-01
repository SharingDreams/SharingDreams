<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
session_start();

$page = (isset($_GET['page']))? $_GET['page'] : 1;

$artes = buscar_artes($mysqli);


$cmd = "SELECT * FROM artes WHERE acc = '1'";
$artes_total = mysqli_query($mysqli, $cmd);
$total_artes = mysqli_num_rows($artes_total);

$registros = 21;
$numPaginas = ceil($total_artes/$registros);
$inicio = ($registros*$page)-$registros;

$cmd2 = "SELECT * FROM artes WHERE acc = '1' ORDER BY id DESC LIMIT $inicio, $registros ";
$artes_pagina = mysqli_query($mysqli, $cmd2);
$total = mysqli_num_rows($artes_pagina);

$pagina_atual = (isset($_GET['page']))? $_GET['page'] : 1;


$max_links = 6;
$links_laterais = ceil($max_links / 2);

$inicio = $pagina_atual - $links_laterais;
$limite = $pagina_atual + $links_laterais;



include "./templates/template_galeria.php";	