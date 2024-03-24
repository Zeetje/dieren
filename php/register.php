<?php
$host = 'localhost';
$dbname = 'data'; // Vervang dit met jouw database naam
$username = '089329'; // Vervang dit met jouw database gebruikersnaam
$password = 'Ajaxlol16'; // Vervang dit met jouw database wachtwoord

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "Account succesvol aangemaakt!";
            // Redirect naar de inlogpagina of andere pagina na succesvol registreren
        } else {
            echo "Er is een fout opgetreden.";
        }
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
