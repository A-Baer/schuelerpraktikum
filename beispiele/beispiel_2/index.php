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
            <input type="text" name="name">
        </label>
        <br>
        <label>
            Alter:
            <input type="number" name="alter" min="0">
        </label>
        <br>
        <button type="submit">Absenden</button>
    </form>

</body>
</html>
