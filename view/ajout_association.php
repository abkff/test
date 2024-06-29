<div class="container">
    <form method="post" action="">
        <label for="">Conducteur</label><br>

        <?php
        $KO = 0;
        //boucle génération du select conducteur
        if ($listeConduc != null) {
            echo "<select name='conducteur' id=''>";
            foreach ($listeConduc as $liste) {

                echo "<option value='" . $liste['id'] . "'>" . $liste['prenom'] . " " . $liste['nom'] . "</option>";
            }
        } else {
            echo "<select disabled>";
            echo "<option value='vide'>Pas de conducteur disponible</option>";
            $KO++;
        }

        ?>
        </select><br>
        <label for="">Vehicule</label><br>

        <?php
        //boucle génération du select vehicule
        if ($listevehicule != null) {
            echo " <select name='vehicule' id=''>";
            foreach ($listevehicule as $liste) {
                echo "<option value='" . $liste['id'] . "'>" . $liste['marque'] . " " . $liste['modele'] . "</option>";
            }
        } else {
            echo "<select disabled>";
            echo "<option value='vide'>Pas de vehicule disponible</option>";
            $KO++;
        }
        ?>
        </select><br>
        <?php
        //bloquage du bouton d'association si l'un des deux select est vide
        if ($KO == 0) {
            echo "<button type='submit' class='btn btn-light'>Ajouter cette association</button>";
        } else {
            echo "<button type='submit' class='btn btn-light' disabled>Ajouter cette association</button>";
        }
        ?>
    </form>
</div>