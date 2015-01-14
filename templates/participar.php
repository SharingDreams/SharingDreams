<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Join - Sharing Dreams</title>
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

		<div class="top">
		    <div class="logo">
		        <a href='/'><img src="assets/img/logo.png" class="logo_img"></a>
		    </div>
		    <ul class="menu_list">
		        <li><a href="/about">About</a></li>
		        <li>Join</li>
		        <li><a href="/login" id="menu">Login</a></li>
		    </ul>
		</div>
		<div class="hr"></div>
        <div class='form' style="text-align:center;">
        <center>
			<div class="que_bom">How nice your interest to join us!</div>

			<small class="forwhoRegister">You, which have 18 years old or less, help poor kids around the world and be recognized!</small>

			<div style="height:30px;"></div>

			<form method='POST'>
				<input type='hidden' name='id' value='<?php echo $cadastro['id']; ?>'>

					<label>
						<input type='text' name='usuario' value='<?php echo htmlspecialchars($cadastro['usuario']); ?>' id="usernameLogin" placeholder='Create a username' autofocus>
						
						<?php if ($tem_erros && isset($erros_validacao['usuario'])) : ?>
	                		<span class="erro"><?php echo $erros_validacao['usuario']; ?></span>
	            		<?php endif; ?>

	           			<?php if ($tem_erros && isset($erros_validacao['verificacao'])) : ?>
	                		<span class="erro"><?php echo $erros_validacao['verificacao']; ?></span>
	            		<?php endif; ?>
					</label>
					
					<label>
						<input type='text' class='datepicker' name='data_nascimento' id="usernameLogin" value='<?php echo htmlspecialchars(traduz_data_nascimento_para_exibir($cadastro['data_nascimento'])); ?>' placeholder='Birthday: mm/dd/yyyy'>
						
						<?php if ($tem_erros && isset($erros_validacao['data_nascimento'])) : ?>
							<span class='erro'><?php echo $erros_validacao['data_nascimento']; ?></span>
						<? endif; ?>
					</label>

					<br>

					<label>
						Select your gender:
						<select name='sexo'>
							<option name='sexo' value='1' <?php echo ($cadastro['sexo'] == 1) ? 'selected' : ''; ?> >I'm a boy</option>
							<option name='sexo' value='2' <?php echo ($cadastro['sexo'] == 2) ? 'selected' : ''; ?> >I'm a girl</option>
						</select>
					</label>

					<label>
						<input type='text' name='nome' value='<?php echo htmlspecialchars($cadastro['nome']); ?>' id="usernameLogin" placeholder='Type here your full name' autocomplete='off'>
						
						<?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
							<span class='erro'><?php echo $erros_validacao['nome']; ?></span>
						<? endif; ?>
					</label>

					<label>
						<input type='text' name='email' value='<?php echo htmlspecialchars($cadastro['email']); ?>' id="usernameLogin" placeholder='Type here your email'>	
						
						<?php if ($tem_erros && isset($erros_validacao['email'])) : ?>
							<span class='erro'><?php echo $erros_validacao['email']; ?></span>
						<?php endif; ?>
					</label>

					<label>
						<input type='text' name='endereco' value='<?php echo htmlspecialchars($cadastro['endereco']); ?>' id="usernameLogin" placeholder='City, Country'>	
						<?php if ($tem_erros && isset($erros_validacao['endereco'])) : ?>
							<span class='erro'><?php echo $erros_validacao['endereco']; ?></span>
						<?php endif; ?>
					</label>
					
					<br></br>

					<label>
           				Tell us about you! (optional)
            			<textarea name='sobre'><?php echo htmlspecialchars($cadastro['sobre']); ?></textarea>
        			</label>

        			<br></br>

					<label>
						<input type='password' name='senha' id="passwordLogin" placeholder='Type here your password'>
						<?php if ($tem_erros && isset($erros_validacao['senha'])) : ?>
	                		<span class="erro"><?php echo $erros_validacao['senha']; ?></span>
	            		<?php endif; ?>
					</label>

					<label>
						<input type='password' name='senha2' id="passwordLogin" placeholder='Type here your password again!'>
						<?php if ($tem_erros && isset($erros_validacao['senha2'])) : ?>
	                		<span class="erro"><?php echo $erros_validacao['senha2']; ?></span>
	            		<?php endif; ?>
					</label>

					<div style="height:20px;"></div>
					<button type='submit' class='btn2 like' name='cadastrar'>Ok!</button>
					<div style="height:100px;"></div>
			</form>

			</center>

            </div>
        
		<script>
		$(function() {
		    $( ".datepicker" ).datepicker();
		});
		</script>

	</body>
</html>