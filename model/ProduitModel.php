<?php
require_once 'DB.php';

class ProduitModel{
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function verifyUserExist($username, $mdp){
        $req = "SELECT * FROM user WHERE username = ? and mdp = ?";
        $query = $this->db->ds->prepare($req);
        $query->execute(array($username, $mdp));
        return $query->rowCount();
    }

    public function getWhoConnect($username, $mdp){
        $req = "SELECT * FROM user WHERE username = ? and mdp = ?";
        $query = $this->db->ds->prepare($req);
        $query->execute(array($username, $mdp));
        return $query->fetch();
    }

    public function lister(){
        $req = "SELECT * FROM produit";
        $query = $this->db->ds->prepare($req);
        $query->execute();
        return $query->fetchAll();
    }


    public function inserer($libelle, $stock, $categorie){
        $req = "INSERT INTO produit(libelle, stock, categorie) VALUES(?, ?, ?)";
        $query = $this->db->ds->prepare($req);
        return $query->execute(array($libelle, $stock, $categorie));
    }

    public function findProduitByName($produit){
        $p = "SELECT * FROM produit WHERE libelle = ?";
        $query = $this->db->ds->prepare($p);
        $query->execute(array($produit));
        return $query->fetch();
    }

    public function findProduitById($idproduit){
        $p = "SELECT * FROM produit WHERE idproduit = ?";
        $query = $this->db->ds->prepare($p);
        $query->execute(array($idproduit));
        return $query->fetch();
    }

    public function editProduit($libelle, $stock, $categorie, $idproduit){
        // $p = $this->findProduitById($idproduit);
        $sql = "UPDATE produit SET libelle = ?, stock = ?, categorie = ? WHERE idproduit = ?";
        $query = $this->db->ds->prepare($sql);
        return $query->execute(array($libelle, $stock, $categorie, $idproduit));
    }

    public function insererEntree($produit, $quantite){
        $p = $this->findProduitByName($produit);
        $p['stock'] = $p['stock'] + $quantite;
        $this->editProduit($p['libelle'], $p['stock'], $p['categorie'], $p['idproduit']);
        $req = "INSERT INTO entree(produit, quantite) VALUES(?, ?)";
        $query = $this->db->ds->prepare($req);
        return $query->execute(array($produit, $quantite));
    }

    public function insererSortie($produit, $quantite){
        $p = $this->findProduitByName($produit);
        // echo $p['stock'];
        // var_dump($p);
        if ($p['stock'] >= $quantite) {
            $p['stock'] = $p['stock'] - $quantite;
            echo $p['stock'];
            $this->editProduit($p['libelle'], $p['stock'], $p['categorie'],$p['idproduit']);
            $req = "INSERT INTO sortie(produit, quantite) VALUES(?, ?)";
            $query = $this->db->ds->prepare($req);
            return $query->execute(array($produit, $quantite));
        }else {
            $sms = 'Impossible !!! Car votre stock maximal de '.$p['libelle'].' est de : '.$p['stock'];
            header('Location:/projetsPhp/xarala/index.php?view=sortieproduit&sms='.$sms);
        }
        
        
    }

    public function supprimer($id){
        $req = "DELETE FROM produit where idproduit =:id";
        $query = $this->db->ds->prepare($req);
        $query->bindValue(":id",$id);
        return $query->execute();
    }


}
?>