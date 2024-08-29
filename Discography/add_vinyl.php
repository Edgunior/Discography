<?php include 'session_checker.php'; ?>
<?php include 'conn.php'; ?>
<?php


// prvo uzimamo podatke iz baze koji se ticu sifarnickih tabela
$upit = $pdo->prepare("SELECT * FROM vinyl");
// Vezivanje parametara
$upit->execute();
$tipovi = $upit->fetchAll(PDO::FETCH_ASSOC);


$upit = $pdo->prepare("SELECT * FROM artist");
// Vezivanje parametara
$upit->execute();
$artist = $upit->fetchAll(PDO::FETCH_ASSOC);


// kasnije ih izlistavamo u formi u okviru select polja (kao optione)

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Add vinyl</h1>
    <form action="vinyl.php" method="POST">
        
    <div>
            <label for="vinyl">Vinyl</label>
            <input id="vinyl" type="text" name="genre">
        </div>
    <div>
            <label for="genre">Genre</label>
            <input id="genre" type="text" name="genre">
        </div>
        <div>
            <label for="artist">Artist</label>
            <input name="artist" type="text" id="artist">
        </div>
        <div>
            <label for="cena">Cena</label>
            <input id="cena" type="text" name="cena">
        </div>
        <div>
            <input type="submit" value="Snimi">
        </div>
    </form>
</body>

</html>

