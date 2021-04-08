<html>

<head>
	<title>Adivinador</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>


<body>

<header>
	
	<h1>Geenius</h1>


</header>


<main>


<?php

require "conexion.php";


$respuesta = $_GET["r"];
$nodo = $_GET["n"];
$nombreAnterior = $_GET["p"];
$numPregunta = $_GET["np"];

function formularioRespuesta($n,$p){
	
	echo "<div class='contenedorPregunta'>";
	
	echo "<textarea id='nodo' name='nodo' form='formulario' placeholder='nombre' style='display:none;'>".$n."</textarea>";
	echo "<textarea id='nombreAnterior' name='nombreAnterior' form='formulario' placeholder='nombre' style='display:none;'>".$p."</textarea>";
			
	echo "<h2>¿Quien era tu personaje?</h2>";
	echo "<textarea id='nombre' name='nombre' form='formulario' placeholder='Ingrese el nombre'></textarea>";
	echo "<h2>Escribe una caracteristica distintiva de tu personaje ".$p."</h2>";
	echo "<textarea id='caracteristicas' name='caracteristicas' form='formulario' placeholder='Ingrese una caracteristicas'></textarea>";
	
	echo "<form action='crear.php' id='formulario' method='POST' >";
	echo "<button class='boton2' type='submit' name='ENVIAR'>Ingresar</button>";
	echo "</form>";
	
	echo "</div>";
	
}

if($respuesta == 0){
	
	session_start();			
	$nodosRepuesto =array();	
	
	
	if(isset($_SESSION['nodosRepuesto'])){
		$nodosRepuesto = $_SESSION['nodosRepuesto'];
		$tamano = count($nodosRepuesto);			
		
		if($tamano != 0){
		
			$nodoRevisar = array_pop($nodosRepuesto);	
			$_SESSION['nodosRepuesto']=$nodosRepuesto;  
		
			header("Location:index.php?n=".$nodoRevisar."&r=0&np=".$numPregunta."");	

		}
		
		else{
		
			formularioRespuesta($nodo,$nombreAnterior);
		}
	}
	
	else{
		
		formularioRespuesta($nodo,$nombreAnterior);
	}

}

else{

	$consulta = "INSERT INTO partida (personaje,acierto) VALUES('".$nombreAnterior."',TRUE);";
	mysqli_query($enlace, $consulta);

	session_start();		
	$arrayVacio =array();	
	
	if(isset($_SESSION['nodosRepuesto'])){
		$_SESSION['nodosRepuesto']=$arrayVacio;
	}
	echo "<h2>:)</h2>";
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

