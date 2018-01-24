<?php $con = new mysqli('localhost', 'root','','mame');
$string = '{"idManga":"34", "chapName": {"capitulo1":"Capítulo 1","capitulo2":"Capítulo 2"}, "capitulos":{"linkcap1":"http://localhost", "linkcap2":"http://localhost"}}';


$array = array("idManga" => 34, "chapName" => array("capitulo1" => "Capítulo 1", "capitulo2" => "Capítulo 2", "capitulo3" => "Capítulo 3"),"linkchaps" => array("link1" => "http://localhost/1","link2" => "http://localhost/2", "link3" => "http://localhost/2"));
$js_enco = json_encode($array, JSON_UNESCAPED_UNICODE);

$sql_in = "UPDATE volumes_info SET capselinks='$js_enco' WHERE id_volume = 23 AND manga_info_id_manga = 34";


//$exec_in = $con->query($sql_in) or die(mysqli_error($con));


//var_dump($js_enco);




$sql = "SELECT capselinks FROM volumes_info WHERE manga_info_id_manga = 34";

$exec = $con->query($sql);

$dados = mysqli_fetch_array($exec);

$unicode =  utf8_encode($dados['capselinks']);

$js_deco = json_decode($dados['capselinks']);

$array_ncaps = array($js_deco);
$array = array($js_deco);


foreach($array as $key => $ncapitulos){
	foreach($array as $key => $linkcaps){


?>



<h1><?php echo $ncapitulos->chapName->capitulo1 ; ?></h1> <p><?php echo $linkcaps->linkchaps->link1; ?></p>


<?php
	}
}


/*for($i = 0; $i < ){

}*/



?>