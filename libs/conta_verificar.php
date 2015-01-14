<?php

session_start();

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

if(isset($_SESSION['usuario_logado'])){
	
    header('Location: conta.php');

}else{

    header('Location: http://sharingdreams.hol.es/');
    die();

}
