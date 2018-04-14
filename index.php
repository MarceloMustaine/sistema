<?php session_start();?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
      
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <link rel="stylesheet" href="css/style.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     
      <title>Página Principal</title>
    </head>

    <body>

      <!-- MENU USUARIO -->

      <section class="usuario z-depth-2">
        <div class="header-usuario">
          <div class="container">
            <div class="row">
              <div class="col l12">
                <div class="avatar-usuario">
                  <img class="responsive-img circle z-depth-2" src="imgs/avatar/foto.jpg">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col l12">
                <div class="info-usuario">
                  <div class="userName">Marcelo Ferreira</div>
                  <div class="nickName">(MarceloMustaine)</div>
                </div>
              </div>
            </div>
          </div>
          <div class="menu">
          <ul class="collapsible sidenav sidenav-fixed">
            <li><a  class="collapsible-header" href="/sistema">Home</a></li>
            <li>
              <a class="collapsible-header">Projeto <i class="material-icons">arrow_drop_down</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#">Adicionar Projeto</a></li>
                  <li><a href="#">Adicionar Volume</a></li>
                  <li><a href="#">Adicionar Capítulo</a></li>
                  <li><a href="#">Modificar Projeto</a></li>
                  <li><a href="#">Modificar Volume</a></li>
                  <li><a href="#">Modificar Capítulo</a></li>
                  <li><a href="#">Excluir Projeto</a></li>
                  <li><a href="#">Excluir Volume</a></li>
                  <li><a href="#">Excluir Capítulo</a></li>
                </ul>
              </div>
            </li>
          </ul>
          </div>
        </div>
      </section>








      <!-- FIM MENU USUARIO -->

		<?php /*

      if($_SESSION['success']){
			 echo @$_SESSION['success'];
		  }
*/
		?>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script type="text/javascript">
        var elem = document.querySelector('.sidenav');
        var instance = M.Sidenav.init(elem, 'options');
      </script>
      <script type="text/javascript">
        var elem = document.querySelector('.collapsible');
        var instance = M.Collapsible.init(elem, 'options');
      </script>
    </body>
  </html>