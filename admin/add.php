<?php include_once("function.php"); require_once('conecta.php'); session_start();

	$userName  = getpost('userName');

	$nickName  = getpost('nickName');

	$emailUser = getpost('emailUser');

	$userPass  = getpost('userPass');

	$userPass  = sha1($userPass);

	if(isset($_POST['btn-envia'])){

	if(empty($userName)){
		$_SESSION['message'] = '<div class="card message">Você não pode deixar o campo do <b>Nome</b> vazio!</div>';
		echo "user";
	}
	else if(empty($nickName)){
		$_SESSION['message'] = '<div class="card message">Você não pode deixar o campo do <b>Nick</b> vazio!</div>';
		echo "nick";
	}
	else if(empty($emailUser)){
		$_SESSION['message'] = '<div class="card message">Você não pode deixar o campo do <b>Email</b> vazio!</div>';
		echo "email";
	}
	else if(empty($userPass)){
		$_SESSION['message'] = '<div class="card message">Você não pode deixar o campo da <b>Senha</b> vazio!</div>';
		echo "senha";
	}
	else{

	if(isset($_POST['btn-envia'])){

		$sql = "INSERT INTO `usuarios`(`nome_usuario`, `nick_usuario`, `email_usuario`, `senha_usuario`, `status_usuario`, `tipo_usuario`) VALUES('$userName', '$nickName', '$emailUser', '$userPass', 1, 1)";
		
		$exec = $conecta -> query($sql);
		//$exec = true;

		if(!$exec) {
			$_SESSION['message'] = '<div class="card message">o usuário não pode ser incluído no banco de dados</div>';
			header('location:sistema/register');
		}
		else {
			$_SESSION['message'] = '<div class="card message">tudo funcionou como o esperado e foi adicionado um usuário no banco de dados</div>';
			header('location:../register' );
		}


		}

	}

}


 ?>