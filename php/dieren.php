<?php
// Verbinding maken met de database (vervang de voorbeeldgegevens door je eigen databasegegevens)
$servername = "192.168.190.1";
$db_username = 'db89627';
$db_password = 'Pappa1234!';
$db_database = 'Database5';

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Haal de categorie op uit de querystring
$categorie = $_GET['categorie'];

// Bereid de SQL-query voor om dierengegevens op te halen op basis van de categorie
$sql = "SELECT naam, foto, info FROM dieren WHERE categorie = '$categorie'";

// Voer de query uit
$result = $conn->query($sql);

// Controleer of er resultaten zijn
if ($result->num_rows > 0) {
    // Array om dierengegevens op te slaan
    $dieren = array();

    // Loop door de resultaten en voeg dierengegevens toe aan de array
    while($row = $result->fetch_assoc()) {
        $dier = array(
            'naam' => $row['naam'],
            'foto' => $row['foto'],
            'info' => $row['info']
        );
        array_push($dieren, $dier);
    }

    // Geef de dierengegevens terug in JSON-indeling
    echo json_encode($dieren);
} else {
    // Geef een leeg array terug als er geen resultaten zijn
    echo json_encode(array());
}

// Sluit de databaseverbinding
$conn->close();
?>

