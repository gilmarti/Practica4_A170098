<?php
   require_once "lib/nusoap.php";
   function getAlumnos($datos){
   	if ($datos == "Alumnos") {
   		return join( array(
   			" JORGE GILBERTO MARTINEZ PEREZ <br/>",
   			" HIGINIO IVAN MARTINEZ LOPEZ <br/>",
   			" MAURICIO VAZQUEZ HERNANDEZ"));
   	}
   	else{
   		return "No hay Alumnos";
   	}
   }
   function getPaises($datos){
   	if($datos == "Paises"){
   		return join( array(
   			" Mexico <br/>",
   			" Canada <br/>",
   			" Japon <br/>",
   			" China"));
   	}
   	else{
   		return "No hay Paises";
   	}
   }
   function getFrutas($kilos){
   	if($kilos == "Frutas"){
   		return join( array(
   			" Manzana <br/>",
   			" Sandia <br/>",
   			" Mandarina <br/>",
   			" Platano"));
   	}
   }
   $server = new soap_server();//creamos instancia de SOAP
   $server -> register("getAlumnos");//Indica el metodo o funcion a devolver
   $server -> register("getPaises");
   $server -> register("getFrutas");
   if (!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
    $server -> service($HTTP_RAW_POST_DATA);
?>