<?php include_once("function.php"); require_once('conecta.php');


	$userName  = getpost('userName');

	$nickName  = getpost('nickName');

	$emailUser = getpost('emailUser');

	$userPass  = getpost('userPass');

	$userPass  = sha1($userPass);

	
	echo $sql = "INSERT INTO usuarios ('nome_usuario', 'nick_usuario', 'email_usuario', 'senha_usuario', 'status_usuario', 'tipo_usuario') VALUES('$userName', '$nickName', '$emailUser', '$userPass', 1, 1)";
	
	$exec = $conecta -> query($sql);

	if(!$exec) {
		echo "erro";
	}
	else {
		echo "tudo ok";
	}




 ?>