<?php
require "connexion.php";
include "header.php";

$voiture = ['marque' => '', 'modele' => '', 'matricule' => ''];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM voitures WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $voiture = $query->fetch(PDO::FETCH_ASSOC);

    if (!$voiture) {
        die("Aucune voiture trouvée !");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marque = strip_tags($_POST['marque']);
    $modele = strip_tags($_POST['modele']);
    $matricule = strip_tags($_POST['matricule']);

    $sql = "UPDATE voitures SET marque=:marque, modele=:modele, matricule=:matricule WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindValue(':marque', $marque, PDO::PARAM_STR);
    $query->bindValue(':modele', $modele, PDO::PARAM_STR);
    $query->bindValue(':matricule', $matricule, PDO::PARAM_STR);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une voiture</title>
</head>
<body>

    <form class="form-control w-25 mx-auto mt-3 py-3" method="post">
    <h2>Modifier la voiture</h2>
    <label class="form-label mb-3">Marque :</label>
    <input class="form-control" type="text" name="marque" value="<?= $voiture['marque'] ?>" required>

    <label class="form-label mb-3">Modèle :</label>
    <input class="form-control" type="text" name="modele" value="<?= $voiture['modele'] ?>" required>

    <label class="form-label mb-3">Matricule :</label>
    <input class="form-control mb-3" type="text" name="matricule" value="<?= $voiture['matricule'] ?>" required>

    <button type="submit" class="btn btn-primary w-100">Modifier</button>
</form>

</body>
</html>
