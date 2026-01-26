<?php
// Beispiel 5: Login verarbeiten (mit Session)

session_start();

$benutzername = trim($_POST['benutzername'] ?? '');
$passwort = $_POST['passwort'] ?? '';

$fehler = [];

if ($benutzername === '') {
    $fehler[] = 'Benutzername fehlt.';
}

if ($passwort === '') {
    $fehler[] = 'Passwort fehlt.';
}

$accountsOrdner = __DIR__ . '/accounts';
if (!is_dir($accountsOrdner)) {
    $fehler[] = 'Accounts-Ordner fehlt.';
}

$accountDatei = $accountsOrdner . '/' . $benutzername;
if (count($fehler) === 0 && !file_exists($accountDatei)) {
    $fehler[] = 'Benutzername oder Passwort ist falsch.';
}

if (count($fehler) === 0) {
    $gespeicherterHash = file_get_contents($accountDatei);
    if ($gespeicherterHash === false || !password_verify($passwort, $gespeicherterHash)) {
        $fehler[] = 'Benutzername oder Passwort ist falsch.';
    }
}

if (count($fehler) === 0) {
    $_SESSION['eingeloggt'] = true;
    $_SESSION['benutzername'] = $benutzername;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (count($fehler) > 0): ?>
        <p>Login fehlgeschlagen:</p>
        <ul>
            <?php foreach ($fehler as $meldung): ?>
                <li><?php echo htmlspecialchars($meldung); ?></li>
            <?php endforeach; ?>
        </ul>
        <p>
            <a href="index.php">Zurück zum Login</a>
        </p>
    <?php else: ?>
        <p>Willkommen, <strong><?php echo htmlspecialchars($benutzername); ?></strong>!</p>
        <p>
            <a href="index.php">Zurück zum Login</a>
        </p>
    <?php endif; ?>
</body>
</html>
