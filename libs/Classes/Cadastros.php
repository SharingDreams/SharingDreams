<?php

class Cadastros
{
	public $mysqli;
	public $cadastro;

	public function __construct($novo_mysqli)
	{
		$this->mysqli = $novo_mysqli;
	}

	public function email($email,$mensage,$subject){
		$to = $email;
		$subject = $subject;
		$message = $mensage;

		$headers = "MIME-Version: 1.1\n";
		$headers .= "Content-type: text/html; charset=utf-8\n";
		$headers .= "From: Sharing-Dreams noreply@sharingdreams.co"."\n"; // remetente
		$envio = mail($to, $subject, $message, $headers, "-r"."noreply@sharingdreams.co");
	}

	public function gravar_cadastro($cadastro)
	{
		$usuario = $this->mysqli->escape_string($cadastro['usuario']);
		$nome = $this->mysqli->escape_string($cadastro['nome']);
		$senha = $this->mysqli->escape_string($cadastro['senha']);
		$senha2 = $this->mysqli->escape_string(sha1(md5(md5($cadastro['senha']))));
		$email = $this->mysqli->escape_string($cadastro['email']);
		$endereco = $this->mysqli->escape_string($cadastro['endereco']);
		$data_nascimento = $this->mysqli->escape_string($cadastro['data_nascimento']);
		$sobre = $this->mysqli->escape_string($cadastro['sobre']);


		$sqlGravar = "
				INSERT INTO cadastro
				(usuario, nome, senha, email, endereco, data_nascimento, sobre,sexo)
				VALUES 
				(
					'{$usuario}',
					'{$nome}',
					'{$senha2}',
					'{$email}',
					'{$endereco}',
					'{$data_nascimento}',
					'{$sobre}',
					'{$sexo}'
				)
			";

		$subject = 'Welcome to Sharing Dreams \o/';
		$mensage = "<div style='backgorund:#fff; width:640px;'>
						<div style='width:610px; height:75px; background-color:#e3e3e3; padding-top:30px; padding-left:30px;'>
							<img src='http://sharingdreams.co/assets/img/logo.png'>
						</div>
						<center>
							<h1>
								Welcome to Sharing Dreams \o/
							</h1>
						</center>
						<br>
						<br>
						<p style='color:#484747; margin-left:35px;'>
							Hello $nome!<br>
						 	Thank you for signing up in Sharing Dreams.<br>
				         	Now you can help us to make a difference in the world :)<br>
							<br>
							Your registration data are:<br>
				         	Username: <b>$usuario</b><br>
				         	Password: <b>$senha</b><br>
				         	<br><br>
				         	Let's make some arts!<br><br>
				         	Have a nice day,
				         	<a href='www.sharingdreams.co'>Sharing Dreams</a>
				        </p>
			       	</div>";

		$this->email($email,$mensage,$subject, $headers);

		$this->mysqli->query($sqlGravar);
	}

	function buscar_cadastro($usuario, $senha) 
	{
	    $sqlBusca = "SELECT * FROM cadastro WHERE usuario = '$usuario' AND senha = '$senha'";
	    $resultado = $this->mysqli->query($sqlBusca);
	    
	    $this->cadastro = mysqli_fetch_assoc($resultado);
	}

	function buscar_dados_cadastro($id) 
	{
		$sqlBusca = 'SELECT * FROM cadastro WHERE id = ' . $id;
    	$resultado = $this->mysqli->query($sqlBusca);
    
    	$this->cadastro = mysqli_fetch_assoc($resultado);
	}

	function editar_cadastro($cadastro) {
		$email = $this->mysqli->escape_string($cadastro['email']);
		$endereco = $this->mysqli->escape_string($cadastro['endereco']);
		$sobre = $this->mysqli->escape_string($cadastro['sobre']);

	    $sqlEditar = "
	    	UPDATE cadastro SET
				email = '{$cadastro['email']}',
				endereco = '{$cadastro['endereco']}',
				sobre = '{$cadastro['sobre']}'
			WHERE id = {$cadastro['id']}
			";

	    $this->mysqli->query($sqlEditar);
	}

	function editar_senha($cadastro) {
		$senha = $this->mysqli->escape_string($cadastro['senha']);

	    $sqlEditar = "
	    	UPDATE cadastro SET
				senha = '{$cadastro['senha']}'
			WHERE id = {$cadastro['id']}
			";

	    $this->mysqli->query($sqlEditar);
	}
}
	