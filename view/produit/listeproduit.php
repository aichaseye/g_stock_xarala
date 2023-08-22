<div class="container mt-5">
    <div class="row">
        <div class="card border-dark">
            <div class="card-header bg-dark text-white">
                <span class="h5">Liste des produits disponibles</span>
                <span style="margin-left: 55%;"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Nouneau<i class="fa fa-plus-circle"></i></button></span>
            </div>
            <?php 
                if (isset($_GET['smssuccess'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>'.$_GET['smssuccess'].'</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }else if(isset($_GET['smsdanger'])){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>'.$_GET['smsdanger'].'</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            ?>
            <div class="card-body">
            <table class="table table-striped border-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Libelle  </th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($liste as $p) { ?>
                        <tr>
                            <td><?= $p['idproduit'] ?></td>
                            <td><?= $p['libelle'] ?></td>
                            <td><?= $p['categorie'] ?></td>
                            <td><?= $p['stock'] ?></td>
                            <td>
                                <a  href="/projetsPhp/xarala/GStockPVC/index.php?view=modifier&id=<?= $p['idproduit'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a  href="/projetsPhp/xarala/GStockPVC/index.php?view=detail&id=<?= $p['idproduit'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="/projetsPhp/xarala/GStockPVC/index.php?action=supprimer&id=<?= $p['idproduit'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
            </div>
        </div>
    </div>
<!-- ajout produit -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="/projetsPhp/xarala/GStockPVC/index.php?action=ajoutproduit" method="post">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
      </div>
      <div class="modal-body">
            <div class="form-group mt-4">
                <label>Libelle</label>
                <input type="text" class="form-control" name="libelle">
            </div>
            <div class="form-group mt-4">
                <label>Catégorie</label>
                <select name="categorie" class="form-control">
                    <option value="Alimentaire">Alimentaire</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Mecanique">Mécanique</option>
                    <option value="Electronique">Electronique</option>
                </select>
            </div>
            <div class="form-group mt-4">
                <label>Quantité</label>
                <input type="number" class="form-control" name="stock">
            </div>
      </div>
      <div class="modal-footer mt-4">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="ajouter" class="btn btn-success">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
