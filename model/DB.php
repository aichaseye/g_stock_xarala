<?php
class DB{
    private $user = "root";
    private $pass = "";
    private $host = "127.0.0.1" ;
    private $dbName = "xarala_gestion_stock";
    
    public $ds;
    
    public function __construct() {
        $conn = ("mysql:host=$this->host;dbname=$this->dbName;charset=utf8");
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->ds=new PDO($conn,$this->user,$this->pass,$options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>