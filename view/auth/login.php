<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>Login</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-md-6 offset-3 mt-5">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <h2>Authentification</h2>
                    </div>
                    <form action="/projetsPhp/xarala/GStockPVC/index.php?action=connexion" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label><h5>Username</h5></label>
                            <input type="text" required class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group mt-4">
                            <label><h5>Password</h5></label>
                            <input type="password" required class="form-control" placeholder="password" name="password">
                        </div>
                        <?php 
                            if (isset($_GET['sms'])) {
                                echo    '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>'.$_GET['sms'].'</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                                }
                        ?>
                        <div class="form-group mt-4 text-center">
                            <button class="btn btn-success" name="connexion">Se connecter</button>
                            <button class="btn btn-danger" type="reset">Annuler</button>
                        </div>
                    </div>
                    </form>
                    <div class="card-footer text-center">
                        <p> Vous n'avez pas de compte <a href="/projetsPhp/xarala/GStockPVC/view/auth/inscription.php">Inscription</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

