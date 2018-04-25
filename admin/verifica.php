<?php /*require_once('conecta.php');

if(isset($_POST['nickName'])){

	@$usuario =  @$_POST['userName'];
	@$nick 	  =  @$_POST['nickName'];
	@$email   =  @$_POST['emailUser'];

	$sql = "SELECT * FROM `usuarios` WHERE `nick_usuario` = _utf8 '$nick' OR `email_usuario` = '$email'"; //{$_POST['userName']}

	$exec = $conecta -> query ($sql);

	if(mysqli_num_rows($exec) > 0 ){
		echo "Existe o nome no banco de dados";
	}
	else {
		echo "Não existe o nome no banco de dados";
	}

}*/

$mysqli = new mysqli("localhost", "root", "", "mame");

if(isset($_POST['nickName'])) {

	 $name=$_POST['nickName'];

	 $checkdata=$mysqli->query("SELECT COUNT(*) FROM usuarios WHERE nick_usuario = '$name'");

	 $row = $checkdata->fetch_row();

	 if ($row[0] > 0) {
	  	echo "Nick indisponível";
	 }
	 else {
	  	echo "OK";
	 }
	 exit();
}

 ?>