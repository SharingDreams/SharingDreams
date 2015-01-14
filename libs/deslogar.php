<?php

ob_start();

session_start(); 

//Acaba, mata e aniquila com a sessão
unset($_SESSION['usuario_logado']); 

session_destroy(); 

//vai pra tela de login :)
header("Location: http://sharingdreams.hol.es/"); 
?>