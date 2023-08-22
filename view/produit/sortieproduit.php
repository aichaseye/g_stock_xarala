<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <div class="card border-dark">
                <div class="card-header bg-dark text-white">
                    <h5>Liste des sorties</h5>
                </div>
                <?php 
                if (isset($_GET['smssuccess'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>'.$_GET['smssuccess'].'</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }else if(isset($_GET['sms'])){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>'.$_GET['sms'].'</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            ?>
                <div class="card-body">
                <table class="table table-striped border-info">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($listesortie as $le) { ?>
                        <tr>
                            <td><?= $le['idsortie'] ?></td>
                            <td><?= $le['produit'] ?></td>
                            <td><?= $le['quantite'] ?></td>
                            <td>
                                <a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="/projetsPhp/xarala/GStockPVC/index.php?action=supprimersortie&id=<?= $le['idsortie'] ?>"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card border-dark">
                <div class="card-header bg-dark text-white">
                    <h5>Ajouter une sortie de produits</h5>
                </div>
                <form action="/projetsPhp/xarala/GStockPVC/index.php?action=ajoutsortie" method="post">
                <div class="card-body">
                        <div class="form-group">
                            <label>Produit</label>
                            <select name="produit" class="form-control">
                                <?php foreach($liste as $p){ ?>
                                    <option value="<?= $p['libelle'] ?>"><?= $p['libelle'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label>Quantité</label>
                            <input type="number" required class="form-control" name="quantite">
                        </div>
                        <div class="form-group mt-4 text-center">
                            <button class="btn btn-success" name="ajouter">Enregistrer</button>
                            <button class="btn btn-danger" type="reset">Annuler</button>
                        </div>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>