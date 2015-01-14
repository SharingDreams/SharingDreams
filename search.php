<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

if (!isset($_GET['q'])) {
	header("Location: http://sharingdreams.hol.es/");
	exit;
}

$busca = $_GET['q'];

$sql = "SELECT * FROM artes WHERE nome_arte LIKE '%".$busca."%' ORDER BY id DESC";
$query = mysqli_query($mysqli, $sql);


include "../templates/template_search.php";	