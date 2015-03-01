<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Forgot</title>
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

		<div class="top tp_marginlg">
		    <div class="logo">
		        <a href='/'><img src="assets/img/logo.png" class="logo_img"></a>
            </div>
            <ul class="menu_list">
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