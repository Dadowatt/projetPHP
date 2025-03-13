<?php
include "connexion.php";
include "header.php";
require_once "nav.php";

$sql= "select * from voitures";
$query = $conn->prepare($sql);
$query->execute();
$voitures=$query->fetchAll(PDO::FETCH_ASSOC);
 ?>

<table class="table table-bordered w-75 mx-auto mt-5">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">matricule</th>
      <th scope="col">modele</th>
      <th scope="col">marque</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($voitures as $voiture){

    ?>
    <tr>
      <th scope="row"><?= $voiture['id'] ?></th>
      <td><?= $voiture['marque'] ?></td>
      <td><?= $voiture['modele'] ?></td>
      <td><?= $voiture['matricule'] ?></td>
      <td>
        <a class="btn btn-warning" href="voir.php?id=<?= $voiture['id'] ?>"><i class="bi bi-eye-fill"></i></a>
        <a class="btn btn-success" href="update.php?id=<?= $voiture['id'] ?>"><i class="bi bi-pencil-square"></i></a>
        <a class="btn btn-danger" href="delete.php?id=<?= $voiture['id'] ?>"><i class="bi bi-trash"></i></a>
      </td>
    </tr>
    <?php
    }
    ?>

  </tbody>
</table>