<div id="editConducteur" class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" placeholder="prenom" class="form-control" id="prenom" name="prenom" value="<?= $_GET['prenom'] ?>">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" placeholder="nom" class="form-control" id="nom" name="nom" value="<?= $_GET['nom'] ?>">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo conducteur</label>
            <input class="form-control" type="file" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-light">Modifier ce conducteur</button>
    </form>
</div>