<?php
// Beispiel 5: Login + Registrierung auf einer Seite

session_start();

$eingeloggt = $_SESSION['eingeloggt'] ?? false;
$benutzername = $_SESSION['benutzername'] ?? '';
$zuletztRegistriert = $_SESSION['zuletzt_registriert'] ?? '';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login & Registrierung</title>
</head>
<body>
    <h1>Login & Registrierung</h1>

    <?php if ($eingeloggt): ?>
        <p>Du bist eingeloggt als: <strong><?php echo htmlspecialchars($benutzername); ?></strong></p>
        <p>
            <a href="logout.php">Logout</a>
        </p>
    <?php else: ?>
        <h2>Login</h2>
        <form method="post" action="backend_login.php">
            <label>
                Benutzername:
                <input type="text" name="benutzername" value="<?php echo htmlspecialchars($zuletztRegistriert); ?>">
            </label>
            <br>
            <label>
                Passwort:
                <input type="password" name="passwort">
            </label>
            <br>
            <button type="submit">Einloggen</button>
        </form>

        <h2>Registrieren</h2>
        <form method="post" action="backend_registrieren.php">
            <label>
                Benutzername:
                <input type="text" name="benutzername" value="<?php echo htmlspecialchars($zuletztRegistriert); ?>">
            </label>
            <br>
            <label>
                Passwort:
                <input type="password" name="passwort">
            </label>
            <br>
            <button type="submit">Account erstellen</button>
        </form>
    <?php endif; ?>
</body>
</html>
