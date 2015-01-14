<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Forgot</title>
		<link rel="stylesheet" href="assets/css/index.css">
		<link rel="stylesheet" href="assets/css/cadastro.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
	</head>
	<body>

		<div class="top tp_marginlg">
		    <div class="logo">
		        <a href='/'><img src="assets/img/logo.png" class="logo_img"></a>
                <a href="/submit" class="gotoglr">Submit your art! :)</a>
            </div>
            <ul class="menu_list">
                <li><a href="/submit" id="menu" class="gotoglr">Submit</a></li>
		        <li><a href="/gallery" id="menu">Gallery</a></li>
		        <li><a href="/login" id="menu">Login</a></li>
		    </ul>
		</div>

        <div class="hr"></div>
		<center>
		<div class="txtg" style="margin-top:20px;">Forgot username or password</div>

		<form method='POST'>

			<fieldset class="fieldLogin">
				<label>
					<input type='text' name='email' id="usernameLogin" placeholder="Your email">
					<?php if ($tem_erros && isset($erros_validacao['email'])) : ?>
						<span class='erro'><?php echo $erros_validacao['email']; ?></span>
					<?php endif; ?>

					<?php if (isset($mensagem_certo['email'])) : ?>
						<span class='erro'><?php echo $mensagem_certo['email']; ?></span>
					<?php endif; ?>
				</label>

				<button type='submit' value='Go'>Send!</button>
			</fieldset>
		</form>

	</body>
</html>