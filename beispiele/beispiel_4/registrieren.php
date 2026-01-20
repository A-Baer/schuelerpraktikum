<?php
// Beispiel 4: Registrierungsformular mit Session

session_start();

$benutzername = $_POST['benutzername'] ?? ($_SESSION['zuletzt_registriert'] ?? '');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrieren</title>
</head>
<body>
    <h1>Registrieren</h1>

    <form method="post" action="backend_registrieren.php">
        <label>
            Benutzername:
            <input type="text" name="benutzername" value="<?php echo htmlspecialchars($benutzername); ?>">
        </label>
        <br>
        <label>
            Passwort:
            <input type="password" name="passwort">
        </label>
        <br>
        <button type="submit">Account erstellen</button>
    </form>

    <p>
        <a href="index.php">Zurück zum Login</a>
    </p>
</body>
</html>
