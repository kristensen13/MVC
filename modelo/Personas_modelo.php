<?php
class Personas_modelo
{
    private $dbh;

    public function __construct()
    {
        $pdo = ConexionPDO::getInstancia();
        $this->dbh = $pdo->getConexion();
    }
    public function getPersonas():array
    {
        $stmt = $this->dbh->prepare('SELECT * FROM personas');
        $stmt->execute();
        $personas = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $personas;
    }
    public function getPersona(int $id):object
    {
         $stmt = $this->dbh->prepare('SELECT * FROM personas WHERE id=:id');
         $stmt->bindParam(':id',$id);
         $stmt->execute();
         $persona = $stmt->fetch(PDO::FETCH_OBJ);
         return $persona;
    }
    public function insertarPersona(string $nombre, int $edad, float $estatura)
    {
      $stmt =  $this->dbh->prepare("INSERT INTO personas(nombre,edad,estatura) VALUES (:nombre,:edad,:estatura)");
      $stmt->execute(array(':nombre' => $nombre, ':edad' => $edad, ':estatura' => $estatura));

    }
    public function actualizarPersona(int $id, string $nombre, int $edad, float $estatura)
    {
      $stmt =  $this->dbh->prepare("UPDATE personas SET nombre=:nombre, edad=:edad, estatura=:estatura WHERE id=:id");
      $stmt->execute(array(':id' => $id, ':nombre' => $nombre, ':edad' => $edad, ':estatura' => $estatura));

    }
    public function borrar(int $id)
    {
        $stmt = $this->dbh->prepare("DELETE FROM personas WHERE id=:id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
}