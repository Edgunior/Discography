<?php include 'session_checker.php'; ?>
<?php include 'conn.php'; ?>
<?php

$user = $_SESSION['imePrezime'];
$idKorisnik = $_SESSION['idKorisnik']; 

$sql = "SELECT * FROM korisnik WHERE idKorisnik != :idKorisnik";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idKorisnik', $idKorisnik);
$stmt->execute();
$users = $stmt->fetchAll(); 

$sql = "SELECT vinyl.idGenre, vinyl.cena, vinyl.idVinyl, vinyl.idArtist,
genre.genre,
artist.artist AS artist,
vinyl.vinyl
FROM vinyl 
LEFT JOIN genre on vinyl.idGenre = genre.idGenre
LEFT JOIN artist on vinyl.idArtist = artist.idArtist";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$vinyl = $stmt->fetchAll(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
    You logged in as a administrator.
    <span style="position: absolute; top:0; right:0">
        <span><?php echo $user ?></span>
        <a href="logOut.php">Log out</a>
    </span>

    <div>
        

        <?php foreach ($users as $key => $korisnik) {
            $key++;
            
        ?>

<div>
                <?php echo $key ?>.
                Ime i prezime: <?php echo $korisnik['imePrezime'] ?>
                Username: <?php echo $korisnik['username'] ?>
                <?php if ($korisnik['aktivan'] == 1) { ?>
                    <!-- Za deaktivaciju, šaljemo status=0 -->
                    <a href="activation.php?status=0&idKorisnik=<?php echo $korisnik['idKorisnik'] ?>">Deaktiviraj</a>
                <?php } ?>
                <?php if ($korisnik['aktivan'] == 0) { ?>
                    <!-- Za aktivaciju, šaljemo status=1 -->
                    <a href="activation.php?status=1&idKorisnik=<?php echo $korisnik['idKorisnik'] ?>">Aktiviraj</a>
                <?php } ?>
            </div>

        <?php } ?>

    </div>
    <h1>Vinyls</h1>
    <div><a href="add_vinyl.php">Add vinyl</a></div> 
    
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>Vinyl</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vinyl as $vinyl) { ?>
                    <tr>
                    <td><?php echo $vinyl['idVinyl'] ?></td>
                        <td><?php echo $vinyl['artist'] ?></td>
                        <td><?php echo $vinyl['idGenre'] ?></td>
                        <td><?php echo $vinyl['cena'] ?> EUR</td>
                        <td>
                            <div>
                                <a href="update.php?idVinyl=<?php echo $vinyl['idVinyl'] ?>">Update </a>
                            </div>
                            <div>
                                <a href="delete.php?idVinyl=<?php echo $vinyl['idVinyl'] ?>">Delete </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
