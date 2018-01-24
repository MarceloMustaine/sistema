<?php require_once('config.php'); session_start();


@$_SESSION['mensagens'];

$sql = "SELECT * FROM mangas INNER JOIN volumes GROUP BY mangas_idMangas ORDER BY idMangas ASC";

$exec = $con->query($sql) or die(mysqli_error($con));


?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Adicionar um volume</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">

      
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <style type="text/css">
        .select-wrapper input.select-dropdown:focus {
            border-bottom: 1px solid #2196F3;
        }
        .dropdown-content li>a, .dropdown-content li>span {
          color:#2196F3;
        }
        .select-wrapper+label {
            top: -13px;
        }
        #output_image {
          margin-left:33px;
        }
      </style>
    </head>

    <body>


        <div class="container">

          <div class="row">

              <div class="input-field col l4">
                <form action="" method="POST" enctype="multipart/form-data">
                <select name="mangaNames">
                  <option value="" name="" disabled selected>Escolha o <b>mangá</b></option>
                  <?php 
                    while($dados = mysqli_fetch_array($exec)){
                        $js_deco = json_decode($dados['infos']);?>

                        <option value="<?php echo $dados['idMangas'];?>"><?php echo $js_deco->mangaName;?></option>

                    <?php
                    }
                  ?>
                </select>
                <label>Selecione o mangá</label>
              </div>
              
                <div class="input-field col l3">
                    <input type="text" class="validate" name="volNumber">
                    <label for="num_volume">Insira o num. do volume</label>
                </div>

              </div>

            <div class="row">
              <div class="file-field input-field col l4">
                <div class="btn">
                  <span>Adicionar</span>
                  <input type="file" accept="image/*" onchange="preview_image(event)" name="imgManga">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Insira uma imagem" accept="image/*">   
                </div>
              </div>
              <div class="input-field col l2">
                <div class="imagem-upload">
                  <img id="output_image">
                </div>
              </div>
            </div>



              <div class="snd-btn right-align row">

                <?php 
                /* COMEÇO DO CÓDIGO QUE INSERE OS DADOS DO VOLUME NO BANCO DE DADOS */

                @$volNumber = $_POST['volNumber'];
                @$idManga   = $_POST['mangaNames'];
                @$mangaName = $js_deco->mangaName;


                if($idManga == ''){
                  $_SESSION['mensagens'] = "Você precisa escolher um mangá primeiro!";
                }
                else if(empty($volNumber)){
                  $_SESSION['mensagens'] = "Você não pode adicionar um volume em branco!";
                }
                else {

                  $_UPLOAD['directory']    = 'imgs/capas/';

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
                  $_UPLOAD['fileextension'] = substr($_UPLOAD['imgname'], -4);
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

                    echo $sql_send = "INSERT INTO `volumes` (`volNum`, `imgVol`, `mangas_idMangas`) VALUES ('$volNumber', '$newimgname', '$idManga')";

                    $exec_send = $con->query($sql_send) or die(mysqli_error($con));

                    if(!$exec){
                        echo mysqli_error($con);
                    }
                    else{
                      $_SESSION['success'] = "Você adicionou um volume ao mangá " . $mangaName;
                      mysqli_close($con);
                      header('location:index.php');
                    }
                  }
                }

































                /*else{

                if(isset($_POST['btn-enviar'])){
                    $sql_send = "INSERT INTO `volumes` (`volNum`, `mangas_idMangas`) VALUES ('$volNumber', '$idManga')";

                    $exec_send = $con->query($sql_send) or die(mysqli_error($con));

                    if(!$exec_send){
                      $_SESSION['mensagens'] = "não funcionou";
                    }
                    else{
                      $_SESSION['success'] = "Você adicionou um volume ao mangá" . $js_deco->mangaName;
                      header('location:index.php');
                    }
                  }
                }*/

                /* TERMINO DO CÓDIGO QUE INSERE OS DADOS DO VOLUME NO BANCO DE DADOS */
                ?>

                <div class="col l7">
                  <button class="btn waves-effect waves-light btn-enviar" type="submit" name="btn-enviar">
                      Cadastrar
                  </button>
                </div>

            </div>

            </form>
        </div>
        <p class="center"><?php echo @$_SESSION['mensagens'] ?></p>
      </div>


      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js">
        
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('select').select();
        });
      </script>
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
    </body>
  </html>