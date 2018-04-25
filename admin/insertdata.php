<?php 


if( isset( $_POST['submit_form'] ) )
{

    $name = $_POST['username'];

    $mysqli = new mysqli("localhost", "root", "", "mame");


    $mysqli->query("Insert into user (name) values ('".$name."')");
}









 ?>