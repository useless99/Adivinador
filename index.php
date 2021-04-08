<html>
<head>
	<title>GEENIUS</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
<header>
<img src="Imagenes/x.png" alt="Imagen"width="300px">

<main>
<?php

require "conexion.php";

$nodo = 1;
$numPregunta = 1;
$proxPregunta = 2;

if(isset($_GET['n'])) {
	$nodo = $_GET["n"];
}



if(isset($_GET['np'])) {
	$numPregunta = $_GET["np"];
	$proxPregunta = $numPregunta+1;
}



$nodoSi = $nodo * 2;
$nodoNo = $nodo * 2 + 1;

$consulta = "SELECT texto,pregunta FROM arbol WHERE nodo = ".$nodo.";";

$texto = '';
$pregunta = true;
 
if ($resultado = mysqli_query($enlace, $consulta)) {
 
	if($resultado->num_rows === 0)
    {
        echo 'No existe el nodo';
    }

	else{
		while ($fila = mysqli_fetch_row($resultado)) {
			$texto 	  = $fila[0];
			$pregunta = $fila[1];
		}
		
		

		
		echo "<h2>Pregunta No.".$numPregunta."</h2>";
		
		if($pregunta == 0){
			
			echo "<div class='contenedorPregunta'>";
			echo "<h2>¿Has pensado en ". $texto . "?</h2>";
			echo "</div>";
			
			
			echo "<div class='contenedorRespuestas'>";
			echo "<a class='boton' href='respuesta.php?r=1&n=".$nodo."&p=".$texto."&np=".$proxPregunta."'>SÍ</a>";
			echo "<a class='boton' href='respuesta.php?r=0&n=".$nodo."&p=".$texto."&np=".$proxPregunta."'>NO</a>";
			echo "</div>";
		
		}
	
		else{
			echo "<div class='contenedorPregunta'>";
			echo "<h2>¿Tu personaje es ". $texto . "?</h2>";
			echo "</div>";
			
			echo "<div class='contenedorRespuestas'>";
			
			echo "<a class='boton' href='index.php?n=".$nodoSi."&r=0&np=".$proxPregunta."'>SÍ</a>";
			echo "<a class='boton' href='index.php?n=".$nodoNo."&r=0&np=".$proxPregunta."'>NO</a>";
			echo "<div class='limpiar'></div>";
		
			echo "</div>";
		}
		
	}

    mysqli_free_result($resultado);
}

?>

</main>

<br>
<br>

<?php

	echo "<a class='boton2' href='index.php?n=1&r=0'>Intentar de Nuevo</a>";
?>

</body>
</html>