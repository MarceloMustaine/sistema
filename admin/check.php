<?php include('../functions.php'); require_once('conecta.php');

if(isset($_POST['btn-entra'])){
	$user 	= getpost('user');
	$pass 	= getpost('userPass');
	$pass 	= sha1($pass);
	$checkb	= getpost('checkb');

	if($checkb == "1") {
		setcookie("stay", "1");

		$sql  = "SELECT nick_usuario, senha_usuario FROM usuarios WHERE nick_usuario = '$user' AND senha_usuario = '$pass'";

		$exec = $conecta -> query($sql);

		if($exec) {
			echo "logado";
		}
		else {
			echo "usuario ou senha errado";
		} 

		echo $sql;
	}




}





 ?>