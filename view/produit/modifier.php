<div class="container mt-5">
    <div class="row">
        <div class="card border-dark">
            <div class="card-header bg-dark text-white">
                <span class="h5">Formulaire de modification</span>
            </div>
            <div class="card-body">
            <form action="/projetsPhp/xarala/GStockPVC/index.php?action=modifierproduit" method="post">
                    <input type="hidden" name="idproduit" value="<?= $_GET['id']?>">

                    <div class="form-group mt-4">
                    <label>Libelle</label>
                    <input type="text" class="form-control" value="<?= $p['libelle'] ?>" name="libelle">
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
                    <input type="number" value="<?= $p['stock'] ?>" class="form-control" name="stock">
                </div>
                </div>
                <div class="modal-footer mt-4">
                <button type="reset" class="btn btn-danger">Annuler</button>
                <button type="submit" name="modifier" class="btn btn-success">Modifier</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>