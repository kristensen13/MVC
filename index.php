<?php
require_once("db/ConexionPDO.php");
require_once("core/View.php");
//index.php?controlador=personas&accion=listarEdad

if(isset($_GET['controlador']))
{
  //ucfirst transforma la primer letra en mayuscula
  $controlador = ucfirst($_GET['controlador'])."_controlador"; //Personas_controlador
  $ruta_controlador = "controlador/".$controlador.".php";// controlador/Personas_controlador.php
  //Comprobamos que el archivo exista realmente
  if(!is_file($ruta_controlador))
  {
     $ruta_controlador = "controlador/Personas_controlador.php";
     $controlador = "Personas_controlador";
  }
}
else
{
  $ruta_controlador = "controlador/Personas_controlador.php";
  $controlador = "Personas_controlador";
}
//Cargamos el archivo controlador
require_once($ruta_controlador); 
//Y creamos un objeto del controlador para usarlo
$objetoControlador = new $controlador();
//Ahora recuperamos la accion de la URL
if(isset($_GET['accion']))
{
  $accion = $_GET['accion']; //listarEdad  
  //Tenemos que comprobar que la accion sea una funcion real del controlador
  if(!is_callable(array($controlador,$accion)))
  {
    $accion = 'listarAll';
  } 
}
else
{
  $accion = 'listarAll';
}
if(isset($_GET['id']))
{
  $objetoControlador->$accion($_GET['id']);
}
else{
  $objetoControlador->$accion();
}