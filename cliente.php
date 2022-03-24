<?php
require_once "lib/nusoap.php";
$cliente = new nusoap_client("http://localhost/Practica4_JGMP/server.php");
$error = $cliente->getError();
if($error){
	echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
$result = $cliente->call("getAlumnos", array("datos" => "Alumnos"));
$resu = $cliente->call("getPaises", array("datos" => "Paises"));
$fruti = $cliente->call("getFrutas", array("kilos" => "Frutas"));
if($cliente->fault){//checamos una falla al metodo de llamar al metodo
	echo "<h2>fault</h2><pre>";
	print_r($result);
	print_r($resu);
	print_r($fruti);
	echo "</pre>";
}
else{//No hay error al llamar el metodo
	$error = $cliente->getError();
	if($error){
		echo "<h2>Error</h2><pre>" . $error . "</pre>";
	}
	else{
		echo "<h2>ALUMNOS</h2><pre>";
		echo $result;
		echo "<h2>PAISES</h2><pre>";
		echo $resu;
		echo "<h2>Frutas</h2><pre>";
		echo $fruti;
		echo "</pre>";
	}
}
?>