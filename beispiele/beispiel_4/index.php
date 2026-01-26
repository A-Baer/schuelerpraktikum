<?php
// Beispiel 4: SESSION-Variablen im Formular verwenden
session_start();

$name = $_SESSION['name'] ?? '';
$alter = $_SESSION['alter'] ?? '';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>SESSION-Variablen Beispiel</title>
</head>
<body>
    <h1>SESSION-Variablen Beispiel</h1>

    <form method="post" action="backend.php">
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
        Hinweis: Die Werte werden in der SESSION gespeichert und beim nächsten Besuch vorausgefüllt.
    </p>
</body>
</html>
