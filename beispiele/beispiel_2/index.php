<?php
// Beispiel 2: GET-Parameter mit einem einfachen Formular

// Standardwerte, falls keine GET-Parameter gesetzt sind
$name = $_GET['name'] ?? '';
$alter = $_GET['alter'] ?? '';

// Wenn das Formular abgeschickt wurde, bauen wir die URL zum Backend
$query = http_build_query([
    'name' => $name,
    'alter' => $alter,
]);
$backendUrl = 'backend.php' . ($query !== '' ? "?$query" : '');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>GET-Parameter Beispiel</title>
</head>
<body>
    <h1>GET-Parameter Beispiel</h1>

    <form method="get" action="index.php">
        <label>
            Name:
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        </label>
        <br>
        <label>
            Alter:
            <input type="number" name="alter" min="0" value="<?php echo htmlspecialchars($alter); ?>">
        </label>
        <br>
        <button type="submit">Absenden</button>
    </form>

    <p>
        <a href="<?php echo htmlspecialchars($backendUrl); ?>">
            Daten an backend.php senden
        </a>
    </p>

    <p>
        Tipp: Du kannst auch direkt in der URL testen, z. B.:<br>
        <code>?name=Lea&alter=16</code>
    </p>
</body>
</html>
