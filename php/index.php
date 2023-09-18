<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//Dit is een voorbeeld bestand voor het aanmaken van MySQL databases met PHP MySQLi
//Let op!, dit script verwijderd geen gegevens!, als je databases wilt leegmaken, dan moet je zelf actie ondernemen.
 
//Inladen van de instellingen.
include 'instellingen.php';
 
// Maak connectie met de database.
echo "* Connectie met de database...";
$dbcon = mysqli_connect($database_adres, $database_login_naam, $database_login_wachtwoord);
 
// Is de connectie gelukt?, zo niet...geef een foutmelding en sluit het script!
if (mysqli_connect_errno()) {
	echo "fout!: " . mysqli_connect_error() . "<br>";
	// Eindig het script.
	exit;
} else {
	echo "succes!<br>";
}

// Maak een database.
echo "* Aanmaken van database ' " . $database_naam . " '...";
$sql = "CREATE DATABASE testtabel";
if (mysqli_query($dbcon, $sql)) {
	echo "succes!<br>";
} else {
	echo "fout: " . mysqli_error($dbcon) . "<br>";
}
 
// We kunnen niet zo maar tabellen aanmaken, we moeten eerst de database selecteren!
mysqli_query($dbcon, "USE " . $database_naam);
 
// Tabellen aanmaken.
$tabelnaam = "testtabel";
$sql="CREATE TABLE " . $tabelnaam . "(
kolom1 INT,
kolom2 INT,
kolom3 INT
)";
 
// Query uitvoeren.
echo "- Aanmaken tabel ' " . $tabelnaam . " '...";
if (mysqli_query($dbcon, $sql)) {
	echo "succes!<br>";
} else {
	echo "fout: " . mysqli_error($dbcon) . "<br>";
}
 
// Om zoek- en selectiefunties te kunnen gebruiken moet er een "uniek" nummer per regel aangemaakt worden.
mysqli_query($dbcon, "ALTER TABLE " . $tabelnaam . " ADD COLUMN ID INT AUTO_INCREMENT PRIMARY KEY FIRST");
 
// Sluit de MySQL verbinding.
mysqli_close($dbcon);
 
echo "<br><br>-- Einde! --";
?>
</body>

</html>