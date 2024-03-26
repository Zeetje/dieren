<?php
$host = '87.210.218.52';
$dbname = 'data'; // Vervang dit met jouw database naam
$username = '089329'; // Vervang dit met jouw database gebruikersnaam
$password = 'Ajaxlol16'; // Vervang dit met jouw database wachtwoord

try {
    $conn = new PDO("mysql:host=$host;dbname"=$dbname, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Inloggen succesvol!";
            // Redirect naar de homepagina of andere pagina na succesvol inloggen
        } else {
            echo "Ongeldige gebruikersnaam of wachtwoord.";
        }
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
