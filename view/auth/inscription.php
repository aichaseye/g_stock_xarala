<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 mt-5">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <h2>Formulaire d'inscription</h2>
                    </div>
                    <form action="/projetsPhp/xarala/GStockPVC/index.php?action=inscription" method="post">
                    <div class="card-body">
                    <?php 
                        if (isset($_GET['sms'])) {
                            echo    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>'.$_GET['sms'].'</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                        }
                    ?>
                        <div class="form-group mt-1">
                            <label><h5>First name</h5></label>
                            <input type="text" required class="form-control" placeholder="First name..." name="prenom">
                        </div>
                        <div class="form-group mt-4">
                            <label><h5>Last name</h5></label>
                            <input type="text" required class="form-control" placeholder="Last name..." name="nom">
                        </div>
                        <div class="form-group mt-4">
                            <label><h5>Username</h5></label>
                            <input type="text" required class="form-control" placeholder="Username..." name="username">
                        </div>
                        <div class="form-group mt-4">
                            <label><h5>Password</h5></label>
                            <input type="password" required class="form-control" placeholder="password..." name="mdp">
                        </div>
                        <div class="form-group mt-4">
                            <label><h5>Confirm password</h5></label>
                            <input type="password" required class="form-control" placeholder="Confirm password..." name="mdpConfirm">
                        </div>
                        <div class="form-group mt-4 text-center">
                            <button class="btn btn-success" name="inscription">Envoyer</button>
                            <button class="btn btn-danger" type="reset">Annuler</button>
                        </div>
                    </div>
                    </form>
                    <div class="card-footer text-center">
                        <p> Vous avez déja un compte <a href="/projetsPhp/xarala/GStockPVC/index.php">Connexion</a></p>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>

