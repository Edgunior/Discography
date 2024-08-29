<?php

include 'conn.php';


$idKorisnik = $_POST["idKorisnik"];
$idVinyl = $_POST["idVinyl"];
$time = $_POST["time"];


$sql = "INSERT INTO korpa (idVinyl, idKorisnik, time) 
                    VALUES (:idVinyl, :idKorisnik, :time)";


$stmt = $pdo->prepare($sql); 


$stmt->bindParam(':idVinyl', $idVinyl);
$stmt->bindParam(':idKorisnik', $idKorisnik);
$stmt->bindParam(':time', $time);


$stmt->execute();

header("Location:korisnik.php?msg=successful");
