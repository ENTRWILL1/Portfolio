<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === '111') {

        $_SESSION['is_login'] = true;
        $_SESSION['username'] = 'admin';
        $_SESSION['role'] = 'admin';

        header('Location: dashboard.php');
        exit;

    } elseif ($username === 'user' && $password === '222') {

        $_SESSION['is_login'] = true;
        $_SESSION['username'] = 'user';
        $_SESSION['role'] = 'user';

        header('Location: dashboard.php');
        exit;

    } else {

        $error = 'Username atau password salah';

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <h2>Login</h2>

    <?php if (isset($error)): ?>
        <p class="error-message">
            <?php echo htmlspecialchars($error); ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="login.php">

        <input
            type="text"
            name="username"
            placeholder="Username"
            autocomplete="username"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            autocomplete="current-password"
            required
        >

        <button type="submit">Login</button>

    </form>

</body>

</html>