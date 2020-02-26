<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "av2levi";
$mysqli = new mysqli($host, $usuario, $senha, $bd);
$consulta = "select * from cadastro LIMIT 10";

$con = $mysqli->query($consulta) or die($mysqli->error);

while($resultado = mysqli_fetch_assoc($con)){
    $list[] = array_map('utf8_encode', $resultado); 
}

 echo json_encode($list);
?>