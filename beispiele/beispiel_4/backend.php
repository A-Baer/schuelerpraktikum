<?php
// Beispiel 4: SESSION-Variablen im Backend setzen
session_start();

// Werte aus dem Formular lesen
$name = $_POST['name'] ?? '';
$alter = $_POST['alter'] ?? '';

// Einfache Validierung
$fehler = [];
if ($name === '') {
    $fehler[] = 'Name fehlt.';
}
if ($alter === '') {
    $fehler[] = 'Alter fehlt.';
} elseif (!is_numeric($alter)) {
    $fehler[] = 'Alter muss eine Zahl sein.';
}

// SESSION nur setzen, wenn alles ok ist
if (count($fehler) === 0) {
    $_SESSION['name'] = $name;
    $_SESSION['alter'] = $alter;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Backend-Auswertung</title>
</head>
<body>
    <h1>Backend-Auswertung</h1>

    <?php if (count($fehler) > 0): ?>
        <p>Es gibt ein Problem mit den Daten:</p>
        <ul>
            <?php foreach ($fehler as $meldung): ?>
                <li><?php echo htmlspecialchars($meldung); ?></li>
            <?php endforeach; ?>
        </ul>
        <p>
            <a href="index.php">Zurück zum Formular</a>
        </p>
    <?php else: ?>
        <p>Hallo <?php echo htmlspecialchars($name); ?>,</p>
        <p>du bist <?php echo htmlspecialchars($alter); ?> Jahre alt.</p>
        <p>
            <a href="index.php">Zurück zum Formular (vorausgefüllt)</a>
        </p>
    <?php endif; ?>
</body>
</html>
