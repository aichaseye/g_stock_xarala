<?php
require_once 'DB.php';

class UserModel{
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function inserer($prenom, $nom, $username, $mdp){
        $req = "INSERT INTO user(prenom, nom, username, mdp) VALUES(?, ?, ?, ?)";
        $query = $this->db->ds->prepare($req);
        return $query->execute(array($prenom, $nom, $username, $mdp));
    }

    public function userNameExist($username){
        $req = "SELECT * FROM user WHERE username = ? ";
        $query = $this->db->ds->prepare($req);
        $query->execute(array($username));
        return $query->rowCount();
    }

}
?>