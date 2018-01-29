<?php require_once('config.php');

$getmangaid = $_GET['idManga'];

?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilo.css" />
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <title>.:: Mame Mangás ::.</title>
        <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function dropdown() {
                document.getElementById("menuDropd").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {

                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
        </script>
</head>

<body>

    <!-- DIV GERAL -->

    <div class="geral">
        <!-- HEADER -->

        <div class="header"></div>

        <!-- MENU DE CIMA-->

        <nav class="menu">
            <div class="listaMenu">
                <ul>
                    <li>
                        <a href="#">Home</a></li>
                    <li>
                        <a href="#">H.D</a></li>
                    <li>
                        <a href="#">Parceria</a></li>
                    <li>
                        <a href="#">Contato</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- CONTAINER -->

        <div class="lateral">

            <div class="imgProjetos ml-10">
                <img src="">
            </div>

            <!--<div class="dropdMenu">
                <input type="image" onclick="dropdown();" class="dropdMenu-button dropbtn" src="fotos/cb47165c8f.gif" border="0">
                  <div id="menuDropd" class="dropdown-content">
                    <a href="#"><img src="fotos/55cab5bab2.gif"></a>
                    <a href="#"><img src="fotos/55cab5bab2.gif"></a>
                    <a href="#"><img src="fotos/55cab5bab2.gif"></a>
                  </div>
            </div>-->

            <ul class="dropdMenu">
              <li class="button-dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle">
                  <img src="fotos/cb47165c8f.gif">
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#">
                      <img src="fotos/55cab5bab2.gif">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="fotos/55cab5bab2.gif">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="fotos/55cab5bab2.gif">
                    </a>
                  </li>
                </ul>
              </li>
              <li class="button-dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle"><img src="fotos/a3db5373ea.gif"></a>
                  <ul class="dropdown-menu">
                    <li>
                        <a href="#">A</a>
                    </li>
                  </ul>
              </li>
            </ul>

        </div>


        <?php 
            //$sql = "SELECT DISTINCT manga_info.manga_infos, volumes_info.* FROM manga_info INNER JOIN volumes_info WHERE manga_info_id_manga = '$getmangaid' GROUP BY manga_info_id_manga = '$getmangaid'";

            //$sql = "SELECT DISTINCT manga_info.manga_infos, volumes_info.capselinks FROM manga_info, volumes_info WHERE manga_info_id_manga = '$getmangaid' GROUP BY manga_info_id_manga";

            $sql = "SELECT * FROM mangas, volumes, capitulos WHERE idMangas = '$getmangaid'";

            $exec = $con->query($sql) or die(mysqli_error($con));
            $exec1 = $con->query($sql) or die(mysqli_error($con));

            $assoc = mysqli_fetch_array($exec);


         ?>






        <!-- ÁREA DE POST -->
        <section class="main">
            <?php  $deco = json_decode($assoc['infos']); ?>
            <div class="project">
            	<div class="project-name">
            		<?php echo $deco->mangaName; ?>
            	</div>
            	<div class="img-project">
            		<img src="./imgs/<?php echo $deco->imgManga; ?>">
            	</div>
            	<div class="description">
            		<?php echo $deco->mangaDesc; ?>
				</div>

				<!-- COMEÇA AQUI -->
                <?php
                    while($dados = mysqli_fetch_array($exec1)){
                ?>
				<div class="manga-download">
					<div class="manga-volume">
						<div class="vol-number">
							<span>> Volume <?php echo $dados['volNum']; ?></span>
						</div>
						<div class="img-volume">
							<img src="imgs/capas/<?php echo $dados['imgVol']; ?>">

						</div>
						<div class="vol-chapters">
							<ul>
                                <li>
                                 <?php echo $dados['capname'] ." "; ?><a href="<?php echo $dados['caplink']; ?>"><?php echo $dados['capServerName']; ?></a>
                                </li>
							</ul>
						</div>
						<div class="vol-download">
							<a href="#">Volume <?php echo $dados['volNum']; ?> [4S]</a>
						</div>
					</div>
            	</div>

            	<!-- TERMINA AQUI -->

            	
            	<?php } ?>
            </div>
        </section> 

        <!-- RODAPÉ -->

        <footer id="footer"></footer>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function (e) {
        function t(t) {
            e(t).bind("click", function (t) {
                t.preventDefault();
                e(this).parent().fadeOut()
            })
        }
        e(".dropdown-toggle").click(function () {
            var t = e(this).parents(".button-dropdown").children(".dropdown-menu").is(":hidden");
            e(".button-dropdown .dropdown-menu").hide();
            e(".button-dropdown .dropdown-toggle").removeClass("active");
            if (t) {
                e(this).parents(".button-dropdown").children(".dropdown-menu").toggle().parents(".button-dropdown").children(".dropdown-toggle").addClass("active")
            }
        });
        e(document).bind("click", function (t) {
            var n = e(t.target);
            if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-menu").hide();
        });
        e(document).bind("click", function (t) {
            var n = e(t.target);
            if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-toggle").removeClass("active");
        })
    });
    </script>
</body>

</html>
