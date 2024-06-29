<div class="container" >
  <table class="table tableau">
    <thead>
      <tr>
        <hr>
        <th scope="col">id_association</th>
        <th scope="col">Conducteur</th>
        <th scope="col">Vehicule</th>
        <th scope="col">Editer</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody class="table-group-divider tableSeparator">
      <?php
      //récupération des info vehicule
      $tableauVehicule = [];
      $vehicule  = new Vehicule();
      $listevehicule = $vehicule->read("vtc_vehicule");
      foreach ($listevehicule as $key => $value) {
        $tableauVehicule[$value['id']] = $value['marque'] . " " . $value['modele'];
      }
      //récupération des info conducteur
      $tableauConducteur = [];
      $conducteur  = new Conducteur();
      $listeConduc = $conducteur->read("vtc_conducteur");
      foreach ($listeConduc as $key => $value) {
        $tableauConducteur[$value['id']] = $value['prenom'] . " " . $value['nom'];
      }
      //boucle d'affichage des associations
      foreach ($asso as $value) {
        echo "<tr>\n";
        echo "<td scope='row'>" . $value['id'] . "</td>\n";
        echo "<td>" . $tableauConducteur[$value['conducteur']]  . "</p></td>\n";
        echo "<td>" . $tableauVehicule[$value['vehicule']]  . "</p></td>\n";
        echo "<td><a href='?action=edit&id=" . $value['id']  . "&conducteur=" . $value['conducteur'] . "&vehicule=" . $value['vehicule'] . "#editAssociation'><i class='fa-solid fa-pen'></i></a></td>\n";
        echo "<td><button type='button' class='btn btn-link suppressButton' data-bs-toggle='modal' data-bs-target='#deleteModal' value='" . $value['id'] . "'><i class='fa-solid fa-x'></i></button></a></td>\n";
        echo "</tr>\n";
      }
      ?>

      <!-- partie Modal confirmation suppression -->
      <form>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Etes vous sur de vouloir supprimer cet element ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">retour</button>
                <button type="button" class="btn btn-primary btn-danger" id='confirm'>Confirmer</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </tbody>
  </table>
</div>
<script src="../js/deleteModal.js"></script>