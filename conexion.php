<?php

$mysql_host = "localhost";


$mysql_usuario = "root";
$mysql_passwd = "Hortiz34";

$mysql_bd = "javinator";

$enlace = mysqli_connect($mysql_host, $mysql_usuario, $mysql_passwd, $mysql_bd);


if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

mysqli_set_charset($enlace,"utf8");

?>
