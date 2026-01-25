<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>POST-Parameter Beispiel</title>
</head>
<body>
    <h1>POST-Parameter Beispiel</h1>

    <form method="post" action="backend.php">
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

    <p>
        Hinweis: POST-Parameter stehen nicht in der URL.
    </p>
</body>
</html>
