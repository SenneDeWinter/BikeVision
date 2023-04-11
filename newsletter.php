<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Newsletter</title>
</head>
<body>
<?php

include('./vendor/autoload.php');
include('./functions/database.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

if (isset($_SESSION['logged_in'])) {
    $db = dbConnect();
    $newsletter = getSubscribers($db);    
} else {
        header('Location: login.php');
}

?>

<div class="container mx-auto px-4">
    <div class="text-2xl font-light">
        <br>
        <h1>Newsletter Subscribers</h1>
        <br>
        <?php foreach ($newsletter as $subscribers): ?>
            <p class="text-black-200 text-sm font-light"><?= $subscribers['email'];?></p>
        <?php endforeach; ?>    
    </div>
</div>
</body>
</html>