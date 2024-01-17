<div>
    <p> <?= isset($search)?'Recherche par '.$search:'' ?></p>
<table class="table table-striped w-75 mx-auto" id='table'>
    <thead>
        <th>ISBN</th>
        <th>Titre</th>
        <th>Theme</th>
        <th>Nombre de pages</th>
        <th>Format</th>
        <th>Nom de l'auteur</th>
        <th>Prénom</th>
        <th>Éditeur</th>
        <th>Année d'édition</th>
        <th>Prix</th>
        <th>Langue</th>
        <th scope="col" colspan="3">Actions</th>
    </thead>
    <?php  foreach($livre as $l ): ?>
    <tr>
        <td><?=$l->ISBN?></td>
        <td><?=$l->Titre_livre?></td>
        <td><?=$l->Theme_livre?></td>
        <td><?=$l->Nbr_pages_livre?></td>
        <td><?=$l->Format_livre?></td>
        <td><?=$l->Nom_auteur?></td>
        <td><?=$l->Prenom_auteur?></td>
        <td><?=$l->Editeur?></td>
        <td><?=$l->Annee_edition?></td>
        <td><?=$l->Prix_vente?></td>
        <td><?=$l->Langue_livre?></td>
       
        youyou ! <td><a href="" class="btn btn-warning"><i class=" bi bi-pencil-fill"></i></a></td>

    </tr>
    <?php endforeach; ?>
</table>
</div>            
              