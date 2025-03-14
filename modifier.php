<?php
require "connexion.php";
include "header.php";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM voitures WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $voiture = $query->fetch();
}
?>

<?php
if(isset($_POST['id']) && !empty($_POST['id']) &&
   isset($_POST['marque']) && !empty($_POST['marque']) &&
   isset($_POST['modele']) && !empty($_POST['modele']) &&
   isset($_POST['matricule']) && !empty($_POST['matricule'])) {
  
        $id=strip_tags($_POST['id']);
        $marque=strip_tags($_POST['marque']);
        $modele=strip_tags($_POST['modele']);
        $matricule=strip_tags($_POST['matricule']);
    
        $sql = "UPDATE voitures SET marque = :marque, modele = :modele, matricule = :matricule WHERE id = :id";
    
        $query = $conn->prepare($sql);

        $query->bindValue(':marque',$marque,PDO::PARAM_STR);
        $query->bindValue(':modele',$modele,PDO::PARAM_STR);
        $query->bindValue(':matricule',$matricule,PDO::PARAM_STR);
        $query->execute();
        
        header('location:index.php');
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

    <form method="post" class="form-control w-25 mx-auto mt-3 py-3">
    <h2>Modifier la voiture</h2>
    <input type="hidden" name="id" value="<?= $voiture['id'] ?>">
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
