<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Login - Sharing Dreams</title>
		<link rel="stylesheet" href="assets/css/index.css">
		<link rel="stylesheet" href="assets/css/cadastro.css">
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

		<div class="top">
		    <div class="logo">
		        <a href='/gallery'><img src="assets/img/logo.png" class="logo_img"></a>
		    </div>
		    <ul class="menu_list">
		        <li><a href='/' id='menu'>About</a></li>
		        <li><a href="/join" id="menu">Join</a></li>
		        <li><a href="/login" id="menu">Login</a></li>
		    </ul>
		</div>

        <div class="hr"></div>
		<center>

			<span><strong><?php 
				if (isset($_SESSION["msgCadastro"])) {
					echo "<center>".$_SESSION["msgCadastro"]."</center>";
					unset($_SESSION["msgCadastro"]);
				}
			?>
			</strong></span>

		<div class="txtg" style="margin-top:20px; color:#484848;">Login</div>

		<form method='POST'>

			<?php if ($erro_login && isset($erros_validacao['invalido'])) : ?>
                <span class="erro"><?php echo $erros_validacao['invalido']; ?></span>
            <?php endif; ?>
            <?php if (isset($_SESSION['m_email'])) :?>
				<span class='erro'><?php echo $_SESSION['m_email'];  unset($_SESSION['m_email']);?></span>
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

		<p class="forgetpass"><a href='/forgot' id="preto">Did you forget your password or your username? Click here!</a></p>

	</body>
</html>