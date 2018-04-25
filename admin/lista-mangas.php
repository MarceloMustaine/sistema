<?php require_once('config.php'); session_start();

$sql = "SELECT manga_info.id_manga, manga_info.manga_infos, volumes_info.id_volume, volumes_info.manga_info_id_manga, COUNT( volumes_info.manga_info_id_manga) AS contaVolumes FROM manga_info, volumes_info GROUP BY manga_info.id_manga, volumes_info.id_volume";
$exec = $con->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
</head>
<body>
	<div class="container">
 <ul class="collapsible">
 	<?php

	while($dados = mysqli_fetch_array($exec)){

	$js_deco 	 = json_decode($dados['manga_infos']);

 ?>
    <li>
      <div class="collapsible-header"><i class="material-icons">arrow_forward</i> <?php echo $js_deco->mangaName; ?></div>
      <div class="collapsible-body">Volumes - <b><?php echo $dados['contaVolumes'];?></b></div>
    </li>
    <?php 
	};
 	?>

 </ul>
 </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
 <script type="text/javascript">
 	var elem = document.querySelector('.collapsible');
  	var instance = M.Collapsible.init(elem, 'accordion');
 </script>
</body>
</html>