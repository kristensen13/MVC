<?php
require_once("modelo/Personas_modelo.php");
class Personas_controlador
{
  private $personas_modelo;
  private $vista;

  public function __construct()
  {
    $this->personas_modelo = new Personas_modelo();
    $this->vista = new View();
  }

  public function listarAll()
  {
    $datos = $this->personas_modelo->getPersonas();
    //Ahora inserto la vista
    $this->vista->show("personas_vista",['datos' => $datos]);
    //require_once("vistas/personas_vista.php");
  }
  public function listar(int $id)
  {
    $datos[] = $this->personas_modelo->getPersona($id);

    $this->vista->show("personas_vista",['datos' => $datos]);
  }
  //peticion get para crear nueva personas_vista
  public function nuevo()
  {
    $this->vista->show("personas_nuevo_vista");
  }
  //peticion POST para insertar nueva persona
  public function insertar()
  {
    $nombre =  (!empty($_POST['nombre']))?$_POST['nombre']:null;
    $edad = (int) (!empty($_POST['edad']))?$_POST['edad']:null;
    $estatura = (float) (!empty($_POST['estatura']))?$_POST['estatura']:null;
    $this->personas_modelo->insertarPersona($nombre, $edad, $estatura);   
    header("Location: index.php?controlador=personas&accion=listarAll");
    die();
  }
  //solicitud get para abrir formulario para editar
  public function editar(int $id)
  {
    $persona = $this->personas_modelo->getPersona($id);
    $this->vista->show("personas_nuevo_vista", ['persona' => $persona]);
  }
  //solicitud post para guardar lo editado
  public function actualizar(int $id)
  {
    
    $nombre =  (!empty($_POST['nombre']))?$_POST['nombre']:null;
    $edad = (int) (!empty($_POST['edad']))?$_POST['edad']:null;
    $estatura = (float) (!empty($_POST['estatura']))?$_POST['estatura']:null;
    $this->personas_modelo->actualizarPersona($id, $nombre, $edad, $estatura);
    header("Location: index.php?controlador=personas&accion=listarAll");
    die();
  }
 
  //solicitud para borrar la tabla
  public function borrar(int $id)
  {
    $this->personas_modelo->borrar($id);
    header("Location: index.php?controlador=personas&accion=listarAll");
    die();
  }
 
}