<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <div class="card border-dark">
                <div class="card-header bg-dark text-white">
                    <h5>Les entrées en stock</h5>
                </div>
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
                        foreach($listeentree as $le) { ?>
                        <tr>
                            <td><?= $le['identree'] ?></td>
                            <td><?= $le['produit'] ?></td>
                            <td><?= $le['quantite'] ?></td>
                            <td>
                                <a href="/projetsPhp/xarala/GStockPVC/index.php?view=entreeproduit&id=<?= $le['identree'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="/projetsPhp/xarala/GStockPVC/index.php?action=supprimerentree&id=<?= $le['identree'] ?>"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                    <h5>Ajouter une entrée de produits</h5>
                </div>
                <form action="/projetsPhp/xarala/GStockPVC/index.php?action=ajoutentree" method="post">
                <div class="card-body">
                        <div class="form-group">
                            <label>Produit</label>
                            <select name="produit" class="form-control">
                                <?php foreach($liste as $p){ ?>
                                    <option > <?= $p['libelle'] ?>  </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mt-4">
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