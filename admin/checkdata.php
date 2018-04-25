<?php 
$mysqli = new mysqli("localhost", "root", "", "mame");

if(isset($_POST['user_name']) || isset($_POST['emailUser'])) {
 
 $name  = $_POST['user_name'];
 echo $email = $_POST['emailUser']; 

 $checkdata = $mysqli->query("SELECT COUNT(*) FROM usuarios WHERE nick_usuario = '$name' OR email_usuario = '$email'");

 $row = $checkdata->fetch_row();

 if ($row[0] > 0){
  echo "Nome já existe";
 }
 else{
  echo "OK";
 }
 exit();
}

 ?>