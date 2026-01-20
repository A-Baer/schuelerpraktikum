<?php
// Beispiel 4: Logout (Session beenden)

session_start();

// Session-Variablen leeren und Session beenden
$_SESSION = [];

if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
</head>
<body>
    <h1>Logout</h1>
    <p>Du bist jetzt ausgeloggt.</p>
    <p>
        <a href="index.php">Zurück zum Login</a>
    </p>
</body>
</html>
