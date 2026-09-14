<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // asumsi sudah ada proses cek ke database
    if ($username == 'admin' && $password == '111') {

        // simpan data ke session
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';

        header('Location: dashboard.php');
        exit();
        
    } elseif ($username == 'user' && $password == '222') {

        // simpan data ke session
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';

        header('Location: dashboard.php');
        exit();    
    } else {
        $error = 'Username atau password salah';
    }
}
?>

```html
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login</title>

    <link rel="stylesheet" href="login.css">
</head>

<body>

    <h2>Login</h2>

    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>" . htmlspecialchars($error) . "</p>";
    }
    ?>

    <form method="POST">

        <input
            type="text"
            name="username"
            placeholder="Username"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <button type="submit">
            Login
        </button>

    </form>

</body>

</html>
```
