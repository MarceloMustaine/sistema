<?php require_once('config.php'); require_once('functions.php'); session_start();

  if(isset($_POST['btn-enviar'])){

      $message = null;

      $mangaName = getpost('mangaName');
      $mangaDesc = getpost('mangaDesc');


      $_SESSION['mensagens'] = $message;

      if(empty($mangaName)){
        $_SESSION['mensagens'] = "Você não pode deixar o mangá sem um nome";
      }
      else if(empty($mangaDesc)){
        $_SESSION['mensagens'] = "Você não pode deixar o mangá sem uma descrição";
      } 
      else {

      $_UPLOAD['directory']    = 'imgs/';

      $_UPLOAD['imgname']      = $_FILES['imgManga']['name'];
        
      $_UPLOAD['imagetmp']     = $_FILES['imgManga']['tmp_name'];

      $_UPLOAD['filesize']     = filesize($_UPLOAD['imagetmp']);

      $_UPLOAD['imagesize']    = 1024 * 1024 * 2;

      $_UPLOAD['errors'][0]    = 'Não houve erro';
      $_UPLOAD['errors'][1]    = 'o arquivo no upload é maior do que o limite do PHP';
      $_UPLOAD['errors'][2]    = 'o arquivo ultrapassa o limite de tamanho especifiado no HTML';
      $_UPLOAD['errors'][3]    = 'o upload do arquivo foi feito parcialmente';
      $_UPLOAD['errors'][4]    = 'Não foi feito o upload do arquivo';

      //validação da imagem
      //pegar a extensão da imagem
      echo $_UPLOAD['fileextension'] = substr($_UPLOAD['imgname'], -4);
      //$extensao         = substr($_UPLOAD['imgName'], -4);

      $_UPLOAD['imgtype']       = array(".jpg", ".png", "jpeg", ".JPG", ".png");

      //$tipo_imagem     = array(".jpg", ".png", ".bmp", "jpeg", ".JPG");
      
      $_UPLOAD['newimgname']    = $mangaName . "-" . uniqid() . $_UPLOAD['fileextension'];

      $newimgname = $_UPLOAD['newimgname'];

      if(@$_FILES['imgManga']['error'] != 0) {
        echo "Não foi possível fazer o upload, " . $_UPLOAD['errors'][$_FILES['imgManga']['error']];
         // Para a execução do script
      }
      if (in_array($_UPLOAD['fileextension'], $_UPLOAD['imgtype']) == false) {
          echo "O tipo de arquivo/imagem que você tentou inserir não é válido; Extensão: '" . $_UPLOAD['fileextension'] ."' ";
      }
      else if($_UPLOAD['imagetmp'] < $_FILES['imgManga']['size']) {
        $_UPLOAD['errors'][$_FILES['imgManga']['error']] . ' ';
        echo "dê andamento no upload ";
      }
      if(@copy($_UPLOAD['imagetmp'], $_UPLOAD['directory'] . $_UPLOAD['newimgname'])){

        $array_enc = array('mangaName' => $mangaName, 'mangaDesc' => $mangaDesc, 'imgManga' => $newimgname);

        $js_encode = json_encode($array_enc, JSON_UNESCAPED_UNICODE); /* <- Solução para os acentos e outros caracteres esquisitos no JSON*/

        $sql = "INSERT INTO `mangas`(`infos`) VALUES ('$js_encode')";
        $exec = $con -> query($sql) or die(mysqli_error($con));

        if(!$exec){
            echo mysqli_error($con);
        }
        else{
          $_SESSION['success'] = "Mangá Adicionado <i class='material-icons' style='color:#00E676; font-size:35px;'>done</i>";
          header('location:index.php');
        }
      }
}
}
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <style type="text/css">
        .dropdown-content li>a, .dropdown-content li>span {
          color:#333;
        }
        #output_image{
          max-height: 200px;
        }
        .btn {
          background-color: #2196F3;
        }
        .btn:hover {
          background-color: #1565C0;
        }
        input.valid:not([type]), input.valid:not([type]):focus, input[type=text].valid:not(.browser-default), input[type=text].valid:not(.browser-default):focus, input[type=password].valid:not(.browser-default), input[type=password].valid:not(.browser-default):focus, input[type=email].valid:not(.browser-default), input[type=email].valid:not(.browser-default):focus, input[type=url].valid:not(.browser-default), input[type=url].valid:not(.browser-default):focus, input[type=time].valid:not(.browser-default), input[type=time].valid:not(.browser-default):focus, input[type=date].valid:not(.browser-default), input[type=date].valid:not(.browser-default):focus, input[type=datetime].valid:not(.browser-default), input[type=datetime].valid:not(.browser-default):focus, input[type=datetime-local].valid:not(.browser-default), input[type=datetime-local].valid:not(.browser-default):focus, input[type=tel].valid:not(.browser-default), input[type=tel].valid:not(.browser-default):focus, input[type=number].valid:not(.browser-default), input[type=number].valid:not(.browser-default):focus, input[type=search].valid:not(.browser-default), input[type=search].valid:not(.browser-default):focus, textarea.materialize-textarea.valid, textarea.materialize-textarea.valid:focus, .select-wrapper.valid>input.select-dropdown {
            border-bottom: 1px solid #2196F3;
            -webkit-box-shadow: 0 1px 0 0 #2196F3;
            box-shadow: 0 1px 0 0 #2196F3;
        }

        input:not([type]):focus:not([readonly]), input[type=text]:not(.browser-default):focus:not([readonly]), input[type=password]:not(.browser-default):focus:not([readonly]), input[type=email]:not(.browser-default):focus:not([readonly]), input[type=url]:not(.browser-default):focus:not([readonly]), input[type=time]:not(.browser-default):focus:not([readonly]), input[type=date]:not(.browser-default):focus:not([readonly]), input[type=datetime]:not(.browser-default):focus:not([readonly]), input[type=datetime-local]:not(.browser-default):focus:not([readonly]), input[type=tel]:not(.browser-default):focus:not([readonly]), input[type=number]:not(.browser-default):focus:not([readonly]), input[type=search]:not(.browser-default):focus:not([readonly]), textarea.materialize-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #2196F3;
            -webkit-box-shadow: 0 1px 0 0 #2196F3;
            box-shadow: 0 1px 0 0 #2196F3;
        }
        input[type=text]:not(.browser-default):focus:not([readonly])+label, input[type=password]:not(.browser-default):focus:not([readonly]), input[type=email]:not(.browser-default):focus:not([readonly]), input[type=url]:not(.browser-default):focus:not([readonly]), input[type=time]:not(.browser-default):focus:not([readonly]), input[type=date]:not(.browser-default):focus:not([readonly]), input[type=datetime]:not(.browser-default):focus:not([readonly]), input[type=datetime-local]:not(.browser-default):focus:not([readonly]), input[type=tel]:not(.browser-default):focus:not([readonly]), input[type=number]:not(.browser-default):focus:not([readonly]), input[type=search]:not(.browser-default):focus:not([readonly]), textarea.materialize-textarea:focus:not([readonly])+label {
            color:#2196F3;
        }        
      </style>

      <script type="text/javascript">
        function preview_image(event) 
          {
           var reader = new FileReader();
           reader.onload = function()
           {
            var output = document.getElementById('output_image');
            output.src = reader.result;
           }
           if(event.target.files[0]){
            reader.readAsDataURL(event.target.files[0]);
           }
        }
      </script>
      <title>Adicionar mangá</title>
    </head>

    <body>

      <div class="container">

        <div class="row">
          
          <form class="col s12 form_cadastra" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col l8">
                <input type="text" class="validate mangaName" name="mangaName">
                <label for="nome_manga">Qual o nome do <b>mangá?</b></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col l8">
                <textarea class="materialize-textarea mangaDesc" name="mangaDesc" data-length="300"></textarea>
                <label for="resumo_manga">Insira um resumo do <b>mangá</b></label>
              </div>
            </div>
            <div class="row">
              <div class="file-field input-field col l8">
                <div class="btn">
                  <span>Adicionar</span>
                  <input type="file" accept="image/*" onchange="preview_image(event)" name="imgManga">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Insira uma imagem" accept="image/*">   
                </div>
              </div>
            </div>
            <div class="right-side">
            <div class="row">
              <div class="col l8">
                <div class="imagem-upload">
                  <img id="output_image">
                </div>
              </div>
            </div>
            </div>
            <div class="snd-btn right-align row">
              <div class="col l8">
              <button class="btn waves-effect waves-light" type="submit" name="btn-enviar">
                  Enviar
              </button>
              </div>
            </div>
          </form>
        <?php echo @$_SESSION['mensagens']; ?>
      </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('select').material_select();
        });
      </script>
    </body>
  </html>