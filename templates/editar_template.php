<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
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
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60227935-1', 'auto');
          ga('send', 'pageview');

        </script>
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
                <a href='http://sharingdreams.co/gallery'><img src="assets/img/logo.png" class="logo_img"></a>
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

        	<p><a href="/editPass" style='color: #428bca'>Change your password! Click here!</a></p>

			<form method="post" enctype="multipart/form-data">
					<input type='hidden' name='id' value='<?php echo $cadastro['id']; ?>'>

						<label>
							<input type='text' name='email' id="usernameLogin" value='<?php echo htmlspecialchars($cadastro['email']); ?>' placeholder='Type here your email'>
							<input type='hidden' name='email_u' value='<?php echo htmlspecialchars($cadastro['email']); ?>'>	
							<?php if ($tem_erros && isset($erros_validacao['email'])) : ?>
								<span class='erro'><?php echo $erros_validacao['email']; ?></span>
							<?php endif; ?>
						</label>

						<label>
							<input type='text' name='endereco' id="usernameLogin" value='<?php echo htmlspecialchars($cadastro['endereco']); ?>' placeholder='City, Country'>	
							<?php if ($tem_erros && isset($erros_validacao['endereco'])) : ?>
								<span class='erro'><?php $cadastro['endereco'] = str_replace("\\", "", $cadastro["endereco"]); echo $erros_validacao['endereco']; ?></span>
							<?php endif; ?>
						</label>
						
						<br></br>

						<label>
	           				Tell us about you! (optional)
	            			<textarea name='sobre'><?php $cadastro['sobre'] = str_replace("\\", "", $cadastro["sobre"]); echo htmlspecialchars($cadastro['sobre']); ?></textarea>
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

						<button type="submit" class="botoes cancelar" style="width:135px;"><a href="../libs/excluir_conta.php">Delete account</a></button>
						<p class='botoes cancelar'><a href="http://sharingdreams.co/">Cancel</a></p>
						<button class='botoes editar' name='editar'>Edit!</button>
						
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