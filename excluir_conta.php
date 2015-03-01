<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "config.php";
include "banco.php";
include "helper.php";

session_start();

$tem_erros = false;
$sem_erro_foto = false;
$erros_validacao = array();

if ($_SESSION['usuario_logado']) {

	$id = $_POST['id'];

	if(tem_post()) {

		if(isset($_POST['pass'])) {
			$verificar = verificar_senha_excluir($mysqli, $_POST['pass']);

			if ($verificar) {
				$tem_erros = false;
			} else {
				$tem_erros = true;
	        	$erros_validacao['pass'] = 'Wrong password';	
			}

		} else {
			$tem_erros = true;
        	$erros_validacao['pass'] = 'You forgot here!';
		}

		if (! $tem_erros) {

			delelar_conta($mysqli, $id);
			deletar_artes_conta($mysqli, $id);

			ob_start();

			unset($_SESSION['usuario_logado']); 

			session_destroy(); 

			header("Location: http://sharingdreams.co/"); 

		}

	}	

} else {
	header('Location: http://sharingdreams.co');
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sharing Dreams - Detele Account</title>
		<link rel="stylesheet" href="assets/css/index.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
	</head>
	<body>
		<div class="top tp_marginlg">
            <div class="logo">
                <a href='http://sharingdreams.co/'><img src="assets/img/logo.png" class="logo_img"></a>
            </div>
            <ul class="menu_list">
                <li><a href="/submit" id="menu">Submit</a></li>
		        <li><a href="/gallery" id="menu">Gallery</a></li>
                <li><a href="deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img id="img-ok" class="fix_img_profile absolute perfil_img_menu" src='assets/fotos_perfil/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img id="img-ok" class="fix_img_profile absolute perfil_img_menu" src="assets/img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
		<div class="hr"></div>
        <div class='form' style="text-align:center;">
	        <center>
	        	<div style="height:30px;"></div>
				<form method="POST">
					<label>
						Type your password
						<input type="text" name="pass">
						<?php if ($tem_erros && isset($erros_validacao['pass'])) : ?>
							<span class='erro'><?php echo $erros_validacao['pass']; ?></span>
						<?php endif; ?>
					</label>
				</form>
			</center>
		</div>

	</body>
</html>