<?php include 'session_checker.php'; ?>
<?php include 'conn.php'; ?>
<?php

$idVinyl = $_GET['idVinyl'];

$sql = "SELECT *
        FROM vinyl
        WHERE idVinyl = :idVinyl";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idVinyl', $idVinyl);
$stmt->execute();

$vinylUpdates = $stmt->fetch(PDO::FETCH_ASSOC);


$upit = $pdo->prepare("SELECT * FROM genre");

$upit->execute();
$genres = $upit->fetchAll(PDO::FETCH_ASSOC);


$upit = $pdo->prepare("SELECT * FROM artist");

$upit->execute();
$artists = $upit->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Update vinyl</h1>
    <form action="update_vinyl.php" method="POST">
        <div>
            <label for="genre">genre</label>
            <input type="text" name="idVinyl" hidden value="<?php echo $idVinyl ?>">
            <input id="genre" type="text" name="genre" value="<?php echo $vinylUpdates['genre'] ?>">
        </div>
        
        <div>
            <label for="artist">Artist</label>
            <select name="artist" id="artist">
                
                <?php foreach ($artists as $row) {
                    $selected = "";
                    if ($row['id'] == $vinylUpdates['idArtist']) {
                        $selected = "selected";
                    }
                ?>
                    <option <?php echo $selected ?> value="<?php echo $row['id'] ?>"><?php echo $row['artist'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="cena">Cena</label>
            <input id="cena" type="text" name="cena" value="<?php echo $vinylUpdates['cena'] ?>">
        </div>
        <div>
            <input type="submit" value="Snimi">
        </div>
    </form>
</body>

</html>