<?php
// Beispiel 4: Registrierung verarbeiten (mit Session)

session_start();

$benutzername = trim($_POST['benutzername'] ?? '');
$passwort = $_POST['passwort'] ?? '';

$fehler = [];

// Einfache Validierung
if ($benutzername === '') {
    $fehler[] = 'Benutzername fehlt.';
} elseif (!preg_match('/^[A-Za-z0-9_]+$/', $benutzername)) {
    $fehler[] = 'Benutzername darf nur Buchstaben, Zahlen und _ enthalten.';
}

if ($passwort === '') {
    $fehler[] = 'Passwort fehlt.';
}

$accountsOrdner = __DIR__ . '/accounts';
if (!is_dir($accountsOrdner)) {
    $fehler[] = 'Accounts-Ordner fehlt.';
}

$accountDatei = $accountsOrdner . '/' . $benutzername;
if (count($fehler) === 0 && file_exists($accountDatei)) {
    $fehler[] = 'Benutzername ist bereits vergeben.';
}

if (count($fehler) === 0) {
    // Passwort sicher hashen und speichern
    $hash = password_hash($passwort, PASSWORD_DEFAULT);
    $ergebnis = file_put_contents($accountDatei, $hash);
    if ($ergebnis === false) {
        $fehler[] = 'Account konnte nicht gespeichert werden.';
    } else {
        $_SESSION['zuletzt_registriert'] = $benutzername;
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrierung</title>
</head>
<body>
    <h1>Registrierung</h1>

    <?php if (count($fehler) > 0): ?>
        <p>Es gab ein Problem:</p>
        <ul>
            <?php foreach ($fehler as $meldung): ?>
                <li><?php echo htmlspecialchars($meldung); ?></li>
            <?php endforeach; ?>
        </ul>
        <p>
            <a href="registrieren.php">Zurück zur Registrierung</a>
        </p>
    <?php else: ?>
        <p>Account erstellt für: <strong><?php echo htmlspecialchars($benutzername); ?></strong></p>
        <p>
            <a href="index.php">Zum Login</a>
        </p>
    <?php endif; ?>
</body>
</html>
