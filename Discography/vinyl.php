<?php
include 'conn.php';

$genre = $_POST["genre"];
$cena = $_POST["cena"];
$idArtist = $_POST["artist"];


$sql = "INSERT INTO vinyl (idGenre, cena, idArtist) 
                    VALUES (:idGenre, :cena, :idArtist)";


$stmt = $pdo->prepare($sql); 

$stmt->bindParam(':idGenre', $genre);
$stmt->bindParam(':cena', $cena);
$stmt ->bindParam(':idArtist', $idArtist);


$stmt->execute();

header("Location:administrator.php");
