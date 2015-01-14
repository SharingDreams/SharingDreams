<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Edit Account - Sharing Dreams</title>
		<link rel="stylesheet" href="assets/css/others/bootstrap.css">
		<link rel="stylesheet" href="assets/css/index.css">
		<link rel="stylesheet" href="assets/css/cadastro.css">
		<link rel="stylesheet" href="assets/css/others/datepicker.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
		<script src="assets/js/others/jquery.js"></script>
		<script src="assets/js/others/jquery-ui-1.10.4.custom.min.js"></script> 
		<script src="assets/js/others/bootstrap.js"></script>
		<script src="assets/js/others/datepicker.js"></script>  
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
	</head>
	<body>

		<style>
			.botoes {
				display: inline-block;
				margin-bottom: 10px;
				margin-left: 8px;
			}
			
			.editar {
				background-color: green;
				color: white;
			}

			.cancelar {
				color: black;
				background-color: gray;
				padding: 10px;
				text-decoration: none;
			}
		</style>

		<div class="top tp_marginlg">
            <div class="logo">
                <a href='http://sharingdreams.hol.es/'><img src="assets/img/logo.png" class="logo_img"></a>
                <a href="/submit" class="gotoglr">Submit your art! :)</a>
            </div>
            <ul class="menu_list">
                <li><a href="/submit" id="menu" class="gotoglr">Submit</a></li>
		        <li><a href="/gallery" id="menu">Gallery</a></li>
                <li><a href="deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img class="perfil_img_menu" src='assets/fotos_perfil/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img class="perfil_img_menu" src="assets/img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
		<div class="hr"></div>
        <div class='form' style="text-align:center;">
        <center>
        	<div style="height:30px;"></div>

        	<p><a href="/editPass" style='color: #428bca'>Change your password! Click here!</a></p>

			<form action="" method="post" enctype="multipart/form-data">
					<input type='hidden' name='id' value='<?php echo $cadastro['id']; ?>'>

						<label>
							<input type='text' name='email' id="usernameLogin" value='<?php echo htmlspecialchars($cadastro['email']); ?>' placeholder='Type here your email'>	
							<?php if ($tem_erros && isset($erros_validacao['email'])) : ?>
								<span class='erro'><?php echo $erros_validacao['email']; ?></span>
							<?php endif; ?>
						</label>

						<label>
							<input type='text' name='endereco' id="usernameLogin" value='<?php echo htmlspecialchars($cadastro['endereco']); ?>' placeholder='City, Country'>	
							<?php if ($tem_erros && isset($erros_validacao['endereco'])) : ?>
								<span class='erro'><?php echo $erros_validacao['endereco']; ?></span>
							<?php endif; ?>
						</label>
						
						<br></br>

						<label>
	           				Tell us about you! (optional)
	            			<textarea name='sobre'><?php echo htmlspecialchars($cadastro['sobre']); ?></textarea>
	        			</label>

						<br>

						<fieldset>
							<legend>Select a profile photo</legend>

							<input type="hidden" name="cadastro_id" value="<?php echo $cadastro['id']; ?>">

							<label>
								<?php if ($tem_erros && isset($erros_validacao['foto'])) : ?>
									<span class="erro"><?php echo $erros_validacao['foto']; ?></span>
								<?php endif; ?>
							</label>

							<input type='file' name='foto'>
						</fieldset>

						<br>

						<p class='botoes cancelar'><a href="http://sharingdreams.url.ph/">Cancel</a></p>
						<button type='submit' class='botoes editar' name='editar'>Edit!</button>
						
				</form>
			</center>
		</div>

		<script>
	    	$(document).ready(function () {
	    		$('.datepicker').datepicker();
	    	});
    	</script>
	</body>
</html>