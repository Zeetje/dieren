<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Zorg ervoor dat je de juiste paden gebruikt voor je CSS -->
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <img class="logo" src="../img/logo.png" alt="Logo">
        <div class="btn-container">
            <div class="btn" onclick="toonDonatieVenster()">Doneren</div>
        </div>
    </header>

    <div class="main-content">
        <h2>Inloggen of Account Aanmaken</h2>
        
        <!-- Inlog Formulier -->
        <div class="inlog-form">
            <h3>Inloggen</h3>
            <form action="../php/login.php" method="post">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Inloggen">
            </form>
        </div>

        <!-- Registratie Formulier -->
        <div class="registratie-form">
            <h3>Account Aanmaken</h3>
            <form action="../php/register.php" method="post">
                <label for="reg_username">Gebruikersnaam:</label>
                <input type="text" id="reg_username" name="username" required>
                
                <label for="reg_password">Wachtwoord:</label>
                <input type="password" id="reg_password" name="password" required>

                <input type="submit" value="Account Aanmaken">
            </form>
        </div>
    </div>

    <footer class="footer">
        &copy; Dierenvondst
    </footer>

    <script src="../script/script.js"></script> <!-- Zorg ervoor dat je de juiste paden gebruikt voor je JavaScript -->
</body>
</html>
