<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Login - Sharing Dreams</title>
		<link rel="stylesheet" href="assets/css/index.css">
		<link rel="stylesheet" href="assets/css/cadastro.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
	</head>
	<body>

		<div class="top">
		    <div class="logo">
		        <a href='/'><img src="assets/img/logo.png" class="logo_img"></a>
		    </div>
		    <ul class="menu_list">
		        <li><a href='/about.php' id='menu'>About</a></li>
		        <li><a href="/join" id="menu">Join</a></li>
		        <li><a href="/login" id="menu">Login</a></li>
		    </ul>
		</div>

        <div class="hr"></div>
		<center>
		<div class="txtg" style="margin-top:20px; color:#484848;">Login</div>

		<form method='POST'>

			<?php if ($erro_login && isset($erros_validacao['invalido'])) : ?>
                <span class="erro"><?php echo $erros_validacao['invalido']; ?></span>
            <?php endif; ?>

			<fieldset class="fieldLogin">
				<label>
					<input type='text' name='usuario' value='<?php echo $cadastro['usuario']; ?>' id="usernameLogin" placeholder="Username">
					<?php if ($tem_erros && isset($erros_validacao['login_usuario'])) : ?>
                		<span class="erro"><?php echo $erros_validacao['login_usuario']; ?></span>
            		<?php endif; ?>
				</label>
				<label>
					<input type='password' name='senha' value='<?php echo $cadastro['senha']; ?>' id="passwordLogin" placeholder="Password">
					<?php if ($tem_erros && isset($erros_validacao['login_senha'])) : ?>
                		<span class="erro"><?php echo $erros_validacao['login_senha']; ?></span>
            		<?php endif; ?>
				</label>

				<button type='submit' value='Go'>Go!</button>
			</fieldset>
		</form>

		<p><a href='/forgot.php' id="preto">Did you forget your password or your username? Click here!</a></p>

	</body>
</html>