<?php 

	function getpost($key = null){
		if($key == null){
			return $_POST;
		}
		else {
			return(isset($_POST[$key])) ? string_clear($_POST[$key]) : false;
		}
	}


	function string_clear($str){
		include("conecta.php");

		return mysqli_escape_string($conecta, strip_tags(addslashes(trim($str))));
	}


 ?>