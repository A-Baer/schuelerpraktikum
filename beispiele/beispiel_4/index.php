<?php
// Beispiel 4: Login-Formular mit Session

session_start();

// Optional: Werte wieder anzeigen, falls der Nutzer zurückkommt
$benutzername = $_POST['benutzername'] ?? ($_SESSION['benutzername'] ?? '');
$eingeloggt = $_SESSION['eingeloggt'] ?? false;
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if ($eingeloggt): ?>
        <p>Du bist eingeloggt als: <strong><?php echo htmlspecialchars($benutzername); ?></strong></p>
        <p>
            (In diesem Beispiel gibt es keinen Logout.)
        </p>
    <?php else: ?>
        <form method="post" action="backend_login.php">
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
            <button type="submit">Einloggen</button>
        </form>

        <p>
            Noch keinen Account?
            <a href="registrieren.php">Jetzt registrieren</a>
        </p>
    <?php endif; ?>
</body>
</html>
