<?php require_once('conecta.php'); session_start();

if($_SESSION['userNick'] == null){  
  header('location:../login');
}
else {

?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <title>
        Manga SRC - Home
      </title>

    </head>

    <body class="grey lighten-5">
      <header>
      <ul id="slide-out" class="sidenav sidenav-fixed">
        <li>
          <div class="header-usuario">
              <div class="container">
                <div class="row">
                  <div class="col l12">
                    <div class="avatar-usuario">
                      <img class="responsive-img circle z-depth-2" src="imgs/avatar/<?php echo $_SESSION['userAvatar']; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col l12">
                    <div class="info-usuario">
                      <div class="userName"><?php echo $_SESSION['userName']; ?></div>
                      <div class="nickName">(<?php echo $_SESSION['userNick']; ?>)</div>
                    </div>
                  </div>
                </div>
            </div>
        </li>
          <li><a href="#!">Home</a></li>
          <li>
            <ul class="collapsible">
              <li>
                <a class="collapsible-header">Adicionar</a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#">Adicionar Projeto</a></li>
                        <li><a href="#">Adicionar Volume</a></li>
                        <li><a href="#">Adicionar Capítulo</a></li>
                      </ul>
                  </div>
              </li>
              <li>
                <a class="collapsible-header">Modificar</a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#">Modificar Projeto</a></li>
                        <li><a href="#">Modificar Volume</a></li>
                        <li><a href="#">Modificar Capítulo</a></li>
                      </ul>
                  </div>
              </li>
              <li>
                <a class="collapsible-header">Excluir </a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#">Excluir Projeto</a></li>
                        <li><a href="#">Excluir Volume</a></li>
                        <li><a href="#">Excluir Capítulo</a></li>
                      </ul>
                  </div>
              </li>
            </ul>
          </li>
          <li><a href="sair">Sair</a></li>
      </ul>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      </header>
     
      <main>
        <div class="row">
          <div class="col l6 m10">
            <div id="fecha" class="card welcome">
              <div class="row">
                <div class="col l10 m11">
                  <p>Bem-vindo, <b><?php echo $_SESSION['userName']; ?></b></p>
                </div>
                <div class="col l2 m1"><div class="dismiss"><span><a href="#fecha">X</a></span></div></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col l12 m10">
            <div class="card corpo">Teste</div>
          </div>
        </div>
      </main>






      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script type="text/javascript">
        var elem = document.querySelector('.collapsible');
        var instance = M.Collapsible.init(elem, 'options');

        var elem = document.querySelector('.sidenav');
        var instance = M.Sidenav.init(elem, 'options');
      </script>
    </body>
  </html>
  <?php } ?>