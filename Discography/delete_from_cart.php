<?php

include 'conn.php';

$id = $_GET['idCart'];

$sql = "DELETE FROM cart WHERE id = :id";


$stmt = $pdo->prepare($sql);

$stmt->bindParam(':idCart', $id);

$stmt->execute();


header("Location:cart.php");

?>