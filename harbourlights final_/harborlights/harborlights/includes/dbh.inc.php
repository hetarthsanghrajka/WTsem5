<?php

$servername="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="hotel";

$conn=mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn)
{
		die("Conection Failed".mysqli_connect_error()) ;
		
}






?>
