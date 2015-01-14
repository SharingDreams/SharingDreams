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
		$headers = 'From: Sharing-Dreams dontreply@sharingdreams.com' . "\r\n" .
					'Content-type: text/html; charset=utf-8' . "\r\n";
		mail($to,$subject,$message,$headers);
	}

	public function gravar_cadastro($cadastro)
	{
		$usuario = $this->mysqli->escape_string($cadastro['usuario']);
		$nome = $this->mysqli->escape_string($cadastro['nome']);
		$senha = $this->mysqli->escape_string($cadastro['senha']);
		$senha2 = $this->mysqli->escape_string(md5($cadastro['senha']));
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

		$subject = 'Welcome to Sharing Dream';
		$mensage = "Hello $nome! Thank you for signing up in Sharing Dreams.<br>
			         Your registration data are:<br><br>
			         Username: <b>$usuario</b><br>
			         Password: <b>$senha</b><br>
			         <br><br>
			         <a href='www.sharingdreams.url.ph'>Sharing Dreams</a>";

		$this->email($email,$mensage,$subject);

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
	