<?php
require_once 'model/ProduitModel.php';
require_once 'model/EntreeModel.php';
require_once 'model/SortieModel.php';
require_once 'model/UserModel.php';

class ProduitController{
    private $proModel;
    private $entreeModel;
    private $sortieModel;
    private $userModel;

    public function __construct(){
        $this->proModel = new ProduitModel();
        $this->entreeModel = new EntreeModel();
        $this->sortieModel = new SortieModel();
        $this->userModel = new UserModel();
    }

    public function viewManager(){
        $view = isset($_GET['view']) ? $_GET['view'] : null;
        switch ($view) {
            case 'listeproduit':
                $this->includeView($view);
                break;
            case 'entreeproduit':
                $this->includeView($view);
                break;
            case 'sortieproduit':
                $this->includeView($view);
                break;
            case 'inscription':
                $this->includeView($view);
                break;
            case 'modifier':
                $this->includeView($view);
                break;
            default:
                $this->viewLogin();
                break;
        }

        $action = isset($_GET['action']) ? $_GET['action'] : NULL;
        switch ($action) {
            case 'connexion':
                extract($_POST);
                $password = md5($password);
                $bool = $this->proModel->verifyUserExist($username, $password);
                if ($bool == 1) {
                    session_start();
                    $user = $this->proModel->getWhoConnect($username, $password);
                    $_SESSION['iduser'] = $user['iduser'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['nom'] = $user['nom'];
                    header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=listeproduit');
    
                }else {
                    $sms = "Nom d'utilisateur ou mot de passe incorrect";
                    header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=login&sms='.$sms);
                }

                break;

            case 'deconnexion':
                include 'view/auth/deconnexion.php';
                break;

            case 'ajoutproduit':
                if (isset($_POST['ajouter'])) {
                    extract($_POST);
                    $res = $this->proModel->inserer($libelle, $stock, $categorie);
                    if($res){
                        $smssuccess = "Enregistrement effectué avec succès";
                        header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=listeproduit&smssuccess='.$smssuccess);
                    }else {
                        $smsdanger = "Enregistrement non effectué";
                        header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=listeproduit&smsdanger='.$smsdanger);
                    }
                }
                break;

            case 'supprimer':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $res = $this->proModel->supprimer($id);
                    if($res){
                        $smssuccess = "Suppression effectuée avec succès";
                        header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=listeproduit&smssuccess='.$smssuccess);
                    }else {
                        $smsdanger = "Suppression non effectué";
                        header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=listeproduit&smsdanger='.$smsdanger);
                    }
                    
                }
                break;
                
            case 'ajoutentree':
                if (isset($_POST['ajouter'])) {
                    extract($_POST);
                    echo $produit;
                    $res = $this->proModel->insererEntree($produit, $quantite);
                    if ($res) {
                        header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=entreeproduit');
                    }else {
                        echo 'no';
                    }
                    
                }
                break;
            case 'ajoutsortie':
                if (isset($_POST['ajouter'])) {
                    extract($_POST);
                    $res = $this->proModel->insererSortie($produit, $quantite);
                    if ($res) {
                        $smssuccess = "Vous avez fait une sortie de ".$quantite." ".$produit;
                        header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=sortieproduit&smssuccess='.$smssuccess);
                    }   
                }
                break;
        
            case 'supprimerentree':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->entreeModel->supprimerentree($id);
                    header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=entreeproduit');
                }
                break;
            case 'supprimersortie':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->sortieModel->supprimersortie($id);
                    header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=sortieproduit');
                }
                break;

            case 'inscription':
                if (isset($_POST['inscription'])) {
                     extract($_POST);
                     
                     if ($mdp == $mdpConfirm) {
                         $mdp = md5($mdp);
                     $res = $this->userModel->userNameExist($username);
                        
                         if ($res == 0) {
                             echo 'oui';
                             $this->userModel->inserer($prenom, $nom, $username, $mdp);
                             $smssuccess = "Inscription réussi";
                             header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=login&smssuccess='.$smssuccess);
                         }
                else {
                            // echo 'no1';
                            $sms = "Votre nom d'utilisateur existe déja dans la BDD";
                            echo $usernameExist;
                            header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=inscription&sms='.$sms);
                        }   
                    }else {
                        echo 'no12';
                        $sms = "Les mots de passes de correspondent pas ";
                        header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=inscription&sms='.$sms);
                     }
                }
                echo 'bonjour';
                break;
            
            case 'modifierproduit':
                if (isset($_POST['modifier'])) {
                    extract($_POST);
                    $res = $this->proModel->editProduit($libelle, $stock, $categorie, $idproduit);
                    if($res){
                        $smssuccess = "Modification effectué avec succès";
                        header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=listeproduit&smssuccess='.$smssuccess);
                    }else {
                        $smsdanger = "Modification non effectué";
                        header('Location:/projetsPhp/xarala/GStockPVC/index.php?view=listeproduit&smsdanger='.$smsdanger);
                    }
                }
                break;
            
            case 'modifierentree':
                if (isset($_GET['id'])) {
                    echo 'bon';
                }
                break;    
            default:
                # code...
                break;
        }
    }


// 771495942 galass
    public function viewLogin(){
        include 'view/auth/login.php';
    }

    public function includeView($page="listeproduit"){

        if ($page == "listeproduit") {
            if (isset($_GET['id'])) {
                $p = $this->proModel->findProduitById($_GET['id']);
                $liste = $this->proModel->lister();
                include_once 'view/shared/navbar.php';
                include 'view/produit/'.$page.'.php';
            }else {
                $liste = $this->proModel->lister();
                include_once 'view/shared/navbar.php';
                include 'view/produit/'.$page.'.php';
            }
            

        }elseif ($page == "entreeproduit") {

            if (isset($_GET['id'])) {
                $e = $this->entreeModel->getEntreeById($_GET['id']);
                $liste = $this->proModel->lister(); // liste deroulante de produit
                $listeentree = $this->entreeModel->entreeproduit();
                include_once 'view/shared/navbar.php';
                include 'view/produit/'.$page.'.php';

            }else {
                $liste = $this->proModel->lister();
                $listeentree = $this->entreeModel->entreeproduit();
                include_once 'view/shared/navbar.php';
                include 'view/produit/'.$page.'.php';
            }
            

        }elseif ($page == "sortieproduit") {
            $liste = $this->proModel->lister();
            $listesortie = $this->sortieModel->sortieproduit();
            include_once 'view/shared/navbar.php';
            include 'view/produit/'.$page.'.php';

        }elseif($page == 'modifier' && isset($_GET['id'])){
            $p = $this->proModel->findProduitById($_GET['id']);
            include_once 'view/shared/navbar.php';
            include 'view/produit/'.$page.'.php';

        }elseif($page == "inscription"){
            include 'view/auth/'.$page.'.php';
        }
    }
}

?>