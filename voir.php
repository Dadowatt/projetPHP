
<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    include 'header.php';
    include 'connexion.php';
    $id=strip_tags($_GET['id']);
    $sql = "select * from voitures where id=:id";
    $query = $conn->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $voitures = $query->fetch();
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
<div class="card mx-auto" style="width: 18rem;">
  <img src="https://media.istockphoto.com/id/2013848057/photo/amalfi-coast-from-salerno-italy-at-dusk.jpg?s=2048x2048&w=is&k=20&c=IcKM7IIgdqXsbLmFGMhn72zvyuKYCFUG0nPLl4tfb5U=" class="card-img-top" alt="...">

  <div class="card-body">
    <h5 class="card-title">Id: <?= $voitures['id'] ?></h5>
    <h5 class="card-title">Marque: <?= $voitures['marque'] ?></h5>
    <h5 class="card-title">Modèle: <?= $voitures['modele'] ?></h5>
    <h5 class="card-title">Matricule: <?= $voitures['matricule'] ?></h5>
    <a href="index.php" class="btn btn-primary">retour</a>
  </div>
</div>
</body>
</html>