<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
	<?php
			function limpastring($str){
		        
		        include("config.php");
		    
		        return mysqli_escape_string($con, strip_tags(addslashes(trim($str))));
		        
		    }

		 if(isset($_POST['send'])) {
            
            $message 		 = null;

            $caminho 		 = 'imgs/';

            $mangaName 		 = limpastring($_POST['mangaName']);

            $mangaDesc 		 = limpastring($_POST['mangaDesc']);
            
            $imagem          = $_FILES['imgManga']['name'];

            $imagem_tmp      = $_FILES['imgManga']['tmp_name'];

            $tamanho_arquivo = $_FILES['imgManga']['size'];

            //validação da imagem
            //pegar a extensão da imagem
            $extensao        = substr($imagem, -4);

            $tipo_imagem     = array(".jpg", ".png", ".bmp", "jpeg", ".JPG");
            
            $nome_img        = md5(time()) . $extensao;


            if(empty($mangaName)){
            	$message = "Você não pode adicionar um mangá sem um nome!";
            }
            elseif(empty($mangaDesc)){
            	$message = "Você não pode adicionar um mangá sem uma descrição!";
            }
            elseif(empty($_FILES['imgManga']['name'])){
            	$message = "Você não pode adicionar um mangá sem uma imagem!";
            }

		    elseif (in_array($extensao, $tipo_imagem) == false) {

		        $message = "O tipo de arquivo/imagem que você tentou inserir não é suportado " . "'" . $extensao . "'";

		    } 
		    elseif ($tamanho_arquivo > 1024*1024*2) {

		        $message = "A imagem é maior do que o tamanho permitido";
		    
		    }
		            
		    else {
		        
		        include 'config.php';
		        
		        if(move_uploaded_file($imagem_tmp, $caminho . $nome_img) || !empty($mangaName) || empty($mangaDesc) || empty($_FILES['imgManga']['name'])){
		            $message = "<br>Mangá adicionado com Sucesso!";
		            echo $sql = "INSERT INTO `manga_info`(`manga_name`, `manga_img`, `manga_description`) VALUES ('$mangaName','$nome_img','$mangaDesc')";

		        	//$executa = $con -> query($sql) or die(mysqli_error($con));
		        }
		        else {
		            $erros = error_get_last();    
		            $message = "ERRO " . $erros['message'] . " - " .$erros['type'];
		        }
		    }
		            echo $message != null ? $message : null ;
		  }
?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>
<body>
	<div class="container">
	<form enctype="multipart/form-data" action="" method="POST">
		<div class="row">
			<div class="input-field col s6">
				<input type="text" name="mangaName" class="validate">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<textarea name="mangaDesc" class="materialize-textarea"></textarea>
			</div>
		</div>
			<input type="file" class="form-control" name="imgManga" id="imgManga">
		</div>
		</div>
	</form>
	</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
</body>
</html>