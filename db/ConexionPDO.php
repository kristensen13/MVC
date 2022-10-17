<?php
require_once('config_db.php');
class ConexionPDO
{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $conn;
    private static $instancia;

    private function __construct()
    {
        $this->host = HOST;
        $this->user = USER;
        $this->pass = PASS;
        $this->db = BD;
        try
        {
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            
        }
    }
    //Patron singleton
    public static function getInstancia()
    {
        if(!isset(self::$instancia))
        {
            $clase = __CLASS__;
            self::$instancia = new $clase();
            
        }
        return self::$instancia;
    
    }
    public function getConexion()
    {
       return $this->conn;
    }
    public function cerrarConexion()
    {
        $this->conn = null;
    }

}