<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "U bent ingelogd!";
        } else {
            echo "Onjuiste gebruikersnaam of wachtwoord!";
        }
    } else {
        echo "Onjuiste gebruikersnaam of wachtwoord!";
    }
}
?>
