<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);

if ((isset($_SESSION['prenom'])) && (isset($_SESSION['iduser'])) ) {
    require_once 'controller/ProduitController.php';
    $ctrl = new ProduitController();
    $ctrl->viewManager();

}elseif (isset($_POST['inscription']) && $_GET['action'] == "inscription") {
    // echo $_POST['mdp'];
    require_once 'controller/ProduitController.php';
    $ctrl = new ProduitController();
    $ctrl->viewManager();

}elseif (isset($_POST['connexion'])) {
    require_once 'controller/ProduitController.php';
    $ctrl = new ProduitController();
    $ctrl->viewManager();

}elseif (isset($_GET['sms'])) {
    // echo $_POST['mdp'];
    require_once 'controller/ProduitController.php';
    $ctrl = new ProduitController();
    $ctrl->viewManager();
}
// elseif ( isset($_GET['sms']) && $_GET['action']=='connexion'){
//     $sms = "zzz";
//     header('Location:/Xarala/G_StockPOO/view/auth/login.php&sms='.$sms);

// }
else{

    header('Location:/projetsPhp/xarala/GStockPVC/view/auth/login.php');
}

  

?>