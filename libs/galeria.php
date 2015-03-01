<?php

    
    $artes = buscar_artes($mysqli);


    $page = (isset($_GET['page']))? $_GET['page'] : 1;


    $sql = "SELECT * FROM artes WHERE acc = '1' ORDER BY id DESC";
    $query = mysqli_query($mysqli, $sql);
    $total_artes = mysqli_num_rows($query);


    $registros = 9;
    $numPaginas = ceil($total_artes/$registros);
    $inicio = ($registros*$page)-$registros;

    $sql2 = "SELECT * FROM artes WHERE acc = '1' ORDER BY id DESC LIMIT $inicio, $registros ";
    $artes_pagina = mysqli_query($mysqli, $sql2);
    $total = mysqli_num_rows($artes_pagina);

    $pagina_atual = (isset($_GET['page']))? $_GET['page'] : 1;

    $max_links = 9;
    $links_laterais = ceil($max_links / 2);

    $inicio = $pagina_atual - $links_laterais;
    $limite = $pagina_atual + $links_laterais;

    include "./templates/template_galeria.php";  