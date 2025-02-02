<?php
require_once '../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.discordapp.com/attachments/1089470162601771028/1252112063984304168/Screenshot_2024-06-17_120555-modified.png?ex=667107bb&is=666fb63b&hm=699303144cbd9c9390c8583b0aac80ec8c891bfc33752b9a86595362cd26293d&" type="image/x-icon">
    <title>UAS BACKEND</title>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="../output.css">
    <?php session_start() ?>
</head>

<body>
    <?php require_once 'partials/header.php'; ?>
    <main class="mx-auto max-w-7xl py-24 px-6">
        <?php
        if (isset($_SESSION['error'])) {
            include 'components/error.php';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            include 'components/success.php';
            unset($_SESSION['success']);
        }
        $router = require_once '../routes/index.php';
        ?>
    </main>
    <?php require_once 'partials/footer.php'; ?>
    <script src="app.js"></script>
</body>

</html>