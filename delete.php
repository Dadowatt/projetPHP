<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    include "connexion.php";
    $id=strip_tags($_GET['id']);
    $sql = "DELETE FROM voitures WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    header('location:index.php');
}
?>