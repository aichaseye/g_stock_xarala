<div class="container mt-5">
    <div class="row">
        <div class="card border-dark">
            <div class="card-header bg-dark text-white">
                <span class="h5">Detail produit</span>
            </div>
            <div class="card-body">
                <dl class="row-md jh-entity-details">
                <dt><span>ID</span></dt>
                <?php
                ?>
                <dd>
                    <span></span>
                <span>{{ apprenant.id }}</span>
                </dd>
                <dt><span>Matricule App</span></dt>
                <dd>
                <span>{{ apprenant.matriculeApp }}</span>
                </dd>
                <dt><span>Nom</span></dt>
                <dd>
                <span>{{ apprenant.nom }}</span>
                </dd>
                <dt><span>Prenom</span></dt>
                <dd>
                <span>{{ apprenant.prenom }}</span>
                </dd>
                <dt><span>Sexe</span></dt>
                <dd>
                <span>{{ apprenant.sexe }}</span>
                </dd>
                <dt><span>Telephone</span></dt>
                <dd>
            <span>{{ apprenant.telephone }}</span>
            </dd>
            <dt><span>Email</span></dt>
            <dd>
            <span>{{ apprenant.email }}</span>
            </dd>
            <dt><span>Chef Etablissement</span></dt>
            <dd>
            <div *ngIf="apprenant.chefEtablissement">
                <a [routerLink]="['/chef-etablissement', apprenant.chefEtablissement?.id, 'view']">{{
                apprenant.chefEtablissement?.nomPrenom
                }}</a>
            </div>
            </dd>
            <dt><span>Etablissement</span></dt>
            <dd>
            <div *ngIf="apprenant.etablissement">
                <a [routerLink]="['/etablissement', apprenant.etablissement?.id, 'view']">{{ apprenant.etablissement?.typeEtab }}</a>
            </div>
            </dd>
            </dl>
        
        </div>
    </div>
</div>