<?php require_once('conecta.php');

	@$usuario =  @$_POST['userName'];
	@$nick 	  =  @$_POST['nickName'];
	@$email   =  @$_POST['emailUser'];

	$sql = "SELECT * FROM `usuarios` WHERE `nick_usuario` = '$nick' OR `email_usuario` = '$email'"; //{$_POST['userName']}

	$exec = $conecta -> query ($sql);

	if(mysqli_num_rows($exec) > 0 ){
		echo "tem";
	}
	else {
		echo "não tem"; 	
	}

 ?>