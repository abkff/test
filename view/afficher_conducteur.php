<?php
$propertiesArray = parse_ini_file('../config/config.ini', true);
?>
<div class="container table-responsive-sm">
    <table class="table tableau">
        <thead>
            <tr>
                <hr>
                <th scope="col">id_conducteur</th>
                <th scope="col">Photo</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Editer</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody class="table-group-divider tableSeparator">

            <?php
            //boucle d'affichage des conducteurs
            foreach ($conduc as $value) {
                echo "<tr>\n";
                echo "<td scope='row'>" . $value['id'] . "</td>\n";
                if (!file_exists("../public/" . $value['photo'])) {
                    echo "<td><img class='photo-conducteur' src='".$propertiesArray['dir'] ."vtc/ressources/nophoto.jpg' alt=''></td>\n";
                } elseif ($value['photo'] != "") {
                    echo "<td><img class='photo-conducteur' src='".$propertiesArray['dir'] ."vtc/public/" . $value['photo'] . "' alt=''></td>\n";
                } else {
                    echo "<td><img class='photo-conducteur' src='".$propertiesArray['dir'] ."vtc/ressources/nophoto.jpg' alt=''></td>\n";
                }
                echo "<td>" . $value['prenom'] . "</td>\n";
                echo "<td>" . $value['nom'] . "</td>\n";
                echo "<td><a href='?action=edit&id=" . $value['id']  .  "&prenom=" . $value['prenom'] . "&nom=" . $value['nom'] . "#editConducteur'><i class='fa-solid fa-pen'></a></td>\n";
                echo "<td><button type='button' class='btn btn-link suppressButton' data-bs-toggle='modal' data-bs-target='#deleteModal' value='" . $value['id'] . "'><i class='fa-solid fa-x'></i></button></a></td>\n";
                echo "</tr>\n";
            }
            ?>
        </tbody>
    </table>
</div>

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