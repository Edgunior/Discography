<?php
include 'conn.php';

$idVinyl = $_GET['idVinyl'];


$sql = "DELETE FROM `vinyl` WHERE `idVinyl` = :idVinyl";

$stmt = $pdo->prepare($sql);

// Povezivanje parametara
$stmt->bindParam(':idVinyl', $idVinyl);

// Izvršavanje naredbe
$stmt->execute();


header("Location:administrator.php");
