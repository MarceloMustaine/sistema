<?php 

	function limpastring($str){
        
        include("config.php");
    
        return mysqli_escape_string($con, strip_tags(addslashes(trim($str))));
        
    }




	function getpost($var = null){

		if($var == null) {
			return $_POST;
		}
		else {
			return (isset($_POST[$var])) ? limpastring($_POST[$var]) : false;
		}


	};


function edita_foto() {
        
        if(!!getpost('imgManga')) {
            
            $message = null;
            
            $imagem          = $_FILES['img-perfil']['name'];

            $imagem_tmp      = $_FILES['img-perfil']['tmp_name'];

            $tamanho_arquivo = $_FILES['img-perfil']['size'];

            //validação da imagem
            //pegar a extensão da imagem
            $extensao        = substr($imagem, -4);

            $tipo_imagem     = array(".jpg", ".png", ".bmp", "jpeg", ".JPG");
            
            // $nome_img        = $_SESSION['username'] . '-' . $_SESSION['codUsuario'] . $extensao; // usar futuramente

            $nome_img = date("d.m.Y h:i:s"). $extensao;

    if (in_array($extensao, $tipo_imagem) == false) {

        $message = "O tipo de imagem que você tentou inserir não é válido" . $extensao;

    } 
    elseif ($tamanho_arquivo > 1572864) {

        $message = "A imagem é maior do que o tamanho permitido";
    
    }
            
    else {
        
        include 'conexao.php';

        $sql="UPDATE tab_usuario SET imagem = '$nome_img' WHERE codUsuario = '$idUsuario'";  

        $executa = $conecta -> query($sql) or die(mysqli_error($conecta));
        
        if(copy($imagem_tmp, "imagens/users/" . $nome_img)){
            $message = "Foto do perfil atualizada com sucesso!";
        }
        else {
            $erros = error_get_last();    
            $message = "ERRO " . $erros['message'] . " - " .$erros['type'];
        }
    }
            echo $message != null ? $message : null ;
  }
}



 ?>