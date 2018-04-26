<?php session_start();

    include("conecta.php");
    include("functions.php");

    $login = getpost('user');
    $senha = getpost('userPass');

    $senha = sha1($senha);

    $sql = "SELECT * FROM usuarios WHERE nick_usuario = '$login' AND senha_usuario = '$senha'";
    
    if($login && $senha){
    $executa = $conecta -> query($sql) or die(mysqli_query($conecta));

    $linhas = mysqli_num_rows($executa);

    if($linhas === 1){
    	$dados = mysqli_fetch_array($executa);

    	if($dados['status_usuario'] == 1){

    		if($dados['tipo_usuario'] == 1){

		    	$_SESSION['userName']     = $dados['nome_usuario'];
		    	$_SESSION['userNick'] 	  = $dados['nick_usuario'];
		    	$_SESSION['userAvatar']   = $dados['avatar_usuario'];

		    	echo "redirecionando...";
		    	header('location:index');
	    	}
    	}
    	else {
    		echo "usuario desativado";
    	}

    }
    else {
        echo "não logado";
        $_SESSION['message'] = '<div class="card red darken-4 erro-login"><p>Usuário ou Senha incorretos!</p></div>';
        header('location:../index');
    }
}
else {
    echo "Algo deu errado, contate o adminstrador <a href='/contato.php'>clicando aqui</a>";
}
?>