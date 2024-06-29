<?php
$propertiesArray = parse_ini_file('../config/config.ini', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modeste VTC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=$propertiesArray['dir'] ?>vtc/ressources/css/style.css">
</head>
<body>
      <nav class="navbar navbar-expand-lg bg-light sticky-top id="up"">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?=$propertiesArray['dir'] ?>vtc/index.php"><img src="<?=$propertiesArray['dir'] ?>vtc/ressources/<?=$propertiesArray['logo'] ?>" alt="" width="150"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="<?=$propertiesArray['dir'] ?>vtc/index.php">Association</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=$propertiesArray['dir'] ?>vtc/view/conducteur.php">Conducteur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?=$propertiesArray['dir'] ?>vtc/view/vehicule.php">Vehicule</a>
              </li>
            </ul>
          </div>
          <div class="collapse navbar-collapse admin" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=$propertiesArray['dir'] ?>vtc/view/admin.php">Admin</a>
              </li>
            </ul>
          </div>
          </div>
      </nav>
      