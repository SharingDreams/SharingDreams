<?php
session_start();

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "./config.php";
include "./banco.php";
include "./helper.php";
include "./classes/Cadastros.php";

$user[0] = "adm1";$pass[0] = "adm1";
$user[1] = "adm2";$pass[1] = "adm2";
$user[2] = "adm3";$pass[2] = "adm3";

if(isset($_POST['login'])){
	$userField = $_POST['user'];
	$passField = $_POST['pass'];

	if(($userField == $user[0] && $passField == $pass[0]) || ($userField == $user[1] && $passField == $pass[1]) || ($userField == $user[2] && $passField == $pass[2])) {
		$_SESSION['loged'] = rand();
	}else{
		echo "<center><font color='red' size='5'>User and/or password incorrect!</font></center>";
	}
}

if(empty($_SESSION['loged'])){
?>
<center>
	<form method="post">	
		<input type="text" placeholder="user" name="user"><br>
		<input type="password" placeholder="password" name="pass"><br>
		<input type="submit" name="login" value="Login!">
	</form>
</center>
<?php
}else{
?>
<center>
	<table border=1>
		<tr>
			<td>User</td>
			<td>Art name</td>
			<td>Art</td>
			<td>Actions</td>
		</tr>
		<?php $resultado  = buscar_arte_adm($mysqli); while($f = mysqli_fetch_assoc($resultado)){ $user = resgatar_nome_user($mysqli, $f['cadastro_id']) ;?>
		<tr>
			<td><?php echo $user["usuario"]; ?></td>
			<td><?php echo $f["nome_arte"]; ?></td>
			<td><a href="./fotos/<?php echo $f["nome"]; ?>" target="_BLANK"><img src="./fotos/thumbnails/<?php echo $f["nome"]; ?>" border="0"></a></td>
			<td>Actions</td>
		</tr>
		<?php } ?>
	</table>
</center>
<?php
}