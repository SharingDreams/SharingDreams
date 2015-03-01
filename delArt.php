<?php
    #include "libs/config.php";
    include "libs/banco.php";
    include "libs/helper.php";
    require_once "captcha/recaptchalib.php";

	session_start();

	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }else{
        header("Location: sharingdreams.co/gallery");
    }

    $dono = false;

    $id_arte = $_GET["id"];

    if(verificar_darte($mysqli, $id, $id_arte) == 0){
        header("Location: http://sharingdreams.co/gallery");        
    }else{
        $del = deletar_arte($mysqli, $id_arte);
        if($del == true){
            $_SESSION["pedit"] = "Your art has been removed from the gallery and from your profile! ;-(";
            header("Location: http://sharingdreams.co/gallery");
        }
    }

?>