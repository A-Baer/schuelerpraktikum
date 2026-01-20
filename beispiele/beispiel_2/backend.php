<?php
// Beispiel 2: GET-Parameter im Backend verarbeiten

// Werte aus der URL lesen (wenn nicht vorhanden, leere Werte setzen)
$name = $_GET['name'] ?? '';
$alter = $_GET['alter'] ?? '';

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
            <a href="index.php?<?php echo http_build_query(['name' => $name, 'alter' => $alter]); ?>">
                Daten im Formular anzeigen
            </a>
        </p>
    <?php endif; ?>
</body>
</html>
