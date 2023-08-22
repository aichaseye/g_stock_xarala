<?php
require_once 'DB.php';

class EntreeModel{
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function supprimerentree($id){
        $req = "DELETE FROM entree where identree =:id";
        $query = $this->db->ds->prepare($req);
        $query->bindValue(":id",$id);
        return $query->execute();
    }

    public function entreeproduit(){
        $req = "SELECT * FROM entree";
        $query = $this->db->ds->prepare($req);
        $query->execute();
        return $query->fetchAll();
    }

    public function getEntreeById($id){
        $p = "SELECT * FROM entree WHERE identree = ?";
        $query = $this->db->ds->prepare($p);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function editEntree($produit, $quantite, $identree){
        $sql = "UPDATE entree SET produit = ?, quantite = ? WHERE identree = ?";
        $query = $this->db->ds->prepare($sql);
        return $query->execute(array($produit, $quantite, $identree));
    }
}
?>



<!-- Dans ce projet nous avons gérer l'entrée et la sortie de produit dans le magasins tout en vérifiant toujours la quantité disponible en stock -->