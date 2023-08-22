<?php
require_once 'DB.php';

class SortieModel{
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function supprimersortie($id){
        $req = "DELETE FROM sortie where idsortie =:id";
        $query = $this->db->ds->prepare($req);
        $query->bindValue(":id",$id);
        return $query->execute();
    }

    public function sortieproduit(){
        $req = "SELECT * FROM sortie";
        $query = $this->db->ds->prepare($req);
        $query->execute();
        return $query->fetchAll();
    }

    public function getSortieById($id){
        $p = "SELECT * FROM sortie WHERE idsortie = ?";
        $query = $this->db->ds->prepare($p);
        $query->execute(array($id));
        return $query->fetch();
    }

    public function editSortie($produit, $quantite, $idsortie){
        $sql = "UPDATE sortie SET produit = ?, quantite = ? WHERE idsortie = ?";
        $query = $this->db->ds->prepare($sql);
        return $query->execute(array($produit, $quantite, $idsortie));
    }


}
?>