<?php

require "conexion.php";


$nodo 		     = $_POST['nodo'];
$nombre 		 = $_POST['nombre'];
$caracteristicas = $_POST['caracteristicas'];
$nombreAnterior  = $_POST['nombreAnterior'];



$NumHijoI = $nodo * 2;
$NumHijoD = $nodo * 2 +1;
	

$NombreHijoI = $nombre;
$NombreHijoD = $nombreAnterior;


$pregunta = $caracteristicas;


$consulta = "INSERT INTO arbol (nodo,texto,pregunta) VALUES('".$NumHijoI."','".$nombre."',FALSE);";
mysqli_query($enlace, $consulta);

$consulta = "INSERT INTO arbol (nodo,texto,pregunta) VALUES('".$NumHijoD."','".$nombreAnterior."',FALSE);";
mysqli_query($enlace, $consulta);

$consulta = "UPDATE arbol SET texto = '".$caracteristicas."',pregunta = TRUE WHERE nodo = '".$nodo."';";
mysqli_query($enlace, $consulta);


$consulta = "INSERT INTO partida (personaje,acierto) VALUES('".$nombre."',FALSE);";
mysqli_query($enlace, $consulta);

header("Location:index.php?n=1&r=0");

?>