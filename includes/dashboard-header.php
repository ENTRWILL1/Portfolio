<?php

/*
|--------------------------------------------------------------------------
| HEADER DASHBOARD
|--------------------------------------------------------------------------
| Dipanggil lewat includes/Header.php saat $isDashboard = true.
| Judul tab bisa diatur dengan $pageTitle; bila tidak, diambil dari nama file.
*/

$basePath = $basePath ?? '../';
$slug     = basename($_SERVER['SCRIPT_NAME'], '.php');

$pageTitle = $pageTitle
    ?? ($slug === 'dashboard' ? 'Dashboard' : ucfirst($slug) . ' | Dashboard');

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <title><?= htmlspecialchars($pageTitle) ?></title>

    <link rel="icon" href="<?= $basePath ?>pngegg.png" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="<?= $basePath ?>assets/css/dashboard.css">

</head>

<body class="dashboard-page">

    <script>
        // Ikuti tema portfolio (disimpan di localStorage, default gelap)
        try {
            if (localStorage.getItem("theme") !== "light") {
                document.body.classList.add("dark");
            }
        } catch (e) {
            document.body.classList.add("dark");
        }
    </script>
