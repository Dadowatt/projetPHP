<?php
include "header.php";
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
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($voitures as $voiture){

    ?>
    <tr>
      <th scope="row"><?= $voiture['id'] ?></th>
      <td><?= $voiture['matricule'] ?></td>
      <td><?= $voiture['modele'] ?></td>
      <td><?= $voiture['marque'] ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>