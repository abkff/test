<div id="editAssociation" class="container">
    <form method="post" action="">
        <label for="">Conducteur</label><br>
        <select name="conducteur" id="">
            <?php
            //boucle génération du select conducteur
            foreach ($listeConduc as $liste) {
                echo "<option value='" . $liste['id'] . "'";
                if ($liste['id'] == $_GET['conducteur']) {
                    echo "selected";
                }
                echo ">" . $liste['prenom'] . " " . $liste['nom'] . "</option>";
            }
            ?>
        </select><br>
        <label for="">Vehicule</label><br>
        <select name="vehicule" id="">
            <?php
            //boucle génération du select vehicule
            foreach ($listevehicule as $liste) {
                echo "<option value='" . $liste['id'] . "'";
                if ($liste['id'] == $_GET['vehicule']) {
                    echo "selected";
                }
                echo ">" . $liste['marque'] . " " . $liste['modele'] . "</option>";
            }
            ?>
        </select><br>
        <button type="submit" class="btn btn-light">Modifier cette association</button>
    </form>
</div>