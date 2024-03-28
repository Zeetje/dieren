<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: welcome.php"); // Redirect naar welkomstpagina als de gebruiker al ingelogd is
    exit;
}

// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de gebruikersnaam en wachtwoord zijn ingediend
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Hier zou je normaal gesproken de gebruikersgegevens controleren tegen een database
        // Voor dit voorbeeld wordt eenvoudigweg een standaardgebruikersnaam en wachtwoord gebruikt
        $valid_username = "user";
        $valid_password = "password";

        // Controleer of de ingediende gebruikersnaam en wachtwoord overeenkomen met de geldige gegevens
        if ($_POST['username'] == $valid_username && $_POST['password'] == $valid_password) {
            // Gebruiker is ingelogd, sla de gebruikersnaam op in de sessie
            $_SESSION['username'] = $_POST['username'];
            header("Location: welcome.php"); // Redirect naar welkomstpagina na succesvol inloggen
            exit;
        } else {
            $error_message = "Ongeldige gebruikersnaam of wachtwoord!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <img class="logo" src="img/logo.png" alt="Logo">
        <div class="btn-container">
            <div class="btn" onclick="toonDonatieVenster()">Doneren</div>
            <a href="pages/inlog.html" class="btn">Inloggen</a> 
        </div>
    </header>

    <div class="main-content">
        <div class="login-form-container">
            <h2>Inloggen</h2>
            <?php
            if (isset($error_message)) {
                echo '<p class="error">' . $error_message . '</p>';
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="username" placeholder="Gebruikersnaam" required>
                <input type="password" name="password" placeholder="Wachtwoord" required>
                <button type="submit">Inloggen</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        &copy; Dierenvondst
    </footer>
</body>
</html>
