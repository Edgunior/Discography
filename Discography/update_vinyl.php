<?php
include 'conn.php';

$idVinyl = $_POST["idVinyl"];
$genre = $_POST["genre"];
$idArtist = $_POST["idArtist"];
$cena = $_POST["cena"];


// Priprema SQL upita sa placeholder-ima
$sql = "UPDATE `vinyl` SET `idVinyl` = :idVinyl, `genre` = :genre, `cena` = :cena 
        WHERE `artist` = :idArtist";

$stmt = $pdo->prepare($sql);

// Povezivanje parametara
$stmt->bindParam(':idVinyl', $idVinyl);
$stmt->bindParam(':genre', $genre);
$stmt->bindParam(':artist', $artist);
$stmt->bindParam(':cena', $cena);


// Izvršavanje naredbe
$stmt->execute();

header("Location:administrator.php");
