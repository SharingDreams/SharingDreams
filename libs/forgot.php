<?php

session_start();

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "config.php";
include "banco.php";
include "helper.php";

if(isset($_SESSION['usuario_logado'])){
	
    header('Location: http://sharingdreams.co/gallery');

}elseif(isset($_GET['id']) && isset($_GET['email'])){

	$tem_erros = false;
	$erros_validacao = array();
	$mensagem_certo = array();

	 $verificar = verificar_email($mysqli, $_GET['email']);
	 $verficar_cod = verificar_codigo($mysqli, $_GET['id']);

	 if($verificar == 0 or $verficar_cod == 0){
	 	header("Location: http://sharingdreams.co/");
	 }


	if (tem_post()) {

	    if (isset($_POST['pass1'])  && isset($_POST['pass2'])  && strlen($_POST['pass1']) > 0) {
	        if($_POST['pass1'] == $_POST['pass2']) {

	        	$email = $_GET['email'];
	        	$cod = $_GET['id'];
	        	$senha = $_POST['pass1'];

	        	trocar_senha($mysqli, $email, $cod, $senha);

	        } else {
	            $tem_erros = true;
	            $erros_validacao['email'] = 'Passwords don\'t match!';
	        }
	    } else {
	        $tem_erros = true;
	        $erros_validacao['email'] = 'Oops! You forgot the email!';
	    }

	    if (! $tem_erros) {
	    	$_SESSION['m_email'] = 'Your password has been changed!';
	    	header("Location: /login");
	        die();
	    }

	}

    include "./templates/template_forgot2.php";
}else{

	$tem_erros = false;
	$erros_validacao = array();
	$mensagem_certo = array();
	if (tem_post()) {

	    if (isset($_POST['email']) && strlen($_POST['email']) > 0) {
	        $verificar = verificar_email($mysqli, $_POST['email']);
	        if($verificar >= 1) {
	        	if (validar_email($_POST['email'])) {
	        		$email = $mysqli->real_escape_string(htmlspecialchars($_POST['email']));

	            	$dados = recuperar_dados($mysqli, $email);
	            	
	            	$nome = $dados['nome'];

	            	$codigo = rand().rand().rand();

	            	inserir_cod($mysqli, $codigo, $email);
	      
	            	$subject = 'Password recovery - Sharing Dreams';
					$message = "<div style='backgorund:#fff; width:640px;'>
									<div style='width:610px; height:75px; background-color:#e3e3e3; padding-top:30px; padding-left:30px;'>
										<img src='http://sharingdreams.co/assets/img/logo.png'>
									</div>
									<center>
										<h1>
											Password recovery - Sharing Dreams
										</h1>
									</center>
									<br>
									<br>
									<p style='color:#484747; margin-left:35px;'>
										Hello $nome! To recover your password, click in link below:
						         		<br><br>
						         		<a href='http://sharingdreams.co/forgot.php?id=$codigo&email=$email'>
						         			Click here to change your password!
						         		</a>
							         	<br><br>
							         	Let's make some arts!<br><br>
							         	Have a nice day,
							         	<a href='www.sharingdreams.co'>Sharing Dreams</a>
							        </p>
						       	</div>";
					$headers = 'From: Sharing-Dreams dontreply@sharingdreams.com' . "\r\n" .
								'Content-type: text/html; charset=utf-8' . "\r\n";

					mail($email,$subject,$message,$headers);
	            } else {
	                $tem_erros = true;
	                $erros_validacao['email'] = 'Invalid email!'; 
	            }  
	        } else {
	            $tem_erros = true;
	            $erros_validacao['email'] = 'This email is not registered in Sharing Dreams!';
	        }
	    } else {
	        $tem_erros = true;
	        $erros_validacao['email'] = 'Oops! You forgot the email!';
	    }

	    if (! $tem_erros) {
	    	$mensagem_certo['email'] = 'Check your email!';
	    	include "./templates/template_forgot.php";
	        die();
	    }

	}

    include "./templates/template_forgot.php";

}
