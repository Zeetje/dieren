<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: welcome.php"); // Redirect naar welkomstpagina als de gebruiker al ingelogd is
    exit;
}

// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of alle vereiste velden zijn ingediend
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        // Controleer of wachtwoord overeenkomt met de bevestiging van het wachtwoord
        if ($_POST['password'] == $_POST['confirm_password']) {
            // Hier zou je normaal gesproken de gebruikersgegevens in een database opslaan
            // Voor dit voorbeeld wordt niets opgeslagen en wordt de registratie gewoon gesimuleerd
            $success_message = "Registratie succesvol!";

            // Redirect naar de loginpagina na succesvolle registratie
            header("Location: login.php");
            exit;
        } else {
            $error_message = "Wachtwoord komt niet overeen!";
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
    <title>Registratie</title>
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
        <div class="register-form-container">
            <h2>Registreren</h2>
            <?php
            if (isset($error_message)) {
                echo '<p class="error">' . $error_message . '</p>';
            }
            if (isset($success_message)) {
                echo '<p class="success">' . $success_message . '</p>';
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="username" placeholder="Gebruikersnaam" required>
                <input type="email" name="email" placeholder="E-mailadres" required>
                <input type="password" name="password" placeholder="Wachtwoord" required>
                <input type="password" name="confirm_password" placeholder="Bevestig wachtwoord" required>
                <button type="submit">Registreren</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        &copy; Dierenvondst
    </footer>
</body>
</html>
