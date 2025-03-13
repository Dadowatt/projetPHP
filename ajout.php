<?php
include 'header.php';

if(isset($_POST['modele']) && !empty($_POST['modele'])
&& isset($_POST['marque']) && !empty($_POST['marque'])
&& isset($_POST['matricule']) && !empty($_POST['matricule'])){
    include 'connexion.php';
    $marque=strip_tags($_POST['modele']);
    $modele=strip_tags($_POST['marque']);
    $matricue=strip_tags($_POST['matricule']);

    $sql = "INSERT INTO voitures( 'modele', 'marque', 'matricule') VALUES(':modele', ':marque', ':matricule')";

    $requete = $conn->prepare($sql);

    $requete->bindValue(':modele',$modele,PDO::PARAM_STR);
    $requete->bindValue(':marque',$marque,PDO::PARAM_STR);
    $requete->bindValue(':matricule',$matricule,PDO::PARAM_STR);
    $requete->execute();
    header('location:index.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" class="form-control w-25 mx-auto mt-5">
    <h1>ajouter une voiture</h1>
  <div class="mb-3">
    <label class="form-label">Modèle</label>
    <input type="text" name="modele" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Marque</label>
    <input type="text" name="marque" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Matricule</label>
    <input type="text" name="matricule" class="form-control">
  </div>
  <a href="index.php" class="btn btn-primary w-100">Ajouter</a>
</form>
</body>
</html>