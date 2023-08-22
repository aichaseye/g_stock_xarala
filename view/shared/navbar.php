<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Gestion stock</title>
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-info" style="color:white">
    <div class=" dropdown text-white">
        <p style="margin-top:10px; margin-left:5px; font-size: 20px;"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i   class="fa fa-user-circle"></i>
            <?= $_SESSION['prenom']." ".$_SESSION['nom'] ?>
        </p>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
                <a style="color: red;" class="dropdown-item" href="/projetsPhp/xarala/GStockPVC/index.php?action=deconnexion"> <i class="fa fa-sign-out"> </i> deconnexion</a>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse" style="margin-left: 55%;" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link active" href="/projetsPhp/xarala/GStockPVC/index.php?view=listeproduit"> <i class="fa fa-home"> </i> Accueil</a>
        <!-- <i class="fa fa-long-arrow-down"> </i>  -->
        <a class="nav-item nav-link active" href="/projetsPhp/xarala/GStockPVC/index.php?view=entreeproduit"> Gestion des Entrées </a>  
        <!-- <i class="fa fa-long-arrow-up"> </i>    -->
        <a class="nav-item nav-link active" href="/projetsPhp/xarala/GStockPVC/index.php?view=sortieproduit"> Gestion des Sorties </a>
    </div>

  </div>
</div>
</nav>

</body>
</html>